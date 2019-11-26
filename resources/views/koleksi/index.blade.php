@extends('layouts.app')

@section('link')

<script src="{{asset('asset/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('pelanggan/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('pelanggan/assets/js/bootstrap.js')}}"></script>
        
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
                                    <th colspan=6>DAFTAR KOLEKSI</th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="background-color: white; color: black;">No.</th>
                                    <th class="text-center" style="background-color: white; color: black;">Jenis Koleksi</th>
                                    <th class="text-center" style="background-color: white; color: black;">Deskripsi</th>
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
                                        @if(Auth::check())
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