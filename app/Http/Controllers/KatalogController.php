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

    public function action(Request $request)
    {
        if($request->ajax()){
            $output = '';
            $query = $request->get('query');
            if($query != ''){
                $data = DB::table('katalogs')
                            ->leftjoin('koleksis','id_koleksi','=','jenis')
                            ->leftjoin('lokasis','id_lokasi','=','lokasi')
                            ->where('judul','LIKE','%'.$query.'%')
                            ->orWhere('jenis_koleksi','LIKE','%'.$query.'%')
                            ->orWhere('penulis','LIKE','%'.$query.'%')
                            ->orWhere('tahun_terbit','LIKE','%'.$query.'%')
                            ->orWhere('departemen','LIKE','%'.$query.'%')
                            ->get();
            }else{
                $data = Katalog::with('koleksi','lokasis')->get();
            }

            $total_row = $data->count();
            if($total_row > 0){
                foreach ($data as $row) {
                    $output = '
                    <tr>
                        <td>'.$row->Judul.'</td>
                        <td>'.$row->JenisKoleksi.'</td>
                        <td>'.$row->Penulis.'</td>
                        <td>'.$row->TahunTerbit.'</td>
                        <td>'.$row->Lokasi.'</td>
                    </tr>
                    ';
                }
            }else{
                $output = '
                <tr>
                    <td align="center" colspan="5"> Tidak ada data yang ditemukan</td>
                </tr>
                ';
            }

            $data = array(
                'table_data'    => $output,
                'total_data'    => $total_data
            );

            echo json_encode($data);
        }
    }

    // public function limit($value, $limit)
    // {
    //     if (mb_strwidth($value, 'UTF-8') <= $limit) {
    //         return $value;
    //     }

    //     return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')).$end;
    // }
}
