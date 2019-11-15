<?php

namespace App\Http\Controllers;

use DB;
// use App\Log;
// use App\Katalog;
// use App\Koleksi;
// use App\Lokasi;
// use App\User;
use App\Imports\KatalogImport;
use App\Imports\KoleksiImport;
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
}
