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
        // $katalog = DB::table('katalogs')
        //     ->leftjoin('koleksis','id_koleksi','=','jenis')
        //     ->leftjoin('lokasis','id_lokasi','=','lokasi')
        //     ->paginate(15);

        if(Auth::check() && Auth::user()->user_role == 0){
            $katalog = Katalog::with('koleksi','lokasis')
                        ->where('deleted_at',NULL)
                        ->where('lokasi',Auth::user()->user_lokasi)
                        ->paginate(15);
        }else{
            $katalog = Katalog::with('koleksi','lokasis')->where('deleted_at',NULL)->paginate(15);
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

        // DB::table('katalogs')->where('id_katalog',$katalog->id_katalog)->update([
        //     'judul' => $katalog->judul,
        //     'jenis' => $katalog->jenis,
        //     'penulis' => $katalog->penulis,
        //     'penerbit' => $katalog->penerbit,
        //     'kota_penerbit' => $katalog->kota_penerbit,
        //     'tahun_terbit' => $katalog->tahun_terbit,
        //     'bahasa' => $katalog->bahasa,
        //     'deskripsi' => $katalog->deskripsi,
        //     'lokasi' => $katalog->lokasi
        // ]);

        return redirect('/katalog');
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
        $output = '';
        $query = $request->get('query');
        if($query != ''){

            $q = Katalog::where('deleted_at',NULL);
            $temp = $q->leftjoin('koleksis','id_koleksi','=','jenis')
                ->leftjoin('lokasis','id_lokasi','=','lokasi');
            $data = $temp->where('judul','LIKE','%'.$query.'%')
                ->orWhere('jenis_koleksi','LIKE','%'.$query.'%')
                        ->orWhere('penulis','LIKE','%'.$query.'%')
                        ->orWhere('tahun_terbit','LIKE','%'.$query.'%')
                        ->orWhere('departemen','LIKE','%'.$query.'%')->get();

        }else{
            $data = Katalog::with('koleksi','lokasis')->get();
        }
        
        if($data->count() > 0){
            $x = 1;
            foreach ($data as $row) {
                $output .= '
                <tr>
                    <td>'.$x.'</td>
                    <td>'.$row->judul.'</td>
                    <td>'.$row->jenis_koleksi.'</td>
                    <td>'.$row->penulis.'</td>
                    <td>'.$row->tahun_terbit.'</td>
                    <td>'.$row->lokasi.'</td>
                    <td>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#Detail-'.$row->id_katalog.'" data-plaement="top" title="Lihat Detail Koleksi"><i class="fa fa-folder-open"></i></button>
                        <div class="modal fade" id="Detail-'.$row->id_katalog.'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true",>
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <center><h2 class="modal-title" id="myLargeModalLabel" style="font-weight: 450;">'.$row->judul.'</h2></center>
                                    </div>
                                    <div class="modal-body">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="tab-content br-n pn">
                                                    <div class="tab-pane active">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-lg-10">
                                                                <table class="table table-borderless" style="table-layout: fixed">
                                                                    <tbody class="detail-text text-left">
                                                                        <tr>
                                                                            <td style="width: 1%"><span class="text-muted" style="font-weight: 500;">Judul Koleksi</span></td>
                                                                            <td style="width: 0%"><span class="text-muted" style="font-weight: 500;">: </span></td>
                                                                            <td style="width: 1%"><span style="margin-left: 5%;"> '.$row->judul.'</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span class="text-muted" style="font-weight: 500">Jenis Koleksi</span></td>
                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                            <td><span style="margin-left: 5%;">
                                                                                '.$row->jenis_koleksi.'
                                                                            </span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span class="text-muted" style="font-weight: 500">Penulis</span></td>
                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                            <td><span style="margin-left: 5%;">'.$row->penulis.'</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span class="text-muted" style="font-weight: 500">Penerbit</span></td>
                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                            <td><span style="margin-left: 5%;">'.$row->penerbit.'</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span class="text-muted" style="font-weight: 500">Kota Penerbit</span></td>
                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                            <td><span style="margin-left: 5%;">'.$row->kota_penerbit.'</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span class="text-muted" style="font-weight: 500">Tahun Terbit</span></td>
                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                            <td><span style="margin-left: 5%;">'.$row->tahun_terbit.'</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span class="text-muted" style="font-weight: 500">Bahasa</span></td>
                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                            <td><span style="margin-left: 5%;">'.$row->bahasa.'</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span class="text-muted" style="font-weight: 500">Deskripsi</span></td>
                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                            <td><span style="margin-left: 5%;">'.$row->deskripsi.'</span></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><span class="text-muted" style="font-weight: 500">Lokasi Koleksi</span></td>
                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                            <td><span style="margin-left: 5%;">
                                                                                '.$row->departemen.'
                                                                            </span></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form class="form-horizontal form-material" action="{{ route(`katalog.edit`, [`katalog`=>'.$row->id_katalog.']) }}" method = "GET">
                            <button type="submit" class="btn btn-warning" title="Ubah Katalog"><i class="ti-pencil-alt"></i></button>
                            <input type="hidden" name="id" value="'.$row->id_katalog.'" />
                        </form>

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-'.$row->id_katalog.'" data-plaement="top" title="Hapus Data Katalog"><i class="ti-trash"></i></button>
                        <div class="modal fade" id="delete-'.$row->id_katalog.'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel" style="font-weight: 450;">Hapus '.$row->judul.'</h4> 
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal form-material" action="{{ route(`katalog.destroy`, [`katalog`=>'.$row->id_katalog.']) }}" method = "POST">
                                        <input type="hidden" name="id" value="'.$row->id_katalog.'" />
                                        <h5> Apakah Anda yakin untuk menghapus data katalog "'.$row->judul.'"? </h5>
                                            <div class="form-group m-b-0">
                                                <a href="#" class="fcbtn btn btn-default btn-1f m-r-10 m-t-10" data-dismiss="modal" style="padding-top: 5.5px; padding-bottom: 5.5px; float: right; margin-left: 10px">Keluar</a>
                                                <button type="submit" style="float: right;" class="btn btn-danger waves-effect waves-light m-t-10">Hapus</button>
                                            </div>
                                            @method(`delete`)
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                ';
                $x += 1;
            }
        }else{
            $output .= '
            <tr>
                <td align="center" colspan="5"> Tidak ada data yang ditemukan</td>
            </tr>
            ';
        }

        $data = array(
            'table_data'    => $output
            // 'total_data'    => $total_data
        );

        echo json_encode($data);
    }

    // public function limit($value, $limit)
    // {
    //     if (mb_strwidth($value, 'UTF-8') <= $limit) {
    //         return $value;
    //     }

    //     return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')).$end;
    // }
}
