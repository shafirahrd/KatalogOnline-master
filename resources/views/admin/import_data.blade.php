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
                                <h3>PENGANTAR</h3>
                                <p>
                                    Pada bagian ini, sesuaikan nama header dengan data kolom
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
            </div>
        </div>
        <!--/.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection