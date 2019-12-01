<div class="modal fade" id="Detail-{{$kg->id_katalog}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true",>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <center><h2 class="modal-title" id="myLargeModalLabel" style="font-weight: 450;">{{$kg->judul}}</h2></center>
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
                                                <td style="width: 1%"><span style="margin-left: 5%;"> {{$kg->judul ?? '-'}}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="text-muted" style="font-weight: 500">Jenis Koleksi</span></td>
                                                <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                <td><span style="margin-left: 5%;">{{$kg->koleksi->jenis_koleksi ?? '-'}}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="text-muted" style="font-weight: 500">Penulis</span></td>
                                                <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                <td><span style="margin-left: 5%;">{{$kg->penulis ?? '-'}}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="text-muted" style="font-weight: 500">Penerbit</span></td>
                                                <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                <td><span style="margin-left: 5%;">{{$kg->penerbit ?? '-'}}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="text-muted" style="font-weight: 500">Kota Penerbit</span></td>
                                                <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                <td><span style="margin-left: 5%;">{{$kg->kota_penerbit ?? '-'}}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="text-muted" style="font-weight: 500">Tahun Terbit</span></td>
                                                <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                <td><span style="margin-left: 5%;">{{$kg->tahun_terbit ?? '-'}}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="text-muted" style="font-weight: 500">Bahasa</span></td>
                                                <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                <td><span style="margin-left: 5%;">{{$kg->bahasa ?? '-'}}</span></td>
                                            </tr>
                                            {{-- @foreach(json_decode($kg->att_value) as $ak=>$as)
                                                @if(!is_null($ak))
                                                    <tr>
                                                        <td><span class="text-muted" style="font-weight: 500">{{$ak ?? '-'}}</span></td>
                                                        <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                        <td><span style="margin-left: 5%;">{{$as ?? '-'}}</span></td>
                                                    </tr>
                                                @else
                                                    @continue
                                                @endif
                                                @endforeach --}}
                                                <tr>
                                                    <td><span class="text-muted" style="font-weight: 500">Deskripsi</span></td>
                                                    <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                    <td><span style="margin-left: 5%;">{{$kg->deskripsi ?? '-'}}</span></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="text-muted" style="font-weight: 500">Lokasi Koleksi</span></td>
                                                    <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                    <td><span style="margin-left: 5%;">{{$kg->lokasis->departemen ?? '-'}}</span></td>
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