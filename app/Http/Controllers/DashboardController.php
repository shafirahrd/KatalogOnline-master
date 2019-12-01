<?php

namespace App\Http\Controllers;

use DB;
use App\Katalog;
use App\Koleksi;
use App\Lokasi;
use App\User;
use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DashboardController extends Controller
{
    public function index()
    {
        $koleksi = Koleksi::all();
        $lokasi = Lokasi::all();
        $katalog = Katalog::with('koleksi','lokasis')->where('deleted_at',NULL)->get();
        $bahasa = Katalog::select('bahasa')->groupBy('bahasa')->get();

        return view('dashboard', ['koleksi'=>$koleksi,'lokasi'=>$lokasi,'katalog'=>$katalog,'bahasa'=>$bahasa]);
    }

    public function searchAll(Request $request)
    {
    	$keyword = $request->input('search');

        $query = Katalog::with('koleksi','lokasis');
        $katalog = $query->orWhereHas('koleksi',function($q) use($keyword){
            $q->where('jenis_koleksi','LIKE','%'.$keyword.'%');
        })->orWhereHas('lokasis',function($q) use($keyword){
            $q->where('departemen','LIKE','%'.$keyword.'%');
        })->orWhere('judul','LIKE','%'.$keyword.'%')
            ->orWhere('penulis','LIKE','%'.$keyword.'%')
            ->orWhere('penerbit','LIKE','%'.$keyword.'%')
            ->orWhere('tahun_terbit','LIKE','%'.$keyword.'%')
            ->orWhere('bahasa','LIKE','%'.$keyword.'%')
            ->orWhere('deskripsi','LIKE','%'.$keyword.'%')
            // ->orWhere('att_value','(?i)(edisi).*()')
            ->paginate(15);

        // $statement = DB::statement("SET @keyword=$keyword");
        // $q = "SELECT judul FROM katalogs WHERE judul LIKE :keyword"
        // $katalog = DB::select(DB::raw($q,['keyword'=>'%'.$keyword.'%']));
        // dd($katalog);

        $bahasa = Katalog::select('bahasa')->groupBy('bahasa')->get();
        $lokasi = Lokasi::select('departemen')->get();
        $koleksi = Koleksi::get();

    	return view('katalog.index',compact('katalog','bahasa','lokasi','koleksi'));
    }

    public function searchBy(Request $request)
    {   
        // $query = DB::table('katalogs')
        //     ->leftjoin('koleksis','id_koleksi','=','jenis')
        //     ->leftjoin('lokasis','id_lokasi','=','lokasi');
        $query = Katalog::with('koleksi','lokasis');

        $bahasa = Katalog::select('bahasa')->groupBy('bahasa')->get();
        $lokasi = Lokasi::select('departemen')->get();
        $koleksi = Koleksi::get();
        // $query = Katalog::query()->whereHas('koleksi')->whereHas('lokasis');
        // dd(input::all());
        $judul = $request->input('judul');
        $penulis = $request->input('penulis');
        $penerbit = $request->input('penerbit');
        $kota = $request->input('kota');
        $tahun = $request->input('tahun');
        $bahasas = $request->input('bahasa');
        $lokasix = $request->input('lokasi');
        $koleksis = $request->input('koleksi');
        $deskripsi = $request->input('deskripsi');

        // if($request->input(''))
        // foreach()
        // $deskripsi = $request->input('deskripsi');

        if($judul){
            $query->where('judul','LIKE','%'.$judul.'%');
        }
        if($penulis){
            $query->where('penulis','LIKE','%'.$penulis.'%');
        }
        if($penerbit){
            $query->where('penerbit','LIKE','%'.$penerbit.'%');
        }
        if($kota){
            $query->where('kota_penerbit','LIKE','%'.$kota.'%');
        }
        if($tahun){
            $query->where('tahun_terbit','LIKE','%'.$tahun.'%');
        }
        if($bahasas){
            $query->where('bahasa','LIKE','%'.$bahasas.'%');
        }
        if($lokasix){
            $query->where('departemen','LIKE','%'.$lokasix.'%');
        }
        if($koleksis){
            $query->where('jenis_koleksi','LIKE','%'.$koleksis.'%');
        }
        // if($pembimbing1){
        //     $query->where('pembimbing1','LIKE','%'.$pembimbing1.'%');
        // }
        if($deskripsi){
            $query->where('deskripsi','LIKE','%'.$deskripsi.'%');
        }

        $katalog = $query->where('deleted_at',NULL)->paginate(15);

        return view('katalog.index',compact('katalog','bahasa','lokasi','koleksi'));
    }
}
