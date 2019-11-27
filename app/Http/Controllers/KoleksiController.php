<?php

namespace App\Http\Controllers;

use DB;
use App\Katalog;
use App\Koleksi;
use App\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class KoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $koleksi = Koleksi::all();

        return view('koleksi.index',compact('koleksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $koleksi = New Koleksi;
        $koleksi->jenis_koleksi = $request->Input('jenis_koleksi');
        $koleksi->deskripsi_koleksi = $request->Input('deskripsi_koleksi');
        $koleksi->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function show(koleksi $koleksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function edit(koleksi $koleksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, koleksi $koleksi)
    {
        $data = Koleksi::find($koleksi->id_koleksi);
        $data->jenis_koleksi = Input::get('jenis_koleksi');
        $data->deskripsi_koleksi = Input::get('deskripsi_koleksi');
        $data->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Koleksi::find($request->id);
        $data->delete();

        return back();
    }

    public function searchByKoleksi($koleksis)
    {
        // $katalog = Katalog::whereHas('lokasis')
        // ->whereHas('koleksi', function($query) use($koleksis){
        //     $query->where('jenis_koleksi','=',$koleksis);
        // })->paginate(15);

        $katalog = DB::table('katalogs')
            ->leftjoin('koleksis','id_koleksi','=','jenis')
            ->leftjoin('lokasis','id_lokasi','=','lokasi')
            ->where('jenis_koleksi',$koleksis)->paginate(15);

        $bahasa = Katalog::select('bahasa')->groupBy('bahasa')->get();
        $lokasi = Lokasi::select('departemen')->get();
        $koleksi = Koleksi::get();

        return view('katalog.index',compact('katalog','bahasa','lokasi','koleksi'));
    }
}
