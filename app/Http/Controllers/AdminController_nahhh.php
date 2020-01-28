<?php

namespace App\Http\Controllers;

use DB;
use App\UploadedData;
use App\Katalog;
use App\Temp;
use App\Koleksi;
use App\Lokasi;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Input;
use App\Imports\KatalogImport;
use App\Imports\KoleksiImport;
use App\Http\Requests\CsvImportRequest;
use Illuminate\Http\Request;
use Excel;

class AdminController extends Controller
{
    use Notifiable;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $data_to_insert = [];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function excel()
    {
        return view('admin.excel');
    }
    public function csv()
    {
        return view('admin.csv');
    }

    public function log()
    {   
        $user = DB::table('logs')
            ->leftjoin('users','logs.id_user','=','users.id')
            ->leftjoin('lokasis','id_lokasi','=','user_lokasi')
            ->get();
        $log = DB::table('logs')
            ->leftjoin('katalogs','katalogs.id_katalog','=','logs.id_katalog')
            ->leftjoin('lokasis','id_lokasi','=','katalogs.lokasi')
            ->leftjoin('koleksis','katalogs.jenis','=','koleksis.id_koleksi')
            ->select('logs.*','katalogs.judul','katalogs.deleted_at','jenis_koleksi','penulis','penerbit','kota_penerbit','tahun_terbit','bahasa','deskripsi','departemen')
            ->paginate(15);

        // $log = DB::SELECT(DB::RAW("SELECT * FROM logs JOIN users ON id_user=id JOIN lokasis a ON user_lokasi=a.id_lokasi
        //                 JOIN katalogs ON logs.id_katalog=katalogs.id_katalog JOIN lokasis b ON katalogs.lokasi=b.id_lokasi"));

        return view('admin.log',compact('user','log'));
    }

    // public function downloadTemplate(){
    //     $pathfile = public_path()."/download/template.xlsx";
    //     dd($pathfile);
    //     return response()->download($pathfile);
    // }

    public function parseExcel()
    {   
        if(request()->file('fileExcel')){
            $array = (new KatalogImport)->toArray(request()->file('fileExcel'));

            $file = request()->file('fileExcel');
            $nama_file = rand().$file->getClientOriginalName();
            $file->move('file_data',$nama_file);
            
            if(count($array[0]) > 0){
                $data = [];
                $length = 0;
                if(request()->has('header')){
                    $excel_header_fields = [];
                    $length = 1;

                    foreach ($array[0][0] as $key => $value) {
                        $excel_header_fields[] = $key;
                    }             
                    array_push($data,$excel_header_fields);
                }
                
                for($i=0;$i<2+$length;$i++){
                    $d = [];
                    foreach ($array[0][$i] as $key => $value) {
                        $d[] = $value;
                    }
                    array_push($data,$d);
                }
                
                $excel_data = $data;
            }else{
                return redirect()->back();
            }
            
            $column_katalog = $this->getColumn();
            $column_katalog = array_merge($column_katalog[0],$column_katalog[1]);

            $type = 'excel';
            $header = request()->has('header');
            $lokasi = Lokasi::all();
            
            if(isset($excel_header_fields)){
                return view('admin.parsing_data', compact('excel_header_fields','excel_data','column_katalog','type','header','lokasi','nama_file'));
            }else{
                return view('admin.parsing_data', compact('excel_data','column_katalog','type','header','lokasi','nama_file'));
            }
        }else{
            return redirect('/excel')->with('message','Tidak file yang dipilih');
        }
    }

    // public function import_excel(Request $request)
    // {
    //     // validasi
    //     $this->validate($request, [
    //         'fileExcel' => 'required|mimes:csv,xls,xlsx'
    //     ]);
 
    //     // menangkap file excel
    //     $file = $request->file('fileExcel');
 
    //     // membuat nama file unik
    //     $nama_file = rand().$file->getClientOriginalName();
 
    //     // upload ke folder file_siswa di dalam folder public
    //     $file->move('file_data',$nama_file);
        
