@extends('layouts.app')

@section('link')
<link href="{{asset('css/upload.css')}}" rel="stylesheet">
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
@endsection

@section('content')
<div id="page-wrapper">
    <div class="container-fluid"><br><br>
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="table-responsive">
                        <div class="white-box">
                            <div class="table-responsive">
                                <h3>PETUNJUK</h3>
                                <p>
                                    Pada halaman ini, sesuaikan data kolom dengan nama header (keterangan header ada di bagian bawah)<br>
                                </p>
                            </div>
                            {{-- <a href="/home" class="btn btn-success">UNGGAH FILE EXCEL</a>
                            <a href="{{ route('uploadcsv') }}" class="btn btn-warning">UNGGAH FILE CSV</a> --}}
                            {{-- <a href="/home" class="btn btn-primary">UNGGAH FILE SQL</a> --}}
                        </div>
                        <table class="table color-table warning-table example">
                            <thead>
                                <tr>
                                    <th colspan=6>PARSING DATA</th>
                                </tr>
                            </thead>
                        </table>
                        <table class="table color-table warning-table example">
                            <tbody class="text-center">
                                <div class="file-upload">
                                  <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" id="parseData">
                                    {{csrf_field()}}
                                    @if($type == "excel")
                                        <input type="hidden" name="excel_data_file" value="{{ $excel_data_file->id }}">

                                        <table class="table">
                                          @if(isset($excel_header_fields))
                                            <tr>
                                              @foreach($excel_header_fields as $headers)
                                                <th>{{$headers}}</th>
                                              @endforeach
                                            </tr>
                                          @endif

                                          @foreach($excel_data as $data)
                                            @if(isset($excel_header_fields))
                                              @if($loop->first) @continue @endif
                                            @endif
                                            <tr>
                                              @foreach($data as $dt => $value)
                                                <td>{{$value}}</td>
                                              @endforeach
                                            </tr>
                                          @endforeach

                                          <tr>
                                            
                                            @foreach($excel_data[0] as $key => $value)
                                              <td>
                                                <select name="fields[{{$key}}]">
                                                    <option value="">null</option>
                                                  @foreach($column_katalog as $ckg)
                                                    <option value="{{ (\Request::has('header')) ? $ckg : $loop->index }}"
                                                    @if($value === $ckg) selected @endif>{{ $ckg }}</option>
                                                  @endforeach
                                                </select>
                                              </td>
                                            @endforeach
                                          </tr>
                                        </table>
                                    @else
                                        <input type="hidden" name="csv_data_file" value="{{ $csv_data_file->id }}">

                                        <table class="table">
                                          @if(isset($csv_header_fields))
                                            <tr>
                                              @foreach($csv_header_fields as $headers)
                                                <th>{{$headers}}</th>
                                              @endforeach
                                            </tr>
                                          @endif

                                          @foreach($csv_data as $data)
                                            @if(isset($csv_header_fields))
                                              @if($loop->first) @continue @endif
                                            @endif
                                            <tr>
                                              @foreach($data as $dt => $value)
                                                <td>{{$value}}</td>
                                              @endforeach
                                            </tr>
                                          @endforeach

                                          <tr>
                                            
                                            @foreach($csv_data[0] as $key => $value)
                                              <td>
                                                <select name="fields[{{$key}}]">
                                                    <option value="">null</option>
                                                  @foreach($column_katalog as $ckg)
                                                    <option value="{{ (\Request::has('header')) ? $ckg : $loop->index }}"
                                                    @if($value === $ckg) selected @endif>{{ $ckg }}</option>
                                                  @endforeach
                                                </select>
                                              </td>
                                            @endforeach
                                          </tr>
                                        </table>
                                    @endif

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="lokasi">Lokasi Koleksi:</label>
                                        <div class="col-md-3">
                                            <select class="md-form mdb-select colorful-select dropdown-primary form-control" name="lokasi">
                                                <option value="">Lokasi</option>
                                                @foreach($lokasi as $l)
                                                    <option value="{{$l->id_lokasi}}">{{$l->departemen}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="type" value="{{ $type }}">

                                    <button type="submit" class="btn btn-primary">
                                      {{ __('Import Data') }}
                                    </button>
                                  </form>
                            </tbody>
                            <br><br><thead>
                                <tr>
                                    <th colspan=6></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table color-table info-table example">
                            <thead>
                                <tr>
                                    <th colspan=6>Keterangan Header</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>judul</td>
                                    <td>: judul koleksi (contoh: Pemrograman Dasar C, Idea Jurnal Desain, dll.)</td>
                                </tr>
                                <tr>
                                    <td>jenis</td>
                                    <td>: jenis koleksi/GMD/media (contoh: Buku Teks, Jurnal, Majalah, Buku Tugas Akhir, dll.)</td>
                                </tr>
                                <tr>
                                    <td>penulis</td>
                                    <td>: penulis/pengarang koleksi (contoh: William Stallings, Harvey Deitel, dll.</td>
                                </tr>
                                <tr>
                                    <td>penerbit</td>
                                    <td>: penerbit koleksi (contoh: Penerbit Erlangga, Departemen Informatika ITS, dll.</td>
                                </tr>
                                <tr>
                                    <td>kota_penerbit</td>
                                    <td>: kota tempat koleksi diterbitkan (contoh: Surabaya, New York, dll.)</td>
                                </tr>
                                <tr>
                                    <td>tahun_terbit</td>
                                    <td>: tahun koleksi diterbitkan (contoh: 2018, 2019, 1999, dll.)</td>
                                </tr>
                                <tr>
                                    <td>bahasa</td>
                                    <td>: bahasa koleksi (contoh: Indonesia, Inggris, dll.)</td>
                                </tr>
                                <tr>
                                    <td>deskripsi</td>
                                    <td>: deskripsi/abstrak koleksi</td>
                                </tr>
                                <tr>
                                    <td>lokasi</td>
                                    <td>: lokasi koleksi berada (contoh: Informatika, Desain Produk, Perpustakaan Pusat ITS)</td>
                                </tr>
                                <tr>
                                    <td>Pembimbing</td>
                                    <td>: atribut khusus untuk buku tugas akhir, buku kerja praktik, tesis, dan disertasi</td>
                                </tr>
                                <tr>
                                    <td>Subjek</td>
                                    <td>: subjek dari koleksi (contoh: Computer Network, Civil Engineering, Technology Innovation, dll.)</td>
                                </tr>
                                <tr>
                                    <td>Edisi</td>
                                    <td>: edisi/seri dari koleksi (contoh: 4, 2, 1, dll.)</td>
                                </tr>
                                <tr>
                                    <td>ISBN/ISSN</td>
                                    <td>: nomor buku standar internasional/kode identifikasi buku</td>
                                </tr>
                                <tr>
                                    <td>Bulan</td>
                                    <td>: atribut khusus untuk jurnal dan majalah, merupakan bulan terbit koleksi</td>
                                </tr>
                                <tr>
                                    <td>Volume</td>
                                    <td>: atribut khusus untuk jurnal, merupakan nomor edisi jurnal</td>
                                </tr>
                                <tr>
                                    <td>Nomor</td>
                                    <td>: atribut khusus untuk jurnal dan majalah, merupakan nomor penerbitan jurnal/majalah terkait</td>
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