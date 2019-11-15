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
                                {{-- {{dd($ks->formatted_column[0])}} --}}
                                <tr class="fuckOffPadding">
                                    <td style="vertical-align: middle;"><?php echo $x; $x=$x+1; ?></td>
                                    <td style="vertical-align: middle;">{{$ks->jenis_koleksi}}</td>
                                    <td style="text-align: left;">{{$ks->deskripsi_koleksi}}</td>
                                    <td style="vertical-align: middle;">
                                        <a href="{{ url('searchKoleksi/'.$ks->jenis_koleksi) }}" class="btn btn-default"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Lihat Koleksi"></i></a>
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