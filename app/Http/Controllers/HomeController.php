<?php

namespace App\Http\Controllers;

use DB;
use App\Csvdata;
// use App\Log;
// use App\Katalog;
// use App\Koleksi;
// use App\Lokasi;
// use App\User;
use Illuminate\Support\Facades\Schema;
use App\Imports\KatalogImport;
use App\Imports\KoleksiImport;
use App\Http\Requests\CsvImportRequest;
use Illuminate\Http\Request;
// use Maatwebsite\Excel\Facades\Excel;
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
            ->paginate(15);

        return view('admin.log',compact('log'));
    }

    public function upload()
    {
        Excel::import(new KatalogImport, request()->file('fileExcel'));

        return redirect('/log')->with('success','File berhasil diunggah');
    }

    public function uploadKoleksi()
    {
        Excel::import(new KoleksiImport, request()->file('fileExcel'));

        return redirect('/log')->with('success','File berhasil diunggah');
    }
    public function parse(CsvImportRequest $request)
    {
        $path = $request->file('csv_file')->getRealPath();

        if($request->has('header')){
            //automatically parse header to lowercase and change space into underscore

            $data = \Excel::toArray('', $path, null, \Maatwebsite\Excel\Excel::TSV)[0];
        }else{
            $data = array_map('str_getcsv', file($path));
        }

        if(count($data) > 0){
            
            if($request->has('header')){
                $csv_header_fields = [];
                foreach ($data[0] as $key) {
                    $csv_header_fields[] = $key;
                }
            }

            $csv_data = array_slice($data,0,5);

            $csv_data_file = Csvdata::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_header' => $request->has('header'),
                'csv_data' => json_encode($data)
            ]);
        }else{
            return redirect()->back();
        }

        $column_katalog = Schema::getColumnListing('katalogs');

        return view('admin.import_data', compact('csv_header_fields','csv_data','csv_data_file','column_katalog'));
    }
    public function process()
    {
        
    }
}
