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
                        <table class="table color-table info-table example">
                            <thead>
                                <tr>
                                    <th colspan=5>DAFTAR RUANG BACA ITS TERINTEGRASI</th>
                                    <th>
                                        <button type="button" class="btn btn-default btn-rounded" data-toggle="modal" data-target="#tambah-lokasi"><i class="fa fa-plus"></i>  Lokasi</button>
                                        <div class="modal fade" id="tambah-lokasi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myLargeModalLabel" style="text-align: center; font-weight: 450;">Tambah Lokasi</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal form-material" action="{{ route('lokasi.store') }}" method = "POST">
                                                            {{ csrf_field() }}
                                                            <div class="form-group">
                                                                <label for="departemen" class="col-sm-3 control-label">Departemen</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="departemen" placeholder="Departemen" name="departemen">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="fakultas" class="col-sm-3 control-label">Fakultas</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="fakultas" placeholder="Fakultas" name="fakultas">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tautan" class="col-sm-3 control-label">Tautan</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="tautan" placeholder="Tautan" name="tautan">
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
                                    </th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="background-color: white; color: black;">No.</th>
                                    <th class="text-center" style="background-color: white; color: black;">Departemen</th>
                                    <th class="text-center" style="background-color: white; color: black;">Fakultas</th>
                                    <th class="text-center" style="background-color: white; color: black;">Alamat</th>
                                    <th class="text-center" style="background-color: white; color: black;">Tautan Ruang Baca</th>
                                    <th class="text-center" style="background-color: white; color: black;">@if(Auth::check())Aksi @else Lihat Berdasarkan Lokasi @endif</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $x=1; ?>
                                @foreach($lokasi as $lk)
                                <tr class="fuckOffPadding">
                                    <td style="vertical-align: middle;"><?php echo $x; $x=$x+1; ?></td>
                                    <td style="text-align: left;">{{$lk->departemen}}</td>
                                    <td style="vertical-align: middle;">{{$lk->fakultas}}</td>
                                    <td style="text-align: left;">{{$lk->alamat}}</td>
                                    <td style="vertical-align: middle;"><a href="http://{{$lk->tautan}}" target="_blank">{{$lk->tautan}}</td>
                                    <td style="vertical-align: middle;">
                                        <a href="{{ url('searchLokasi/'.$lk->departemen) }}" class="btn btn-default"><i class="ti-search" data-toggle="tooltip" data-placement="top" title="Lihat Berdasarkan Lokasi"></i></a>
                                        @if(Auth::check())
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-{{$lk->id_lokasi}}" data-plaement="top" title="Ubah Data Lokasi"><i class="ti-pencil-alt"></i></button>
                                            <div class="modal fade" id="edit-{{$lk->id_lokasi}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myLargeModalLabel" style="font-weight: 450;">Sunting {{$lk->departemen}}</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal form-material" action="{{ route('lokasi.update', ['lokasi'=>$lk->id_lokasi]) }}" method ="POST">
                                                                <div class="form-group">
                                                                    <label for="departemen" class="col-sm-3 control-label">Departemen</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" id="departemen" value="{{$lk->departemen}}" name="departemen">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fakultas" class="col-sm-3 control-label">Fakultas</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" id="fakultas" value="{{$lk->fakultas}}" name="fakultas">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" id="alamat" value="{{$lk->alamat}}" name="alamat">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tautan" class="col-sm-3 control-label">Tautan</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" id="tautan" value="{{$lk->tautan}}" name="tautan">
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

                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{$lk->id_lokasi}}" data-plaement="top" title="Hapus Data Lokasi"><i class="ti-trash"></i></button>
                                            <div class="modal fade" id="delete-{{$lk->id_lokasi}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myLargeModalLabel" style="font-weight: 450;">Hapus {{$lk->departemen}}</h4> 
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal form-material" action="{{ route('lokasi.destroy', ['lokasi'=>$lk->id_lokasi]) }}" method = "POST">
                                                            <input type="hidden" name="id" value="{{$lk->id_lokasi}}" />
                                                            <h5> Apakah Anda yakin untuk menghapus data lokasi "{{$lk->departemen}}"? </h5>
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
                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table color-table info-table example">
                            <thead>
                                <tr>
                                    <th colspan=6>Keterangan Fakultas</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>FADP</td>
                                    <td>: Fakultas Arsitektur, Desain, dan Perancangan</td>
                                </tr>
                                <tr>
                                    <td>FTSLK</td>
                                    <td>: Fakultas Teknik Sipil, Lingkungan, dan Kebumian</td>
                                </tr>
                                <tr>
                                    <td>FTIK</td>
                                    <td>: Fakultas Teknologi Informasi dan Komunikasi</td>
                                </tr>
                                <tr>
                                    <td>FTI</td>
                                    <td>: Fakultas Teknologi Industri</td>
                                </tr>
                                <tr>
                                    <td>FTE</td>
                                    <td>: Fakultas Teknologi Elektro</td>
                                </tr>
                                <tr>
                                    <td>FMKS</td>
                                    <td>: Fakultas Matematika, Komputasi, dan Sains Data</td>
                                </tr>
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