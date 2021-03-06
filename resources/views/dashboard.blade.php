<!doctype html> <html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Katalog Online</title>
        <link rel="icon" type="image/png" href="{{ asset('pelanggan/assets/img/favicon.png') }}">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

        <link rel="stylesheet" href="{{ asset('pelanggan/assets/css/bootstrap.min.css') }}">
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{ asset('pelanggan/assets/css/font-awesome.min.css') }}">
        <!--        <link rel="stylesheet" href="pelanggan/assets/css/bootstrap-theme.min.css">-->


        <!--For Plugins external css-->
        <link rel="stylesheet" href="{{ asset('pelanggan/assets/css/animate/animate.css') }}" />
        <link rel="stylesheet" href="{{ asset('pelanggan/assets/css/plugins.css') }}" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="{{ asset('pelanggan/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('pelanggan/assets/css/logon.css') }}">
        <link rel="stylesheet" href="{{ asset('css/pricing.css') }}">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="{{ asset('pelanggan/assets/css/responsive.css') }}" />

        <script src="{{ asset('pelanggan/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
    </head>
    <body>
        <div class='preloader'><div class='loaded'>&nbsp;</div></div>
        <header id="home" class="navbar-fixed-top">
            <div class="header_top_menu clearfix">  
                <div class="container">
                    <div class="row">   
                        <div class="col-md-5 col-md-offset-3 col-sm-12 text-right"></div>
                        <div class="col-md-4 col-sm-12">
                            <div class="head_top_social text-right">
                                <a href="">KATALOG ONLINE TERINTEGRASI ITS</a>
                            </div>  
                        </div>
                    </div>          
                </div>
            </div>
            <!-- End navbar-collapse-->

            <div class="main_menu_bg">
                <div class="container"> 
                    <div class="row">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand our_logo" href="#"><img src="{{ asset('pelanggan/assets/images/logo.png') }}" alt="" />
                                    </a>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="#beranda">Beranda</a></li>
                                        <li><a href="#about">Tentang Katalog Online</a></li>
                                        <li><a href="#lokasi">Lokasi Ruang Baca</a></li>
                                        <li><h2 style="vertical-align: top;">|</h2></li>
                                        <li><a href="/koleksi">Jenis Koleksi</a></li>
                                        <li><a href="/katalog">Katalog</a></li>
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div>
            </div>  
        </header> <!-- End Header Section -->

        <section id="beranda" class="slider">
            <div class="slider_overlay">
                <div class="container">
                    <div class="row">
                        <div class="main_slider text-center">
                            <div class="col-md-12">
                                <div class="main_slider_content wow zoomIn" data-wow-duration="1s">
                                    <h1>Integrated Online Catalog<br>ITS</h1>
                                    <p>Katalog terintegarasi yang mencakup koleksi ruang baca di lingkungan ITS</p>
                                    <div class="form-style">
                                      {{ csrf_field() }}
                                      <form action="/search" method="GET">
                                          <input id="search" name="search" type="text" class="input" placeholder="Apa yang ingin Anda cari?"><br>
                                          <input type="submit" class="button">
                                          {{-- <button type="submit" class="btn btn-primary">SUBMIT</button> --}}
                                      </form>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: left;">
                                <a href="/login">
                                    <img src="{{ asset('images/loginAdmin.png') }}" alt="Login Admin" style="width: 8%; height: 8%;" />
                                </a>
                                <a href="#ModalPencarian" data-toggle="modal" style="justify-content: right;">
                                    <img src="{{ asset('pelanggan/assets/images/advanced4.png') }}" alt="Advanced Search" style="margin-left: 76%; width: 15%; height: 15%;" />
                                </a>
                            </div><br><br>

                            <!-- START MODAL ADVANCED SEARCH -->
                            <div class="modal fade" id="ModalPencarian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                              aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-lg-12" style="margin-left: 4%; margin-bottom: 2%;">
                                        <h3>Pencarian Lanjut</h3><hr>
                                        {{csrf_field()}}
                                        <form class="form-horizontal" action="/searchAdvanced" method="GET" id="advancedSearch">
                                            <div class="form-group">
                                              <label class="control-label col-sm-2" for="judul">Judul:</label>
                                              <div class="col-lg-12">
                                                <input type="text" class="form-control" id="judul" placeholder="Masukkan kata kunci judul" name="judul">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="control-label col-sm-2" for="penulis">Penulis:</label>
                                              <div class="col-lg-12">
                                                <input type="text" class="form-control" id="penulis" placeholder="Masukkan kata kunci penulis" name="penulis">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="control-label col-sm-2" for="penerbit">Penerbit:</label>
                                              <div class="col-lg-12">          
                                                <input type="text" class="form-control" id="penerbit" placeholder="Masukkan kata kunci penerbit" name="penerbit">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="control-label col-sm-2" for="kota">Kota Terbit:</label>
                                              <div class="col-lg-12">          
                                                <input type="text" class="form-control" id="kota" placeholder="Masukkan kata kunci Kota" name="kota">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="control-label col-sm-2" for="tahun">Tahun Terbit:</label>
                                              <div class="col-lg-12">          
                                                <input type="text" class="form-control" id="tahun" placeholder="Masukkan tahun" name="tahun">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="control-label col-sm-2" for="deskripsi">Deskripsi:</label>
                                              <div class="col-lg-12">          
                                                <textarea type="text" class="form-control" id="deskripsi" placeholder="Masukkan Deskripsi" name="deskripsi"></textarea>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="card-body">
                                              <div class="row">
                                                <div class="col-md-3">
                                                  <select class="md-form mdb-select colorful-select dropdown-primary form-control" name="bahasa">
                                                    <option value="" selected>Bahasa</option>
                                                    @foreach($bahasa as $b)
                                                        <option value="{{$b->bahasa}}">{{$b->bahasa}}</option>
                                                    @endforeach
                                                  </select>
                                                </div>

                                                <div class="col-md-6">
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
                                                </div>
                                              </div>
                                            </div>
                                        </div><br>
                                        <div class="col-lg-12" style="margin-left: 4%">
                                              @foreach($koleksi as $kg)
                                                  @if(is_null($kg->formatted_column))
                                                      @continue
                                                  @endif
                                                  @foreach($kg->formatted_column as $kfc)
                                                      <div class="form-group form-atribut-{{$kg->id_koleksi}} atribut-khusus" style="display: none; margin-top:3%;">
                                                        <label class="control-label col-sm-2" for="{{$kfc}}">{{$kfc}}: </label>
                                                        <div class="col-lg-12">          
                                                          <input type="text" class="form-control input-khusus input-{{$kg->id_koleksi}}" id="{{$kfc}}" placeholder="Masukkan {{$kfc}}" name="{{$kfc}}"><br>
                                                        </div>
                                                      </div>
                                                  @endforeach
                                              @endforeach

                                              <br>
                                              <div class="text-center">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button class="btn btn-primary">Cari
                                                  <i class="fa fa-search-plus ml-2" aria-hidden="true"></i>
                                                </button>
                                              </div>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- END OF MODAL ADVANCED SEARCH-->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="abouts">
            <div class="container">
                <div class="row">
                    <div class="abouts_content">
                        <div class="col-md-6">
                            <div class="single_abouts_text text-center wow slideInLeft" data-wow-duration="1s">
                                <img style="width: 100%; height: 100%;" src="{{ asset('pelanggan/assets/images/ruangan.jpg') }}" alt="" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="single_abouts_text wow slideInRight" data-wow-duration="1s">
                                <h4>Tentang <i>Integrated Online Catalog</i> ITS</h4>
                                <p> ITS merupakan perguruan tinggi yang saat ini memiliki 35 departemen dalam 10 fakultas, dimana beberapa departemen memiliki ruang baca dan berada di lokasi yang berbeda.</p>
                                <p> Dalam memenuhi sarana literasi, civitas akademika ITS membutuhkan referensi tulis. Dan untuk memudahkan pencarian referensi tersebut, diciptakanlah katalog daring terintegrasi.</p>
                                <i>Integrated Online Catalog</i> merupakan daftar koleksi setiap ruang baca yang ada di ITS dan perpustakaan umum ITS. Dengan adanya katalog daring, dapat memudahkan pencarian koleksi ruang baca di seluruh ITS.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="lokasi" class="portfolio">
            <div class="container">
                <div class="row">
                    <div class="portfolio_content text-center  wow fadeIn" data-wow-duration="5s">
                        <div class="col-md-12">
                            <div class="head_title text-center">
                                <h4>Ruang Baca ITS</h4>
                                <p>Daftar ruang baca di lingkungan ITS</p>
                            </div>

                            <div class="price-table-wrapper">
                                @foreach($lokasi as $lk)
                                <div class="pricing-table">
                                    <h2 class="pricing-table__header">Departemen<br>{{$lk->departemen}}</h2>
                                    <img src="{{ asset('asset/image/logo_its.png') }}" alt="Judul" />
                                    <a class="pricing-table__button" href="{{ url('searchLokasi/'.$lk->departemen) }}">Lihat Koleksi Lokasi</a>
                                    <ul class="pricing-table__list">
                                        <li>{{$lk->fakultas}}</li>
                                        <li>Alamat {{$lk->alamat}}</li>
                                    </ul>
                                </div>
                                @endforeach
                            </div><br>

                            <div class="table-responsive" style="margin-left:20%; margin-right: 20%;">
                                <table class="table color-table info-table example" style="text-align: left;">
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
                                        <tr>
                                            <td>FTK</td>
                                            <td>: Fakultas Teknik Kelautan</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- <script src="{{asset('asset/js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('pelanggan/assets/js/bootstrap.min.js')}}"></script> --}}
        <script src="{{asset('pelanggan/assets/js/bootstrap.js')}}"></script>

        <script src="{{ asset('pelanggan/assets/js/vendor/jquery-1.11.2.min.js') }}"></script>
        <script src="{{ asset('pelanggan/assets/js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('pelanggan/assets/js/jquery-easing/jquery.easing.1.3.js') }}"></script>
        <script src="{{ asset('pelanggan/assets/js/wow/wow.min.js') }}"></script>
        <script src="{{ asset('pelanggan/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('pelanggan/assets/js/main.js') }}"></script>

        <script>
            $(document).on('show.bs.modal','#ModalPencarian',function() {
                // run on change for the selectbox
                $( "#koleksi" ).change(function() {  
                    $('.atribut-khusus').hide();
                    $('.input-khusus').prop("disabled",true);
                    var divKey = $(this).find('option:selected').data('id');
                    // console.log(divKey);
                    $('.form-atribut-'+divKey).show();
                    $('.input-'+divKey).prop("disabled",false);
                });
            });
        </script>
    </body>
</html>