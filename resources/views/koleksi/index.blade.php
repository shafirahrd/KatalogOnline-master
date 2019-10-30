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
                        <table class="table color-table warning-table example">
                            <thead>
                                <tr>
                                    <th colspan=6>DAFTAR KOLEKSI</th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="background-color: white; color: black;">No.</th>
                                    <th class="text-center" style="background-color: white; color: black;">Jenis Koleksi</th>
                                    <th class="text-center" style="background-color: white; color: black;">Deskripsi</th>
                                    <th class="text-center" style="background-color: white; color: black;">Lihat Berdasarkan Koleksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $x=1; ?>
                                @foreach($koleksi as $ks)
                                <tr class="fuckOffPadding">
                                    <td style="vertical-align: middle;"><?php echo $x; $x=$x+1; ?></td>
                                    <td style="vertical-align: middle;">{{$ks->jenis_koleksi}}</td>
                                    <td style="text-align: left;">{{$ks->deskripsi_koleksi}}</td>
                                    <td style="vertical-align: middle;">
                                        <a href="/katalog" class="btn btn-default"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Lihat Koleksi"></i></a>
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