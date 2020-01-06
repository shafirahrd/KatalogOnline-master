<?php

namespace App\Http\Controllers;

use DB;
use App\Katalog;
use App\Koleksi;
use App\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokasi = lokasi::all();

        return view('lokasi.index',compact('lokasi'));
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
        $lok = Lokasi::where("departemen",'LIKE','%'.Input::get('departemen').'%')->first();

        if($lok){
            return back()->with('message','Data lokasi sudah ada');
        }else{   
            $lokasi = New Lokasi;
            $lokasi->departemen = $request->Input('departemen');
            $lokasi->fakultas = $request->Input('fakultas');
            $lokasi->alamat = $request->Input('alamat');
            $lokasi->tautan = $request->Input('tautan');
            $lokasi->save();
            return back()->with('message','Data lokasi berhasil ditambah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function show(lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function edit(koleksi $lokasi)
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
    public function update(Request $request, lokasi $lokasi)
    {
        $lok = Lokasi::where("departemen",'LIKE','%'.Input::get('departemen').'%')->first();

        // if($lok && $lok->fakultas != $request->Input('fakultas') || $lok->alamat != $request->Input('alamat') || $lok->tautan != $request->Input('tautan')){
        //     return back()->with('message','Data lokasi sudah ada');
        // }else{   
            $data = Lokasi::find($lokasi->id_lokasi);
            $data->departemen = Input::get('departemen');
            $data->fakultas = Input::get('fakultas');
            $data->alamat = Input::get('alamat');
            $data->tautan = Input::get('tautan');
            $data->save();

            return back()->with('message','Data lokasi berhasil diubah');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Lokasi::find($request->id);
        $data->delete();

        return back()->with('message','Data lokasi berhasil dihapus');
    }

    public function searchByLokasi($lokasis)
    {
        $katalog = Katalog::whereHas('koleksi')
        ->whereHas('lokasis', function($query) use($lokasis){
            $query->where('departemen','=',$lokasis);
        })->paginate(15);
            
        $bahasa = Katalog::select('bahasa')->groupBy('bahasa')->get();
        $lokasi = Lokasi::select('departemen')->get();
        $koleksi = Koleksi::get();

        return view('katalog.index',compact('katalog','bahasa','lokasi','koleksi'));
    }
}
