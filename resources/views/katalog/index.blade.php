@extends('layouts.app')

@section('link')
<link href="{{asset('css/search.css')}}" rel="stylesheet">

{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> --}}

<script src="{{asset('asset/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('pelanggan/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('pelanggan/assets/js/bootstrap.js')}}"></script>
        
@endsection

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
                                    <th colspan=6>ADVANCED SEARCH</th>
                                </tr>
                            </thead>
                        </table><br>
                        <table class="table color-table success-table example">                            
                            <tbody>
                                <form class="form-horizontal" action="/searchAdvanced" method="GET">
                                {{ csrf_field() }}
                                    <tr>
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="judul">Judul:</label>
                                          <div class="col-sm-9">
                                            <input type="text" class="form-control" id="judul" placeholder="Masukkan kata kunci judul" name="judul">
                                          </div>
                                        </div>
                                    </tr><br>
                                    <tr>
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="penulis">Penulis:</label>
                                          <div class="col-sm-9">          
                                            <input type="text" class="form-control" id="penulis" placeholder="Masukkan kata kunci penulis" name="penulis">
                                          </div>
                                        </div>
                                    </tr><br>
                                    <tr>
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="penerbit">Penerbit:</label>
                                          <div class="col-sm-9">          
                                            <input type="text" class="form-control" id="penerbit" placeholder="Masukkan kata kunci penerbit" name="penerbit">
                                          </div>
                                        </div>
                                    </tr><br>
                                    <tr>
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="kota">Kota Terbit:</label>
                                          <div class="col-sm-9">          
                                            <input type="text" class="form-control" id="kota" placeholder="Masukkan kata kunci kota" name="kota">
                                          </div>
                                        </div>
                                    </tr><br>
                                    <tr>
                                        <div class="form-group">
                                          <label class="control-label col-sm-2" for="tahun">Tahun Terbit:</label>
                                          <div class="col-sm-9">          
                                            <input type="text" class="form-control" id="tahun" placeholder="Masukkan tahun" name="tahun">
                                          </div>
                                        </div>
                                    </tr><br><br>

                                    <div class="col-md-3">
                                      <select class="md-form mdb-select colorful-select dropdown-primary form-control" name="bahasa">
                                        <option value="" selected>Bahasa</option>
                                        @foreach($bahasa as $b)
                                            <option value="{{$b->bahasa}}">{{$b->bahasa}}</option>
                                        @endforeach
                                      </select>
                                    </div>

                                    <div class="col-md-4">
                                      <select class="md-form mdb-select colorful-select dropdown-primary form-control" name="lokasi">
                                        <option value="" selected>Lokasi Ruang Baca</option>
                                        @foreach($lokasi as $l)
                                            <option value="{{$l->departemen}}">{{$l->departemen}}</option>
                                        @endforeach
                                      </select>
                                    </div>

                                    <div class="col-md-3">
                                      <select class="md-form mdb-select colorful-select dropdown-primary form-control" name="koleksi" id="koleksi">
                                        <option value="" selected>Jenis Koleksi</option>
                                        @foreach($koleksi as $k)
                                            <option value="{{$k->jenis_koleksi}}" data-id="{{$k->id_koleksi}}">{{$k->jenis_koleksi}}</option>
                                        @endforeach
                                      </select>
                                    </div><br><br><br>
                                    @foreach($koleksi as $kg)
                                        @if(is_null($kg->formatted_column))
                                            @continue
                                        @endif
                                        @foreach($kg->formatted_column as $kfc)
                                            <div class="form-group form-atribut-{{$kg->id_koleksi}} atribut-khusus" style="display: none; margin-bottom: 5%;">
                                              <label class="control-label col-sm-2" for="{{$kfc}}">{{$kfc}} :</label>
                                              <div class="col-sm-9">          
                                                <input type="text" class="form-control" id="{{$kfc}}" placeholder="Masukkan {{$kfc}}" name="{{$kfc}}">
                                              </div>
                                            </div>
                                        @endforeach
                                    @endforeach

                                    <br>
                                    <div class="text-center">
                                        <button class="btn btn-primary">Cari
                                        <i class="fa fa-search-plus ml-2" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </form>
                            </tbody><br>

                            <thead>
                                <tr>
                                    <th colspan=6></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table color-table success-table results">
                            <thead>
                                <tr>
                                    <th colspan=7>DAFTAR KATALOG</th>
                                </tr>
                                <div class="form-group pull-right">
                                    <input type="text" id="cari" class="search form-control" placeholder="Cari...">
                                </div>
                                <span class="counter pull-right"></span>
                                <tr>
                                    <th class="text-center" style="background-color: white; color: black;">No.</th>
                                    <th class="text-center" style="background-color: white; color: black;">Judul</th>
                                    <th class="text-center" style="background-color: white; color: black;">Jenis Koleksi</th>
                                    <th class="text-center" style="background-color: white; color: black;">Penulis</th>
                                    <th class="text-center" style="background-color: white; color: black;">Tahun Terbit</th>
                                    <th class="text-center" style="background-color: white; color: black;">Lokasi</th>
                                    @if(Auth::check())
                                        <th class="text-center" style="background-color: white; color: black;">Aksi</th>
                                    @else
                                        <th class="text-center" style="background-color: white; color: black;">Lihat Detail</th>
                                    @endif
                                </tr>
                                <tr class="warning no-result">
                                    <td colspan="4"><i class="fa fa-warning"></i> No result</td>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php $x=1;?>

                                @foreach($katalog as $kg)
                                <tr class="fuckOffPadding">
                                    <td style="vertical-align: middle;"><?php echo $x; $x=$x+1; ?></td>
                                    <td style="text-align: left;">{{$kg->judul}}</td>
                                    <td style="vertical-align: middle;">{{$kg->koleksi->jenis_koleksi ?? '-'}}</td>
                                    <td style="text-align: left;">{{$kg->penulis ?? '-'}}</td>
                                    <td style="vertical-align: middle;">{{$kg->tahun_terbit ?? '-'}}</td>
                                    <td style="vertical-align: middle;">Departemen {{$kg->lokasis->departemen ?? '-'}}</td>
                                    <td style="vertical-align: middle;">
                                        <span data-toggle="modal" data-target="#Detail-{{$kg->id_katalog}}">
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Lihat Detail Koleksi"><i class="fa fa-folder-open"></i></button>
                                        </span>

                                        @if(Auth::check())
                                        <form class="form-horizontal form-material" action="{{ route('katalog.edit', ['katalog'=>$kg->id_katalog]) }}" method = "GET">
                                            <button type="submit" class="btn btn-warning" title="Ubah Katalog"><i class="ti-pencil-alt"></i></button>
                                            <input type="hidden" name="id" value="{{$kg->id_katalog}}" />
                                        </form>
                                        <form class="form-horizontal form-material" action="{{ route('katalog.destroy', ['katalog'=>$kg->id_katalog]) }}" method = "POST">
                                            <button type="submit" class="btn btn-danger" title="Hapus Katalog"><i class="ti-trash"></i></button>
                                            <input type="hidden" name="id" value="{{$kg->id_katalog}}" />
                                            @method('delete')
                                            @csrf
                                        </form>
                                        @endif

                                        <div class="modal fade" id="Detail-{{$kg->id_katalog}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true",>
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <center><h2 class="modal-title" id="myLargeModalLabel" style="font-weight: 450;">{{$kg->judul}}</h2></center>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="panel panel-default">
                                                            <div class="panel-body">
                                                                <div class="tab-content br-n pn">
                                                                    <div class="tab-pane active">
                                                                        <div class="row">
                                                                            <div class="col-sm-12 col-lg-10">
                                                                                <table class="table table-borderless" style="table-layout: fixed">
                                                                                    <tbody class="detail-text text-left">
                                                                                        <tr>
                                                                                            <td style="width: 1%"><span class="text-muted" style="font-weight: 500;">Judul Koleksi</span></td>
                                                                                            <td style="width: 0%"><span class="text-muted" style="font-weight: 500;">: </span></td>
                                                                                            <td style="width: 1%"><span style="margin-left: 5%;"> {{$kg->judul ?? '-'}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted" style="font-weight: 500">Jenis Koleksi</span></td>
                                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                                            <td><span style="margin-left: 5%;">{{$kg->koleksi->jenis_koleksi ?? '-'}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted" style="font-weight: 500">Penulis</span></td>
                                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                                            <td><span style="margin-left: 5%;">{{$kg->penulis ?? '-'}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted" style="font-weight: 500">Penerbit</span></td>
                                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                                            <td><span style="margin-left: 5%;">{{$kg->penerbit ?? '-'}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted" style="font-weight: 500">Kota Penerbit</span></td>
                                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                                            <td><span style="margin-left: 5%;">{{$kg->kota_penerbit ?? '-'}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted" style="font-weight: 500">Tahun Terbit</span></td>
                                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                                            <td><span style="margin-left: 5%;">{{$kg->tahun_terbit ?? '-'}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted" style="font-weight: 500">Bahasa</span></td>
                                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                                            <td><span style="margin-left: 5%;">{{$kg->bahasa ?? '-'}}</span></td>
                                                                                        </tr>
                                                                                        {{-- @foreach(json_decode($kg->att_value) as $ak=>$as)
                                                                                            @if(!is_null($ak))
                                                                                                <tr>
                                                                                                    <td><span class="text-muted" style="font-weight: 500">{{$ak ?? '-'}}</span></td>
                                                                                                    <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                                                    <td><span style="margin-left: 5%;">{{$as ?? '-'}}</span></td>
                                                                                                </tr>
                                                                                            @else
                                                                                                @continue
                                                                                            @endif
                                                                                        @endforeach --}}
                                                                                        <tr>
                                                                                            <td><span class="text-muted" style="font-weight: 500">Deskripsi</span></td>
                                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                                            <td><span style="margin-left: 5%;">{{$kg->deskripsi ?? '-'}}</span></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td><span class="text-muted" style="font-weight: 500">Lokasi Koleksi</span></td>
                                                                                            <td><span class="text-muted" style="font-weight: 500">: </span></td>
                                                                                            <td><span style="margin-left: 5%;">{{$kg->lokasis->departemen ?? '-'}}</span></td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $katalog->links() }}
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
<script>
    $(function() {
        // run on change for the selectbox
        $( "#koleksi" ).change(function() {  
            $('.atribut-khusus').hide();
              
            var divKey = $(this).find('option:selected').data('id');
            // console.log(divKey);
            $('.form-atribut-'+divKey).show();
        });
    });
</script>

<script>
    $(document).ready(function(){

        fetch_customer_data();

        function fetch_customer_data(query = '')
        {
            $.ajax({
                url:"{{ route('katalog.action') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data){
                    $('tbody').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            })
        }

        $(document).on('keyup', '#cari', function(){
            var query = $(this).val();
            fetch_customer_data(query);
        });
    });
</script>
@endsection