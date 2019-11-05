@extends('layouts.app')

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
                                    <th colspan=6>DAFTAR RUANG BACA ITS TERINTEGRASI</th>
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
                                        <a href="{{ url('searchLokasi/'.$lk->departemen) }}" class="btn btn-default"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Lihat Berdasarkan Lokasi"></i></a>
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