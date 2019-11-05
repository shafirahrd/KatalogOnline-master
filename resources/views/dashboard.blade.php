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
                                <a href="">KATALOG ONLINE TERINTEGRASI</a>
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
                                    <a class="navbar-brand our_logo" href="#"><img src="{{ asset('pelanggan/assets/images/logo.png') }}" alt="" /></a>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="#beranda">Beranda</a></li>
                                        <li><a href="#about">Tentang Katalog Online</a></li>
                                        <li><a href="#lokasi">Ruang Baca Terintegrasi</a></li>
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
                                    <h1>Katalog Online</h1>
                                    <p>Katalog terintegarasi yang mencakup semua koleksi dari ruang baca di ITS</p>
                                    <div class="form-style">
                                      {{ csrf_field() }}
                                      <form action="/search" method="GET">
                                          <input id="search" name="search" type="text" class="input" placeholder="Apa yang ingin Anda cari?"><br>
                                          <input type="submit" class="button">
                                      </form>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: left;">
                                <a href="/login">
                                    <img src="{{ asset('images/loginAdmin.png') }}" alt="Login Admin" style="width: 13%; height: 13%;" />
                                </a>
                                <a href="#ModalPencarian" data-toggle="modal" style="justify-content: right;">
                                    <img src="{{ asset('pelanggan/assets/images/advanced4.png') }}" alt="Advanced Search" style="margin-left: 71%; width: 15%; height: 15%;" />
                                </a>
                            </div><br><br>

                            <!-- START MODAL ADVANCED SEARCH -->
                            <div class="modal fade" id="ModalPencarian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                              aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-lg-4" style="margin-top: 8%;">
                                        <!--Carousel Wrapper-->
                                        <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
                                          data-ride="carousel">
                                          <!--Slides-->
                                          <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                              <img class="d-block w-100" src="{{ asset('images/buku1.jpg') }}" alt="First slide">
                                            </div>
                                          </div>
                                          <!--/.Slides-->
                                          <!--Controls-->
                                          <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                          </a>
                                          <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                          </a>
                                          <!--/.Controls-->
                                          <ol class="carousel-indicators">
                                            <li data-target="#carousel-thumb" data-slide-to="0" class="active">
                                              <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(23).jpg" width="60">
                                            </li>
                                            <li data-target="#carousel-thumb" data-slide-to="1">
                                              <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(24).jpg" width="60">
                                            </li>
                                            <li data-target="#carousel-thumb" data-slide-to="2">
                                              <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(25).jpg" width="60">
                                            </li>
                                          </ol>
                                        </div>
                                        <!--/.Carousel Wrapper-->
                                      </div>
                                      <div class="col-lg-8">
                                        <h3>Pencarian Lanjut</h3><hr>

                                        <form class="form-horizontal" action="/searchAdvanced" method="GET">
                                            <div class="form-group">
                                              <label class="control-label col-sm-2" for="judul">Judul:</label>
                                              <div class="col-sm-12">
                                                <input type="text" class="form-control" id="judul" placeholder="Masukkan kata kunci judul" name="judul">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="control-label col-sm-2" for="penulis">Penulis:</label>
                                              <div class="col-sm-12">
                                                <input type="text" class="form-control" id="penulis" placeholder="Masukkan kata kunci penulis" name="penulis">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="control-label col-sm-2" for="penerbit">Penerbit:</label>
                                              <div class="col-sm-12">          
                                                <input type="text" class="form-control" id="penerbit" placeholder="Masukkan kata kunci penerbit" name="penerbit">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="control-label col-sm-2" for="kota">Kota Terbit:</label>
                                              <div class="col-sm-12">          
                                                <input type="text" class="form-control" id="kota" placeholder="Masukkan kata kunci Kota" name="kota">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="control-label col-sm-2" for="tahun">Tahun Terbit:</label>
                                              <div class="col-sm-12">          
                                                <input type="text" class="form-control" id="tahun" placeholder="Masukkan tahun" name="tahun">
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-7">
                                            <div class="card-body">
                                              <div class="row">
                                                <div class="col-md-3">
                                                  <select class="md-form mdb-select colorful-select dropdown-primary" name="bahasa">
                                                    <option value="" disabled selected>Bahasa</option>
                                                    @foreach($bahasa as $b)
                                                        <option value="{{$b->bahasa}}">{{$b->bahasa}}</option>
                                                    @endforeach
                                                  </select>
                                                </div>

                                                <div class="col-md-6">
                                                  <select class="md-form mdb-select colorful-select dropdown-primary" name="lokasi">
                                                    <option value="" disabled selected>Lokasi Ruang Baca</option>
                                                    @foreach($lokasi as $l)
                                                        <option value="{{$l->departemen}}">{{$l->departemen}}</option>
                                                    @endforeach
                                                  </select>
                                                </div>

                                                <div class="col-md-3">
                                                  <select class="md-form mdb-select colorful-select dropdown-primary" name="koleksi">
                                                    <option value="" disabled selected>Jenis Koleksi</option>
                                                    @foreach($koleksi as $k)
                                                        <option value="{{$k->jenis_koleksi}}">{{$k->jenis_koleksi}}</option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                              </div><br>
                                              <div class="text-center">

                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button class="btn btn-primary">Cari
                                                  <i class="fas fa-cart-plus ml-2" aria-hidden="true"></i>
                                                </button>
                                              </div>
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
                                <img src="{{ asset('pelanggan/assets/images/ruangan.jpg') }}" alt="" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="single_abouts_text wow slideInRight" data-wow-duration="1s">
                                <h4>Tentang Katalog Online</h4>
                                <p>ITS merupakan perguruan tinggi yang saat ini memiliki 35 departemen dalam 10 fakultas, dimana beberapa departemen memiliki ruang baca dan berada di lokasi yang berbeda.</p>

                                <p>Dalam memenuhi sarana literasi, civitas akademika ITS membutuhkan referensi tulis. Dan untuk memudahkan pencarian referensi tersebut, diciptakanlah katalog online terintegrasi.</p>

                                <p>Katalog Online Terintegrasi merupakan daftar koleksi setiap ruang baca yang ada di ITS. Dengan adanya katalog online, dapat memudahkan pencarian koleksi ruang baca di seluruh ITS.</p>
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
                                <h4>Ruang Baca ITS Terintegrasi</h4>
                                <p>Daftar ruang baca yang data koleksinya telah terintegrasi</p>
                            </div>

                            <div class="price-table-wrapper">
                                @foreach($lokasi as $lk)
                                <div class="pricing-table">
                                    <h2 class="pricing-table__header">Departemen {{$lk->departemen}}</h2>
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

        <script src="{{ asset('pelanggan/assets/js/vendor/jquery-1.11.2.min.js') }}"></script>
        <script src="{{ asset('pelanggan/assets/js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('pelanggan/assets/js/jquery-easing/jquery.easing.1.3.js') }}"></script>
        <script src="{{ asset('pelanggan/assets/js/wow/wow.min.js') }}"></script>
        <script src="{{ asset('pelanggan/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('pelanggan/assets/js/main.js') }}"></script>
    </body>
</html>