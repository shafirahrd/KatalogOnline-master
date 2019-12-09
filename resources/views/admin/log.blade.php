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

                        <div id="modalMessage" class="modal fade" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Pesan</h4>
                              </div>
                              <div class="modal-body">
                                    <span class="message-green"><center>{{Session::get('message')}}</center></span>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <table class="table color-table success-table example">
                            <thead>
                                <tr>
                                    <th colspan=7>RIWAYAT PERUBAHAN DATA KATALOG</th>
                                </tr>
                                <tr>
                                    <th class="text-center th-header">No.</th>
                                    <th class="text-center th-header">Admin</th>
                                    <th class="text-center th-header">Ruang Baca</th>
                                    <th class="text-center th-header">Perubahan</th>
                                    <th class="text-center th-header">Tanggal</th>
                                    <th class="text-center th-header">Waktu</th>
                                    <th class="text-center th-header">Lihat Detail</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">                                
                                @foreach($log as $key => $lg)
                                <tr class="fuckOffPadding">
                                    <td class="vertical-align-middle">{{$log->firstItem()+$key}}</td>
                                    @foreach($user as $us)
                                        @if($us->id_log == $lg->id_log)
                                            <td class="vertical-align-middle">{{$us->nama}}</td>
                                            <td class="vertical-align-middle">{{$us->departemen}}</td>
                                        @endif
                                    @endforeach
                                    <td class="text-align-middle">{{$lg->log_change}}, {{$lg->judul}}</td>
                                    @if($lg->log_change == 'CREATED')
                                        <td class="vertical-align-middle">{{ date('d-F-Y',strtotime($lg->created_at)) }}</td>
                                        <td class="vertical-align-middle">{{ date('H:i:s',strtotime($lg->created_at)) }}</td>
                                    @elseif($lg->log_change == 'UPDATED')
                                        <td class="vertical-align-middle">{{ date('d-F-Y',strtotime($lg->updated_at)) }}</td>
                                        <td class="vertical-align-middle">{{ date('H:i:s',strtotime($lg->updated_at)) }}</td>
                                    @else
                                        <td class="vertical-align-middle">{{ date('d-F-Y',strtotime($lg->deleted_at)) }}</td>
                                        <td class="vertical-align-middle">{{ date('H:i:s',strtotime($lg->deleted_at)) }}</td>
                                    @endif
                                    <td class="vertical-align-middle">
                                        <span data-toggle="modal" data-target="#Detail-{{$lg->id_katalog}}">
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Lihat Detail Koleksi"><i class="fa fa-folder-open"></i></button>
                                        </span>

                                        <div class="modal fade" id="Detail-{{$lg->id_katalog}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true",>
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <center><h2 class="modal-title" id="myLargeModalLabel">{{$lg->judul}}</h2></center>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="panel panel-default">
                                                            <div class="panel-body">
                                                                <div class="tab-content br-n pn">
                                                                    <div class="tab-pane active">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-lg-10">
                                                                                <table class="table table-borderless">
                                                                                    <tbody class="detail-text text-left">
                                                                                        <tr>
                                                                                            <td class="w1"><span class="text-muted">Judul Koleksi</span></td>
                                                                                            <td class="w0"><span class="text-muted">: </span></td>
                                                                                            <td class="w1"><span class="marginL5"> {{$lg->judul}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted">Jenis Koleksi</span></td>
                                                                                            <td><span class="text-muted">: </span></td>
                                                                                            <td><span class="marginL5">{{$lg->jenis_koleksi}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted">Penulis</span></td>
                                                                                            <td><span class="text-muted">: </span></td>
                                                                                            <td><span class="marginL5">{{$lg->penulis}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted">Penerbit</span></td>
                                                                                            <td><span class="text-muted">: </span></td>
                                                                                            <td><span class="marginL5">{{$lg->penerbit}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted">Kota Penerbit</span></td>
                                                                                            <td><span class="text-muted">: </span></td>
                                                                                            <td><span class="marginL5">{{$lg->kota_penerbit}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted">Tahun Terbit</span></td>
                                                                                            <td><span class="text-muted">: </span></td>
                                                                                            <td><span class="marginL5">{{$lg->tahun_terbit}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted">Bahasa</span></td>
                                                                                            <td><span class="text-muted">: </span></td>
                                                                                            <td><span class="marginL5">{{$lg->bahasa}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted">Deskripsi</span></td>
                                                                                            <td><span class="text-muted">: </span></td>
                                                                                            <td><span class="marginL5">{{$lg->deskripsi}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted">Lokasi Koleksi</span></td>
                                                                                            <td><span class="text-muted">: </span></td>
                                                                                            <td><span class="marginL5">{{$lg->departemen}}</span></td>
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

@section('script')
@if(!empty(Session::get('message')))
    <script>
        $(function() {
            $('#modalMessage').modal('show');
        });
    </script>
@endif
@endsection