<?php

namespace App\Http\Controllers;

use App\lokasi;
use Illuminate\Http\Request;

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\koleksi  $koleksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(koleksi $koleksi)
    {
        //
    }
}
