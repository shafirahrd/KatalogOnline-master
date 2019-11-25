@extends('layouts.app')

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
                                    <th colspan=6>EDIT KATALOG</th>
                                </tr>
                            </thead>
                        </table><br>
                        <table class="table color-table success-table example">                           
                            <tbody>
                                <form class="form-horizontal" action="{{ route('katalog.update', ['katalog'=>$katalog->id_katalog]) }}" method="POST">
                                    <tr>
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="judul">Judul:</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" id="judul" placeholder="Masukkan kata kunci judul" name="judul" value="{{$katalog->judul}}">
                                          </div>
                                        </div>
                                    </tr><br>
                                    <tr>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="koleksi">Jenis Koleksi:</label>
                                            <div class="col-md-3">
                                                <select class="md-form mdb-select colorful-select dropdown-primary form-control" name="koleksi">
                                                    @foreach($koleksi as $ks)
                                                        <option value="{{$ks->id_koleksi}}"
                                                        @if($ks->jenis_koleksi == $katalog->jenis_koleksi)
                                                            selected
                                                        @endif
                                                        >{{$ks->jenis_koleksi}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </tr><br>
                                    <tr>
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="penulis">Penulis:</label>
                                          <div class="col-sm-9">          
                                            <input type="text" class="form-control" id="penulis" placeholder="Masukkan kata kunci penulis" name="penulis" value="{{$katalog->penulis}}">
                                          </div>
                                        </div>
                                    </tr><br>
                                    <tr>
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="penerbit">Penerbit:</label>
                                          <div class="col-sm-9">          
                                            <input type="text" class="form-control" id="penerbit" placeholder="Masukkan kata kunci penerbit" name="penerbit" value="{{$katalog->penerbit}}">
                                          </div>
                                        </div>
                                    </tr><br>
                                    <tr>
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="kota">Kota Terbit:</label>
                                          <div class="col-sm-9">          
                                            <input type="text" class="form-control" id="kota" placeholder="Masukkan kata kunci kota" name="kota" value="{{$katalog->kota_penerbit}}">
                                          </div>
                                        </div>
                                    </tr><br>
                                    <tr>
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="tahun">Tahun Terbit:</label>
                                          <div class="col-sm-9">          
                                            <input type="text" class="form-control" id="tahun" placeholder="Masukkan tahun" name="tahun" value="{{$katalog->tahun_terbit}}">
                                          </div>
                                        </div>
                                    </tr><br>
                                    <tr>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="bahasa">Bahasa:</label>
                                            <div class="col-md-3">
                                                <select class="md-form mdb-select colorful-select dropdown-primary form-control" name="bahasa">
                                                    <option value="{{$katalog->bahasa}}" selected>{{$katalog->bahasa}}</option>
                                                    @foreach($bahasa as $b)
                                                        <option value="{{$b->bahasa}}" @if($b->bahasa == $katalog->bahasa) selected @endif >{{$b->bahasa}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </tr><br>
                                    <tr>
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="deskripsi">Deskripsi:</label>
                                          <div class="col-sm-9">          
                                            <input type="textarea" class="form-control" id="deskripsi" placeholder="Masukkan deskripsi" name="deskripsi" value="{{$katalog->deskripsi}}">
                                          </div>
                                        </div>
                                    </tr><br>
                                    <tr>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="lokasi">Lokasi:</label>
                                            <div class="col-md-3">
                                                <select class="md-form mdb-select colorful-select dropdown-primary form-control" name="lokasi">
                                                    <option value="{{$katalog->id_lokasi}}" selected>{{$katalog->departemen}}</option>
                                                    @foreach($lokasi as $l)
                                                        <option value="{{$l->id_lokasi}}" @if($l->departemen == $katalog->departemen) selected @endif >{{$l->departemen}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </tr><br>

                                    <br>
                                    <div class="text-center">
                                        <a href="/katalog" class="btn btn-default" role="button">Kembali</a>
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                    @method('PUT')
                                    @csrf
                                </form>
                            </tbody><br>

                            <thead>
                                <tr>
                                    <th colspan=6></th>
                                </tr>
                            </thead>
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