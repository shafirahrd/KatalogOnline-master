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
                                    <th colspan=6>RIWAYAT PERUBAHAN DATA KOLEKSI</th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="background-color: white; color: black;">No.</th>
                                    <th class="text-center" style="background-color: white; color: black;">Admin</th>
                                    <th class="text-center" style="background-color: white; color: black;">Ruang Baca</th>
                                    <th class="text-center" style="background-color: white; color: black;">Perubahan</th>
                                    <th class="text-center" style="background-color: white; color: black;">Timestamp</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $x=1; ?>
                                @foreach($log as $lg)
                                <tr class="fuckOffPadding">
                                    <td style="vertical-align: middle;"><?php echo $x; $x=$x+1; ?></td>
                                    <td style="vertical-align: middle;">{{$lg->nama}}</td>
                                    <td style="vertical-align: middle;">{{$lg->departemen}}</td>
                                    <td style="text-align: left;">{{$lg->log_change}}, {{$lg->judul}}</td>
                                    <td style="vertical-align: middle;">{{ date('d-F-Y',strtotime($lg->created_at)) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$log->links()}}
                    </div>
                </div>
            </div>
        </div>
        <!--/.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection