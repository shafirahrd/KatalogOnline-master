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
                                    <th colspan=6>IMPORT DATA</th>
                                </tr>
                            </thead>
                        </table>
                        <table class="table color-table warning-table example">
                            <tbody class="text-center">
                                <div class="file-upload">
                                  <form action="{{ route('processcsv') }}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{-- <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">ADD FILE</button> --}}
                                    
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
                                              @foreach($column_katalog as $ckg)
                                                <option value="{{ (\Request::has('header')) ? $ckg : $loop->index }}"
                                                @if($key === $ckg) selected @endif>{{ $ckg }}</option>
                                              @endforeach
                                            </select>
                                          </td>
                                        @endforeach
                                      </tr>
                                    </table>

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
                                    <td>: judul koleksi</td>
                                </tr>
                                <tr>
                                    <td>jenis</td>
                                    <td>: jenis koleksi/GMD/media</td>
                                </tr>
                                <tr>
                                    <td>penulis</td>
                                    <td>: penulis koleksi</td>
                                </tr>
                                <tr>
                                    <td>penerbit</td>
                                    <td>: penerbit koleksi</td>
                                </tr>
                                <tr>
                                    <td>kota_penerbit</td>
                                    <td>: kota tempat koleksi diterbitkan</td>
                                </tr>
                                <tr>
                                    <td>tahun_terbit</td>
                                    <td>: tahun koleksi diterbitkan</td>
                                </tr>
                                <tr>
                                    <td>bahasa</td>
                                    <td>: bahasa koleksi</td>
                                </tr>
                                <tr>
                                    <td>deskripsi</td>
                                    <td>: deskripsi/abstrak koleksi</td>
                                </tr>
                                <tr>
                                    <td>lokasi</td>
                                    <td>: lokasi koleksi berada</td>
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