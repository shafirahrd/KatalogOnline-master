<?php

namespace App\Http\Controllers;

use DB;
use App\Katalog;
use App\Koleksi;
use App\Lokasi;
use App\Temp;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $katalog = DB::table('katalogs')
        //     ->leftjoin('koleksis','id_koleksi','=','jenis')
        //     ->leftjoin('lokasis','id_lokasi','=','lokasi')
        //     ->paginate(15);

        $katalog = Katalog::with('koleksi','lokasis')->paginate(15);

        $bahasa = Katalog::select('bahasa')->groupBy('bahasa')->get();
        $lokasi = Lokasi::select('departemen')->get();
        $koleksi = Koleksi::select('jenis_koleksi')->get();

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
    public function edit(katalog $katalog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\katalog  $katalog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, katalog $katalog)
    {
        //
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

        return back();

    }

    // public function limit($value, $limit)
    // {
    //     if (mb_strwidth($value, 'UTF-8') <= $limit) {
    //         return $value;
    //     }

    //     return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')).$end;
    // }
}
