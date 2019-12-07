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
    	$keyword = strtolower($request->input('search'));
        
        $query = Katalog::with('koleksi','lokasis');
        $katalog = $query->orWhereHas('koleksi',function($q) use($keyword){
            $q->where(DB::raw("lower(jenis_koleksi)"),'LIKE','%'.$keyword.'%');
        })->orWhereHas('lokasis',function($q) use($keyword){
            $q->where(DB::raw("lower(departemen)"),'LIKE','%'.$keyword.'%');
        })->orWhere(DB::raw("lower(judul)"),'LIKE','%'.$keyword.'%')
            ->orWhere(DB::raw("lower(penulis)"),'LIKE','%'.$keyword.'%')
            ->orWhere(DB::raw("lower(penerbit)"),'LIKE','%'.$keyword.'%')
            ->orWhere(DB::raw("lower(tahun_terbit)"),'LIKE','%'.$keyword.'%')
            ->orWhere(DB::raw("lower(bahasa)"),'LIKE','%'.$keyword.'%')
            ->orWhere(DB::raw("lower(deskripsi)"),'LIKE','%'.$keyword.'%')
            ->orWhere(DB::raw("lower(att_value)"),'LIKE','%'.$keyword.'%')
            ->orWhere(DB::SELECT("SELECT att_value FROM katalogs WHERE att_value REGEXP '(?i)((pembimbing1).*?( :keyword ))'",['keyword'=>$keyword]))
            ->paginate(15);
        // dd($katalog);
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
        // $query = Katalog::with('koleksi','lokasis');
        // $edisi = strtolower($request->input('Edisi'));
        // dd($edisi);
        

        $bahasa = Katalog::select('bahasa')->groupBy('bahasa')->get();
        $lokasi = Lokasi::select('departemen')->get();
        $koleksi = Koleksi::get();
        
        $judul = strtolower($request->input('judul'));
        $penulis = strtolower($request->input('penulis'));
        $penerbit = strtolower($request->input('penerbit'));
        $kota = strtolower($request->input('kota'));
        $tahun = strtolower($request->input('tahun'));
        $bahasas = strtolower($request->input('bahasa'));
        $lokasix = strtolower($request->input('lokasi'));
        $koleksis = strtolower($request->input('koleksi'));
        $deskripsi = strtolower($request->input('deskripsi'));
        $edisi = strtolower($request->input('Edisi'));
        $pembimbing1 = strtolower($request->input('Pembimbing1'));
        $pembimbing2 = strtolower($request->input('Pembimbing2'));
        $subjek = strtolower($request->input('Subjek'));
        $isbn_issn = strtolower($request->input('ISBN/ISSN'));
        $bulan = strtolower($request->input('Bulan'));
        $nomor = strtolower($request->input('Nomor'));
        $volume = strtolower($request->input('Volume'));

        $query = Katalog::with('koleksi','lokasis');

        if($judul){
            $query = $query->where(DB::raw("lower(judul)"),'LIKE','%'.$judul.'%');
        }
        if($penulis){
            $query = $query->where(DB::raw("lower(penulis)"),'LIKE','%'.$penulis.'%');
        }
        if($penerbit){
            $query = $query->where(DB::raw("lower(penerbit)"),'LIKE','%'.$penerbit.'%');
        }
        if($kota){
            $query = $query->where(DB::raw("lower(kota_penerbit)"),'LIKE','%'.$kota.'%');
        }
        if($tahun){
            $query = $query->where(DB::raw("lower(tahun_terbit)"),'LIKE','%'.$tahun.'%');
        }
        if($bahasas){
            $query = $query->where(DB::raw("lower(bahasa)"),'LIKE','%'.$bahasas.'%');
        }
        if($deskripsi){
            $query = $query->where(DB::raw("lower(deskripsi)"),'LIKE','%'.$deskripsi.'%');
        }
        if($lokasix){
            $query = $query->whereHas('lokasis',function($q) use($lokasix){
                $q->where('departemen','LIKE','%'.$lokasix.'%');
            });
        }
        if($koleksis){
            $query = $query->whereHas('koleksi',function($q) use($koleksis){
                $q->where('jenis_koleksi','LIKE','%'.$koleksis.'%');
            });
        }
        if($edisi){
            $query = $query->whereraw("att_value REGEXP '(?i)((edisi).*?(".$edisi."))'");
        }
        if($pembimbing1){
            $query = $query->whereraw("att_value REGEXP '(?i)((pembimbing1).*?(".$pembimbing1."))'");
        }
        if($pembimbing2){
            $query = $query->whereraw("att_value REGEXP '(?i)((pembimbing1).*?(".$pembimbing1."))'");
        }
        if($pembimbing2){
            $query = $query->whereraw("att_value REGEXP '(?i)((pembimbing1).*?(".$pembimbing2."))'");
        }
        if($subjek){
            $query = $query->whereraw("att_value REGEXP '(?i)((pembimbing1).*?(".$subjek."))'");
        }
        if($isbn_issn){
            $query = $query->whereraw("att_value REGEXP '(?i)((pembimbing1).*?(".$isbn_issn."))'");
        }
        if($bulan){
            $query = $query->whereraw("att_value REGEXP '(?i)((pembimbing1).*?(".$bulan."))'");
        }
        if($nomor){
            $query = $query->whereraw("att_value REGEXP '(?i)((pembimbing1).*?(".$nomor."))'");
        }
        if($volume){
            $query = $query->whereraw("att_value REGEXP '(?i)((pembimbing1).*?(".$volume."))'");
        }

        $katalog = $query->paginate(15);

        return view('katalog.index',compact('katalog','bahasa','lokasi','koleksi'));
    }
}