    //     // import data
    //     // Excel::import(new SiswaImport, public_path('/file_siswa/'.$nama_file));
        
    //     // return
    //     return $this->parseExcel($request);
    // }

    public function parseCSV(CsvImportRequest $request)
    {
        $path = $request->file('csv_file')->getRealPath();
        
        $data = \Excel::toArray('', $path, null, \Maatwebsite\Excel\Excel::TSV)[0];

        if(count($data) > 0){
            $length = 0;
            if($request->has('header')){
                $csv_header_fields = [];
                $length = 1;

                foreach ($data[0] as $key) {
                    $csv_header_fields[] = $key;
                }
            }

            $csv_data = array_slice($data,0,3+$length);
            
            $csv_data_file = UploadedData::create([
                'filename' => $request->file('csv_file')->getClientOriginalName(),
                'header' => $request->has('header'),
                'data' => json_encode($data)
            ]);

        }else{
            return redirect()->back();
        }
        
        $column_katalog = $this->getColumn();
        $column_katalog = array_merge($column_katalog[0],$column_katalog[1]);

        $type = 'csv';
        $lokasi = Lokasi::all();

        if(isset($csv_header_fields)){
            return view('admin.parsing_data', compact('csv_header_fields','csv_data','csv_data_file','column_katalog','type','lokasi'));
        }else{
            return view('admin.parsing_data', compact('csv_data','csv_data_file','column_katalog','type','lokasi'));
        }
    }
    
    public function import(Request $request)
    {   
        ini_set('max_execution_time', '0');
        $array = [];

        if($request->type == "excel"){
            // $data = UploadedData::find($request->excel_data_file);
            $data = (new KatalogImport)->toArray(public_path('file_data/').$request->excel_data_file);

            $excel_data = [];
            foreach($data[0] as $k => $v){
                $d = [];
                foreach ($data[0][$k] as $key => $value) {
                    $d[] = $value;
                }
                array_push($excel_data,$d);
            }

            foreach ($excel_data as $k => $row) {
                if(!$this->insertData($request,$row)){
                    array_push($array, $row);
                }
            }
        }else{
            $data = UploadedData::find($request->csv_data_file);

            $csv_data = json_decode($data->data,true);
            if($data->header){
                unset($csv_data[0]);
            }

            foreach ($csv_data as $k => $row) {
                if(!$this->insertData($request,$row)){
                    array_push($array, $row);
                }
            }
        }
 
        return redirect('/log')->with('message','File berhasil diunggah');
    }

    public function insertData($request,$row)
    {
        try {
            $column_katalog = $this->getColumn();
            $kol = $row[array_search("jenis",$request->fields)];
            if(!is_null($kol)){
                $kol = Koleksi::where("kode_koleksi",'LIKE','%'.$kol.'%')->select('id_koleksi','kode_koleksi','att_khusus')->first();
            }else{
                $kol = NULL;
            }
            // dd($kol);
            // $flag = $this->checkRedundancy($row,$request->fields);

            // if($flag == 1){
            $katalog = new Katalog();
            
            if(!is_null($kol)){
                if($kol->formatted_column !== NULL){
                    $koleksi = $kol->formatted_column;
                    $temp = [];
                }else{
                    $koleksi = NULL;
                    $temp = NULL;
                }
            }else{
                $koleksi = NULL;
                $temp = NULL;
            }

            foreach ($request->fields as $index => $field) {
                if(!is_null($field)){
                    if(in_array($field, $column_katalog[0])){
                        $i = array_search($field, $column_katalog[0]);
                        $header = $column_katalog[0][$i];
                        if($header == "jenis"){
                            if(!is_null($kol)){
                                $katalog->$header = $kol->id_koleksi == '-' ? NULL : $kol->id_koleksi;
                            }else{
                                $katalog->$header = NULL;
                            }
                        }else{
                            $katalog->$header = $row[$index] == '-' ? NULL : $row[$index];
                        }
                    }elseif(!is_null($koleksi) && in_array($field, $koleksi)){
                        foreach($koleksi as $value){
                            if($value == $field){
                                $i = array_search($field, $column_katalog[1]);
                            $header = $column_katalog[1][$i];
                                $temp[$value] = $row[$index] ?? '-';
                            }
                        }
                    }else{
                        continue;
                    }
                }
            }
            if(!is_null($temp)){
                $temp = json_encode($temp);
                $katalog->att_value = $temp;
            }else{
                $katalog->att_value = "[]";
            }
            $katalog->lokasi = $request->lokasi;

            // dd($katalog);
            $katalog->save();
            return true;
            // }

        } catch (\Exception $e) {
            return false;
        }
    }

