@extends('layouts.app')

@section('link')
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="css/animate.css" rel="stylesheet">
<!-- Menu CSS -->
<link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
<!-- toast CSS -->
<link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
<!-- morris CSS -->
<link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
<!-- chartist CSS -->
<link href="plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
<link href="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
<!-- Calendar CSS -->
<link href="plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
<link rel="stylesheet" href="plugins/bower_components/dropify/dist/css/dropify.min.css">
<!-- Custom CSS -->
<link href="css/animate.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="css/colors/default.css" id="theme" rel="stylesheet">
<!-- CSS tambahan -->
<link href="css/mystyle.css" rel="stylesheet">
<!-- Toggle CSS -->
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<!--alerts CSS -->
<link href="plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
{{-- Datatable --}}
<link rel="stylesheet" type="text/css" href="plugins/datatables/dataTables.bootstrap4.min.css"/>
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
                                    <th colspan=6>DAFTAR LOKASI RUANG BACA ITS</th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="background-color: white; color: black;">No.</th>
                                    <th class="text-center" style="background-color: white; color: black;">Departemen</th>
                                    <th class="text-center" style="background-color: white; color: black;">Fakultas</th>
                                    <th class="text-center" style="background-color: white; color: black;">Alamat</th>
                                    <th class="text-center" style="background-color: white; color: black;">Tautan Ruang Baca</th>
                                    <th class="text-center" style="background-color: white; color: black;">Lihat Koleksi Lokasi</th>
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
                                    <td style="vertical-align: middle;"><a href="http://{{$lk->tautan}}">{{$lk->tautan}}</td>
                                    <td style="vertical-align: middle;">
                                        <a href="/katalog" class="btn btn-default"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Lihat Berdasarkan Lokasi"></i></a>
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