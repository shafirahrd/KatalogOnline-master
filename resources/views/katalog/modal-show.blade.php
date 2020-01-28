<div class="modal fade" id="Detail-{{$kg->id_katalog}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true",>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <center><h2 class="modal-title" id="myLargeModalLabel">{{$kg->judul}}</h2></center>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="/images/default.jpg" style="width: 30%; height: 30%;">
                        <div class="tab-content br-n pn">
                            <div class="tab-pane active">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-10">
                                        <table class="table table-borderless fixed">
                                            <tbody class="detail-text text-left">
                                                <tr>
                                                    <td class="w1"><span class="text-muted weight-500">Judul Koleksi</span></td>
                                                                <td class="w0"><span class="text-muted weight-500">: </span></td>
                                                    <td class="w1"><span class="marginL5"> {{$kg->judul ?? '-'}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="text-muted weight-500">Jenis Koleksi</span></td>
                                                    <td><span class="text-muted weight-500">: </span></td>
                                                    <td><span class="marginL5">{{$kg->koleksi->jenis_koleksi ?? '-'}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="text-muted weight-500">Penulis</span></td>
                                                    <td><span class="text-muted weight-500">: </span></td>
                                                    <td><span class="marginL5">{{$kg->penulis ?? '-'}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="text-muted weight-500">Penerbit</span></td>
                                                    <td><span class="text-muted weight-500">: </span></td>
                                                    <td><span class="marginL5">{{$kg->penerbit ?? '-'}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="text-muted weight-500">Kota Penerbit</span></td>
                                                    <td><span class="text-muted weight-500">: </span></td>
                                                    <td><span class="marginL5">{{$kg->kota_penerbit ?? '-'}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="text-muted weight-500">Tahun Terbit</span></td>
                                                    <td><span class="text-muted weight-500">: </span></td>
                                                    <td><span class="marginL5">{{$kg->tahun_terbit ?? '-'}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="text-muted weight-500">Bahasa</span></td>
                                                    <td><span class="text-muted weight-500">: </span></td>
                                                    <td><span class="marginL5">{{$kg->bahasa ?? '-'}}</span></td>
                                                </tr>
                                                @if(!is_null($kg->att_value))
                                                    @foreach(json_decode($kg->att_value) as $ak => $as)
                                                        <tr>
                                                            <td><span class="text-muted weight-500">{{$ak ?? '-'}}</span></td>
                                                            <td><span class="text-muted weight-500">: </span></td>
                                                            <td><span class="marginL5">{{$as ?? '-'}}</span></td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                <tr>
                                                    <td><span class="text-muted weight-500">Deskripsi</span></td>
                                                    <td><span class="text-muted weight-500">: </span></td>
                                                    <td><span class="marginL5">{{$kg->deskripsi ?? '-'}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="text-muted weight-500">Lokasi Koleksi</span></td>
                                                    <td><span class="text-muted weight-500">: </span></td>
                                                    <td><span class="marginL5">Departemen {{$kg->lokasis->departemen ?? '-'}}</span></td>
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