@extends('layouts.app')

@section('link')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid"><br><br>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table color-table success-table example">
                            <thead>
                                <tr>
                                    <th colspan=7>RIWAYAT PERUBAHAN DATA KOLEKSI</th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="background-color: white; color: black;">No.</th>
                                    <th class="text-center" style="background-color: white; color: black;">Admin</th>
                                    <th class="text-center" style="background-color: white; color: black;">Ruang Baca</th>
                                    <th class="text-center" style="background-color: white; color: black;">Perubahan</th>
                                    <th class="text-center" style="background-color: white; color: black;">Tanggal</th>
                                    <th class="text-center" style="background-color: white; color: black;">Waktu</th>
                                    <th class="text-center" style="background-color: white; color: black;">Lihat Detail</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $x=1; ?>
                                @foreach($log as $lg)
                                <tr class="fuckOffPadding">
                                    <td style="vertical-align: middle;"><?php echo $x; $x=$x+1; ?></td>
                                    <td style="vertical-align: middle;">{{$lg->nama}}</td>
                                    <td style="vertical-align: middle;">{{$lg->departemen}}</td>
                                    <td style="text-align: left;">{{$lg->log_change}}, {{$lg->judul}}</td>
                                    @if($lg->log_change == 'CREATED')
                                        <td style="vertical-align: middle;">{{ date('d-F-Y',strtotime($lg->created_at)) }}</td>
                                        <td style="vertical-align: middle;">{{ date('H:i:s',strtotime($lg->created_at)) }}</td>
                                    @elseif($lg->log_change == 'UPDATED')
                                        <td style="vertical-align: middle;">{{ date('d-F-Y',strtotime($lg->updated_at)) }}</td>
                                        <td style="vertical-align: middle;">{{ date('H:i:s',strtotime($lg->updated_at)) }}</td>
                                    @else
                                        <td style="vertical-align: middle;">{{ date('d-F-Y',strtotime($lg->deleted_at)) }}</td>
                                        <td style="vertical-align: middle;">{{ date('H:i:s',strtotime($lg->deleted_at)) }}</td>
                                    @endif
                                    <td style="vertical-align: middle;">
                                        <span data-toggle="modal" data-target="#Detail-{{$lg->id_katalog}}">
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Lihat Detail Koleksi"><i class="fa fa-folder-open"></i></button>
                                        </span>

                                        <div class="modal fade" id="Detail-{{$lg->id_katalog}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true",>
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <center><h2 class="modal-title" id="myLargeModalLabel" style="font-weight: 450;">{{$lg->judul}}</h2></center>
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
                                                                                            <td style="width: 1%"><span style="margin-left: 5%;"> {{$lg->judul}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted" style="font-weight: 500">Jenis Koleksi</span></td>
                                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                                            <td><span style="margin-left: 5%;">{{$lg->jenis_koleksi}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted" style="font-weight: 500">Penulis</span></td>
                                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                                            <td><span style="margin-left: 5%;">{{$lg->penulis}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted" style="font-weight: 500">Penerbit</span></td>
                                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                                            <td><span style="margin-left: 5%;">{{$lg->penerbit}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted" style="font-weight: 500">Kota Penerbit</span></td>
                                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                                            <td><span style="margin-left: 5%;">{{$lg->kota_penerbit}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted" style="font-weight: 500">Tahun Terbit</span></td>
                                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                                            <td><span style="margin-left: 5%;">{{$lg->tahun_terbit}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted" style="font-weight: 500">Bahasa</span></td>
                                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                                            <td><span style="margin-left: 5%;">{{$lg->bahasa}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted" style="font-weight: 500">Deskripsi</span></td>
                                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                                            <td><span style="margin-left: 5%;">{{$lg->deskripsi}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted" style="font-weight: 500">Lokasi Koleksi</span></td>
                                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                                            <td><span style="margin-left: 5%;">{{$lg->departemen}}</span></td>
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
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$log->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!--/.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection