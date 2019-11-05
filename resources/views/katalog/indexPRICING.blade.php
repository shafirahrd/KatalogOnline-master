@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{ asset('css/pricing.css') }}">
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid"><br><br>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table color-table danger-table example">
                            {{-- <thead>
                                <tr>
                                    <th colspan=6>ADVANCED SEARCH</th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="background-color: white; color: black;"></th>
                                </tr>
                            </thead> --}}
                            
                            <tbody>
                                <form class="form-horizontal" action="/cari_katalog.php">
                                    <tr>
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="judul">Judul:</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" id="judul" placeholder="Masukkan kata kunci judul" name="judul">
                                          </div>
                                        </div>
                                    </tr><br>
                                    <tr>
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="penulis">Penulis:</label>
                                          <div class="col-sm-9">          
                                            <input type="text" class="form-control" id="penulis" placeholder="Masukkan kata kunci penulis" name="penulis">
                                          </div>
                                        </div>
                                    </tr><br>
                                    <tr>
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="penerbit">Penerbit:</label>
                                          <div class="col-sm-9">          
                                            <input type="text" class="form-control" id="penerbit" placeholder="Masukkan kata kunci penerbit" name="penerbit">
                                          </div>
                                        </div>
                                    </tr><br>
                                    <tr>
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="kota">Kota Terbit:</label>
                                          <div class="col-sm-9">          
                                            <input type="text" class="form-control" id="kota" placeholder="Masukkan kata kunci kota" name="kota">
                                          </div>
                                        </div>
                                    </tr><br>
                                    <tr>
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="tahun">Tahun Terbit:</label>
                                          <div class="col-sm-9">          
                                            <input type="text" class="form-control" id="tahun" placeholder="Masukkan tahun" name="tahun">
                                          </div>
                                        </div>
                                    </tr><br><br>

                                    <div class="col-md-3">
                                      <select class="md-form mdb-select colorful-select dropdown-primary">
                                        <option value="" disabled selected>Bahasa</option>
                                        <option value="1">Indonesia</option>
                                        <option value="2">Inggris</option>
                                      </select>
                                    </div>

                                    <div class="col-md-4">
                                      <select class="md-form mdb-select colorful-select dropdown-primary">
                                        <option value="" disabled selected>Lokasi Ruang Baca</option>
                                        <option value="1">Informatika</option>
                                        <option value="2">Desain Produk</option>
                                        <option value="3">Sistem Informasi</option> 
                                      </select>
                                    </div>

                                    <div class="col-md-3">
                                      <select class="md-form mdb-select colorful-select dropdown-primary">
                                        <option value="" disabled selected>Jenis Koleksi</option>
                                        <option value="1">Buku Teks</option>
                                        <option value="2">Buku Referensi</option>
                                        <option value="3">Buku Tugas Akhir</option>
                                      </select>
                                    </div><br><br>

                                    <div class="text-center">
                                        <button class="btn btn-primary">Cari
                                        <i class="fa fa-search-plus ml-2" aria-hidden="true"></i>
                                        </button>
                                    </div>
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
                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table color-table primary-table example">
                            <thead>
                                <tr>
                                    <th colspan=6>KATALOG</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="price-table-wrapper">
                        <?php $x=1; ?>
                        @foreach($katalog as $kg)
                        <div class="pricing-table">
                            <h2 class="pricing-table__header">{{$kg->judul}}</h2>
                            <img src="asset/image/logo_its.png" alt="Judul" />
                            <a class="pricing-table__button" href="#Detail" data-toggle="modal">Lihat Detail</a>
                            <ul class="pricing-table__list">
                                <li>{{$kg->penulis}}</li>
                                <li>{{$kg->jenis}}</li>
                                <li>{{$kg->tahun_terbit}}</li>
                                <li>Departemen {{$kg->lokasi}}</li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!--/.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection