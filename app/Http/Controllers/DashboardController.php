<?php

namespace App\Http\Controllers;

use DB;
use App\katalog;
use App\koleksi;
use App\lokasi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $koleksi = DB::table('koleksis')->get();

        $lokasi = DB::table('lokasis')->get();

        $katalog = DB::table('katalogs')
        	->leftjoin('koleksis','id_koleksi','=','katalogs.jenis')
        	->leftjoin('lokasis','id_lokasi','=','lokasi')
        	->get();

        return view('dashboard', ['koleksi'=>$koleksi,'lokasi'=>$lokasi,'katalog'=>$katalog]);
    }

    public function searchAll(Request $request)
    {
    	$keyword = $request->input('search');

    	$katalog = katalog::find($keyword);

    	return view('katalog.index',compact('katalog'));
    }

    public function searchBy()
    {

    }
}