    // public function checkRedundancy($row,$column)
    // {   
    //     $column_katalog = $this->getColumn();
    //     $row = str_replace("-", null, $row);
    //     $row = array_map(function($value) {return $value === "" ? NULL : $value;}, $row);

    //     $flag = 0;
    //     $judul = array_search("judul", $column);
    //     $jenis = array_search("jenis", $column);
    //     $lokasi = array_search("lokasi", $column);
    //     $edisi = array_search("Edisi", $column);
    //     $isbn = array_search("ISBN/ISSN", $column);
    //     $volume = array_search("Volume", $column);
    //     $nomor = array_search("Nomor", $column);
    //     $bulan = array_search("Bulan", $column);

    //     $lokasis = Lokasi::where("departemen",'LIKE','%'.$row[$lokasi].'%')->select('id_lokasi')->first();
    //     if($lokasis){
    //         $lokasi = $lokasis->id_lokasi;
    //     }else{
    //         $lokasi = NULL;
    //     }
    //     $data = Katalog::where('judul',$row[$judul])
    //         ->orWhere('judul','LIKE','%'.$row[$judul].'%')->first();
    //     // dd($data);
    //     if($data){
    //         if($data->att_value != NULL || $data->att_value != "[]"){
    //             $att_khusus = (array)json_decode($data->att_value);
    //             // if($data->judul == "Idea Jurnal Desain"){dd($data);}
    //             $att_khusus = preg_replace("/-+/", "", $att_khusus );
    //             foreach ($column_katalog[1] as $key => $value) {
    //                 if(!array_key_exists($value, $att_khusus)){
    //                     $att_khusus[$value] = [];
    //                 }
    //             }
    //         }else{
    //             $att_khusus = [];
    //         }
            
    //         if($data->lokasi != $lokasi || $att_khusus['Edisi'] != $row[$edisi] || $att_khusus['ISBN/ISSN'] != $row[$isbn] || $att_khusus['Volume'] != $row[$volume] || $att_khusus['Nomor'] != $row[$nomor] || $att_khusus['Bulan'] != $row[$bulan]){
    //             $flag = 1;
    //         }
    //         // if($flag==1){dd($row,$column,$att_khusus);}
    //         return $flag;
    //     }else{
    //         $flag = 1;
    //         return $flag;
    //     }
    // }

    public function getColumn()
    {
        $column_katalog = Schema::getColumnListing('katalogs');
        unset($column_katalog[0],$column_katalog[12],$column_katalog[13],$column_katalog[14]);

        $koleksi = json_decode(Koleksi::select('att_khusus')->distinct()->get());
        $att_khusus = [];
        foreach ($koleksi as $key => $value) {
            $temp = array_values((array)$value);
            $temp = json_decode($temp[0]);
            $temp = array_filter($temp);
            if(count($temp)>1){
                foreach ($temp as $key => $value){
                    if(!in_array($value,$att_khusus)){
                        array_push($att_khusus,$value);
                    }
                }
            }elseif(count($temp) && !is_null($temp)){
                if(!in_array($temp[0],$att_khusus) && $temp !== "-" && $temp !== NULL){
                    array_push($att_khusus,$temp[0]);
                }
            }
        }
        // $column = array_merge($column_katalog,$att_khusus);

        return array($column_katalog,$att_khusus);
    }

    public function uploadKoleksi()
    {
        Excel::import(new KoleksiImport, request()->file('fileExcel'));

        return redirect('/log')->with('message','File berhasil diunggah');
    }
}
