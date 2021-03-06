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
                                <h3><b>PETUNJUK</b></h3>
                                <p>
                                    Tata cara unggah data katalog<br>
                                    1. Persyaratan format file yang dapat diunggah yaitu <b>excel</b> dan <b>csv</b><br>
                                    2. <b>Jika terdapat kolom jenis koleksi/tipe koleksi/GMD, pastikan namanya sesuai dengan kode koleksi yang terdapat pada halaman jenis koleksi.</b><br>
                                    3. <b>Jika terdapat kolom bahasa</b>, apabila Bahasa Indonesia tulis namanya dengan <b>Indonesia</b>, apabila Bahasa Inggris tulis namanya dengan <b>Inggris</b>.<br>

                                    4. Pilih jenis file yang akan diunggah, jika excel pilih tombol <a href="/excel" class="btn btn-success btn-sm">UNGGAH FILE EXCEL</a>, jika csv tekan tombol <a href="/csv" class="btn btn-warning btn-sm">UNGGAH FILE CSV</a><br>
                                    {{-- 2. <a href="" class="btn btn-info btn-sm">UNDUH TEMPLATE</a> dan sesuaikan format file dengan template.<br> --}}
                                    5. Tekan kotak hijau dibawah dan pilih file yang akan diunggah atau <i>Drag and drop</i> file<br>
                                    6. Tekan tombol <i>Upload</i><br>
                                    {{-- 5. Akan muncul data hasil upload dan formulir header/field. Cocokkan atribut tiap kolom dengan atribut yang ada pada sistem Integrated Online Catalog ITS. --}}
                                </p><hr>
                            </div>
                            {{-- <a href="/home" class="btn btn-success">UNGGAH FILE EXCEL</a>
                            <a href="{{ route('uploadcsv') }}" class="btn btn-warning">UNGGAH FILE CSV</a> --}}
                            {{-- <a href="/home" class="btn btn-primary">UNGGAH FILE SQL</a> --}}
                        </div>
                        <table class="table color-table warning-table example">
                            <thead>
                                <tr>
                                    <th colspan=6>UNGGAH FILE CSV DATA KOLEKSI RUANG BACA</th>
                                </tr>
                            </thead>
                        </table>
                        <table class="table color-table warning-table example">
                            <tbody class="text-center">
                                <div class="file-upload">
                                  <form action="/uploadCSV" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{-- <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">ADD FILE</button> --}}

                                    <div class="image-upload-wrap-csv">
                                      <input class="file-upload-input" type='file' onchange="readURL(this);" name="csv_file" id="csv_file" required/>
                                      <div class="drag-text">
                                        <h3>Drag and drop a file or click this box</h3>
                                      </div>
                                    </div>
                                    <div class="file-upload-content">
                                      <img class="file-upload-image" src="{{ asset('pelanggan/assets/images/icon-csv.png') }}" alt="your file" />
                                      <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded File</span></button>
                                      </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <center>
                                    <div class="custom-control custom-checkbox">
                                      <input type="checkbox" class="custom-control-input" name="header" id="header">
                                      <label class="custom-control-label" for="header">File mengandung header?</label>
                                    </div>
                                  </center>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upload') }}
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

@section('script')
<script type="text/javascript">
function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap-csv').hide();

      // $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap-csv').show();
}
$('.image-upload-wrap-csv').bind('dragover', function () {
        $('.image-upload-wrap-csv').addClass('image-dropping-csv');
    });
    $('.image-upload-wrap-csv').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping-csv');
});
</script>
@endsection