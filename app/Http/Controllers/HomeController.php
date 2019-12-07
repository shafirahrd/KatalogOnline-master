<?php

namespace App\Http\Controllers;

use DB;
use App\Csvdata;
use App\Katalog;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Input;
use App\Imports\KatalogImport;
use App\Imports\RawImport;
use App\Imports\KoleksiImport;
use App\Http\Requests\CsvImportRequest;
use Illuminate\Http\Request;
use Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {
        return view('admin.index');
    }
    public function csv()
    {
        return view('admin.csv');
    }

    public function log()
    {   
        // $logs = Log::with('katalog')->with('lokasis')->with('user_lokasi')->get();
        $log = DB::table('logs')
            ->leftjoin('users','logs.id_user','=','users.id')
            ->leftjoin('lokasis','id_lokasi','=','user_lokasi')
            ->leftjoin('katalogs','katalogs.id_katalog','=','logs.id_katalog')
            ->leftjoin('koleksis','katalogs.jenis','=','koleksis.id_koleksi')
            ->select('nama','user_lokasi','logs.id_katalog','judul','jenis_koleksi','penulis','penerbit','kota_penerbit','tahun_terbit','bahasa','deskripsi','departemen','katalogs.created_at','katalogs.updated_at','deleted_at','log_change')
            ->paginate(15);

        return view('admin.log',compact('log'));
    }

    public function upload()
    {
        $array = (new KatalogImport)->toArray(request()->file('fileExcel'));
        // $header = [];
        // foreach ($array[0][0] as $key => $value) {
        //     $header[] = $key;
        // }
        // dd($header);


        if(count($array[0]) > 0){
            $length = 0;
            if(request()->has('header')){
                $excel_header_fields = [];
                $length = 1;

                foreach ($array[0][0] as $key) {
                    $excel_header_fields[] = $key;
                }
                
                $temp = [];
                $flag = 0;
                // dd($array[0]);
                foreach($array[0] as $k => $v){
                    $d = [];
                    foreach ($array[0][$k] as $key => $value) {
                        if($flag==0){
                            $h[] = $key;
                        }
                        $d[] = $value;
                    }
                    if($flag==0){
                        array_push($temp,$h);
                    }
                    $flag=1;
                    array_push($temp,$d);
                }
            }

            $excel_data = array_slice($array[0],0,3+$length);

            $excel_data_file = Csvdata::create([
                'csv_filename' => request()->file('fileExcel')->getClientOriginalName(),
                'csv_header' => request()->has('header'),
                'csv_data' => json_encode($temp)
            ]);
        }else{
            return redirect()->back();
        }
        
        $column_katalog = Schema::getColumnListing('katalogs');
        unset($column_katalog[0]);

        if(isset($csv_header_fields)){
            return view('admin.import_data', compact('excel_header_fields','excel_data','excel_data_file','column_katalog'));
        }else{
            return view('admin.import_data', compact('excel_data','excel_data_file','column_katalog'));
        }
        // Excel::import(new KatalogImport, request()->file('fileExcel'));

        // return redirect('/log')->with('success','File berhasil diunggah');
    }

    public function uploadKoleksi()
    {
        Excel::import(new KoleksiImport, request()->file('fileExcel'));

        return redirect('/log')->with('success','File berhasil diunggah');
    }

    public function parse(CsvImportRequest $request)
    {
        $path = $request->file('csv_file')->getRealPath();
        // $fname = $request->file('csv_file')->getClientOriginalName();
        
        $data = \Excel::toArray('', $path, null, \Maatwebsite\Excel\Excel::TSV)[0];
        // dd($data);
        // if($request->has('header')){
        //     //automatically parse header to lowercase and change space into underscore
        // }else{
        //     $data = \Excel::toArray('', $path, null, \Maatwebsite\Excel\Excel::TSV)[0];
        //     // $json = json_encode($data,JSON_UNESCAPED_UNICODE);
        //     // $error = json_last_error();
        //     // var_dump($json, $error === JSON_ERROR_UTF8);
        // }
        // // dd($data);

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
            dd($data);
            $csv_data_file = Csvdata::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_header' => $request->has('header'),
                'csv_data' => json_encode($data)
            ]);
        }else{
            return redirect()->back();
        }
        
        $column_katalog = Schema::getColumnListing('katalogs');
        unset($column_katalog[0]);
        
        if(isset($csv_header_fields)){
            return view('admin.import_data', compact('csv_header_fields','csv_data','csv_data_file','column_katalog'));
        }else{
            return view('admin.import_data', compact('csv_data','csv_data_file','column_katalog'));
        }
    }
    
    public function process(Request $request)
    {
        $data = Csvdata::find($request->csv_data_file);
        // dd($data);
        $csv_data = json_decode($data->csv_data,true);
        if($data->csv_header){
            unset($csv_data[0]);
        }

        $column_katalog = Schema::getColumnListing('katalogs');
        unset($column_katalog[0]);

        foreach ($csv_data as $row) {
            $katalog = new Katalog();

            foreach ($column_katalog as $index => $field) {
                if($index <= count($row)){
                    // dd($row);
                    $katalog->$field = $row[$index-1] == '-' ? NULL : $row[$index-1];
                    // if($data->csv_header){
                    // }else{
                    //     $katalog->$field = $row[$index-1] == '-' ? NULL : $row[$index-1];
                    // }
                }
            }
            $katalog->save();
        }

        return redirect('/log')->with('success','File berhasil diunggah');
    }
}
