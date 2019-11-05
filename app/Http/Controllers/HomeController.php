<?php

namespace App\Http\Controllers;

use DB;
use App\Imports\UsersImport;
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
        $log = DB::table('log')
            ->leftjoin('users','log.email','=','users.email')
            ->leftjoin('lokasis','id_lokasi','=','user_lokasi')
            ->get();

        return view('admin.log',compact('log'));
    }

    public function upload()
    {
        Excel::import(new UsersImport, request()->file('fileExcel'));

        return redirect('/log')->with('success','File berhasil diunggah');
    }
}
