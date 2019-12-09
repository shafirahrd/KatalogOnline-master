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
                                    <th colspan=3>DAFTAR KOLEKSI</th>
                                    <th>
                                        @if(Auth::check() && Auth::user()->user_role == 1)
                                        <button type="button" class="btn btn-default btn-rounded" data-toggle="modal" data-target="#tambah-koleksi"><i class="fa fa-plus"></i>  Koleksi</button>
                                        <div class="modal fade" id="tambah-koleksi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myLargeModalLabel" style="text-align: center; font-weight: 450;">Tambah Koleksi</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal form-material" action="{{ route('koleksi.store') }}" method = "POST">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <label for="jenis_koleksi" class="col-sm-3 control-label">Jenis Koleksi</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="jenis_koleksi" placeholder="Jenis Koleksi" name="jenis_koleksi">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="deskripsi_koleksi" class="col-sm-3 control-label">Deskripsi Koleksi</label>
                                                                <div class="col-sm-9">
                                                                    <textarea class="form-control" rows="5" placeholder="Deskripsi Koleksi" name="deskripsi_koleksi"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-b-0">
                                                                <a href="#" class="fcbtn btn btn-default btn-1f m-r-10 m-t-10" data-dismiss="modal" style="padding-top: 5.5px; padding-bottom: 5.5px; float: right; margin-left: 10px">Keluar</a>
                                                                <button type="submit" style="float: right;" class="btn btn-danger waves-effect waves-light m-t-10">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="background-color: white; color: black;">No.</th>
                                    <th class="text-center" style="background-color: white; color: black;">Jenis Koleksi</th>
                                    <th class="text-center" style="background-color: white; color: black; width:65%;">Deskripsi</th>
                                    <th class="text-center" style="background-color: white; color: black;">@if(Auth::check())Aksi @else Lihat Berdasarkan Koleksi @endif</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $x=1; ?>
                                @foreach($koleksi as $ks)
                                {{-- {{dd($ks->formatted_column[0])}} --}}
                                <tr class="fuckOffPadding">
                                    <td style="vertical-align: middle;"><?php echo $x; $x=$x+1; ?></td>
                                    <td style="vertical-align: middle;">{{$ks->jenis_koleksi}}</td>
                                    <td style="vertical-align: middle; text-align: left;">{{$ks->deskripsi_koleksi}}</td>
                                    <td style="vertical-align: middle;">
                                        <a href="{{ url('searchKoleksi/'.$ks->jenis_koleksi) }}" class="btn btn-default"><i class="ti-search" data-toggle="tooltip" data-placement="top" title="Lihat Koleksi"></i></a>
                                        @if(Auth::check() && Auth::user()->user_role == 1)
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-{{$ks->id_koleksi}}" data-plaement="top" title="Ubah Data Koleksi"><i class="ti-pencil-alt"></i></button>
                                            <div class="modal fade" id="edit-{{$ks->id_koleksi}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myLargeModalLabel" style="font-weight: 450;">Sunting {{$ks->jenis_koleksi}}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal form-material" action="{{ route('koleksi.update', ['koleksi'=>$ks->id_koleksi]) }}" method ="POST">
                                                                <div class="form-group">
                                                                    <label for="jenis_koleksi" class="col-sm-3 control-label">Jenis Koleksi</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" id="jenis_koleksi" value="{{$ks->jenis_koleksi}}" name="jenis_koleksi">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="deskripsi_koleksi" class="col-sm-3 control-label">Deskripsi Koleksi</label>
                                                                    <div class="col-sm-9">
                                                                        <textarea class="form-control" rows="5" name="deskripsi_koleksi">{{$ks->deskripsi_koleksi}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group m-b-0">
                                                                    <a href="#" class="fcbtn btn btn-default btn-1f m-r-10 m-t-10" data-dismiss="modal" style="padding-top: 5.5px; padding-bottom: 5.5px; float: right; margin-left: 10px">Keluar</a>
                                                                    <button type="submit" style="float: right;" class="btn btn-danger waves-effect waves-light m-t-10">Simpan</button>
                                                                </div>
                                                                @method('PUT')
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{$ks->id_koleksi}}" data-plaement="top" title="Hapus Data Koleksi"><i class="ti-trash"></i></button>
                                            <div class="modal fade" id="delete-{{$ks->id_koleksi}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myLargeModalLabel" style="font-weight: 450;">Hapus {{$ks->jenis_koleksi}}</h4> 
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal form-material" action="{{ route('koleksi.destroy', ['koleksi'=>$ks->id_koleksi]) }}" method = "POST">
                                                            <input type="hidden" name="id" value="{{$ks->id_koleksi}}" />
                                                            <h5> Apakah Anda yakin untuk menghapus data koleksi "{{$ks->jenis_koleksi}}"? </h5>
                                                                <div class="form-group m-b-0">
                                                                    <a href="#" class="fcbtn btn btn-default btn-1f m-r-10 m-t-10" data-dismiss="modal" style="padding-top: 5.5px; padding-bottom: 5.5px; float: right; margin-left: 10px">Keluar</a>
                                                                    <button type="submit" style="float: right;" class="btn btn-danger waves-effect waves-light m-t-10">Hapus</button>
                                                                </div>
                                                                @method('delete')
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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