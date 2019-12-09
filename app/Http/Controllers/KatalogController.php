<?php

namespace App\Http\Controllers;

use DB;
use App\Katalog;
use App\Koleksi;
use App\Lokasi;
use App\Temp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class KatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::check() && Auth::user()->user_role == 0){
            $katalog = Katalog::with('koleksi','lokasis')
                        ->where('lokasi',Auth::user()->user_lokasi)
                        ->paginate(15);
        }else{
            $katalog = Katalog::with('koleksi','lokasis')->paginate(15);
        }

        $bahasa = Katalog::select('bahasa')->groupBy('bahasa')->get();
        $lokasi = Lokasi::select('departemen')->get();
        $koleksi = Koleksi::get();

        return view('katalog.index',compact('katalog','bahasa','lokasi','koleksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(temp $temp)
    {
        // $katalog = Katalog::firstOrCreate(['judul' => $temp['judul']],['jenis']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function show(katalog $katalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $katalog = Katalog::with('koleksis','lokasi')->first();
        $katalog = DB::table('katalogs')
                    ->leftjoin('koleksis','id_koleksi','=','jenis')
                    ->leftjoin('lokasis','id_lokasi','=','lokasi')
                    ->where('id_katalog',$id)
                    ->first();

        $bahasa = Katalog::select('bahasa')->groupBy('bahasa')->get();
        $lokasi = Lokasi::select('id_lokasi','departemen')->get();
        $koleksi = Koleksi::get();
        
        return view('katalog.edit',compact('katalog','bahasa','lokasi','koleksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function update(katalog $katalog)
    {
        // dd(Input::all());

        $data = Katalog::find($katalog->id_katalog);
        $data->judul = Input::get('judul');
        $data->jenis = Input::get('koleksi');
        $data->penulis = Input::get('penulis');
        $data->penerbit = Input::get('penerbit');
        $data->kota_penerbit = Input::get('kota');
        $data->tahun_terbit = Input::get('tahun');
        $data->bahasa = Input::get('bahasa');
        $data->deskripsi = Input::get('deskripsi');
        $data->lokasi = Input::get('lokasi');
        $data->save();

        return redirect('/katalog')->with('message','Data katalog berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, katalog $katalog)
    {
        $data = Katalog::find($request->id);
        $data->delete();

        return back()->with('message','Data katalog berhasil dihapus');

    }

    public function action(Request $request)
    {   
        $output = '';
        $query = $request->get('query');
        if($query != ''){

            $temp = Katalog::with('koleksi','lokasis');
            $data = $temp->orWhereHas('koleksi',function($q) use($query){
                $q->where('jenis_koleksi','LIKE','%'.$query.'%');
            })->orWhereHas('lokasis',function($q) use($query){
                $q->where('departemen','LIKE','%'.$query.'%');
            })->orWhere('judul','LIKE','%'.$query.'%')
            ->orWhere('penulis','LIKE','%'.$query.'%')
            ->orWhere('tahun_terbit','LIKE','%'.$query.'%')->get();

        }else{
            $data = Katalog::with('koleksi','lokasis')->get();
        }

        echo json_encode($data);
    }
}
