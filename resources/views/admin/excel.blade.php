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
                                    Tata cara unggah data katalog<br>
                                    [Persyaratan, format file yang dapat diunggah yaitu .xlsx atau .csv]<br>
                                     1. Pilih jenis file yang akan diunggah, jika excel pilih tombol <a href="/excel" class="btn btn-success btn-sm">UNGGAH FILE EXCEL</a>, jika csv tekan tombol <a href="/csv" class="btn btn-warning btn-sm">UNGGAH FILE CSV</a><br>
                                    2. Tekan kotak hijau dibawah dan pilih file yang akan diunggah atau <i>Drag and drop</i> file<br>
                                    {{-- 2. Akan muncul form yang berisi data header/atribut data. Cocokkan dengan atribut yang ada pada sistem Katalog Online. --}}
                                    3. Tekan tombol <i>Upload</i><br>
                                    4. Sistem akan secara otomatis mengecek data yang sudah ada untuk menghindari redundansi dan memasukkan data yang telah diunggah ke basis data Katalog Online.
                                </p><hr>
                            </div>
                            {{-- <a href="/home" class="btn btn-success">UNGGAH FILE EXCEL</a>
                            <a href="{{ route('uploadcsv') }}" class="btn btn-warning">UNGGAH FILE CSV</a> --}}
                            {{-- <a href="/home" class="btn btn-primary">UNGGAH FILE SQL</a> --}}
                        </div>
                        <table class="table color-table success-table example">
                            <thead>
                                <tr>
                                    <th colspan=6>UNGGAH FILE EXCEL DATA KOLEKSI RUANG BACA</th>
                                </tr>
                            </thead>
                        </table>
                        <table class="table color-table success-table example">
                            <tbody class="text-center">
                                <div class="file-upload">
                                  <form action="/uploadExcel" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}

                                    <div class="image-upload-wrap">
                                      <input class="file-upload-input" type='file' onchange="readURL(this);" name="fileExcel" />
                                      <div class="drag-text">
                                        <h3>Drag and drop a file or click this box</h3>
                                      </div>
                                    </div>
                                    <div class="file-upload-content">
                                      <img class="file-upload-image" src="{{ asset('images/icon-xlsx.png') }}" alt="your file" />
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
      $('.image-upload-wrap').hide();

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
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
});
</script>
@endsection