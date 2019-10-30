<!doctype html> <html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Katalog Online</title>
        <link rel="icon" type="image/png" href="pelanggan/assets/img/favicon.png">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="pelanggan/assets/css/bootstrap.min.css">
        <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="pelanggan/assets/css/font-awesome.min.css">
        <!--        <link rel="stylesheet" href="pelanggan/assets/css/bootstrap-theme.min.css">-->


        <!--For Plugins external css-->
        <link rel="stylesheet" href="pelanggan/assets/css/animate/animate.css" />
        <link rel="stylesheet" href="pelanggan/assets/css/plugins.css" />

        <!--Theme custom css -->
        <link rel="stylesheet" href="pelanggan/assets/css/style.css">
        <link rel="stylesheet" href="pelanggan/assets/css/logon.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="pelanggan/assets/css/responsive.css" />

        <script src="pelanggan/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
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
                                    <a class="navbar-brand our_logo" href="#"><img src="pelanggan/assets/images/logo.png" alt="" /></a>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                    <ul class="nav navbar-nav navbar-right">
                                        <li><a href="/">Beranda</a></li>
                                        <li><a href="/lokasi">Lokasi Ruang Baca</a></li>
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
                                      <form action="/search" method="GET">
                                          <input id="search" name="search" type="text" class="input" placeholder="Pencarian Cepat"><br>
                                          <input type="submit" class="button" value="Cari">
                                      </form>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: right;">
                                <a href="#ModalPencarian" data-toggle="modal">
                                    <img src="pelanggan/assets/images/advanced4.png" alt="Advanced Search" style="width: 15%; height: 15%;" />
                                </a>
                            </div>

                            <!-- START MODAL ADVANCED SEARCH -->
                            <div class="modal fade" id="ModalPencarian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                              aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-lg-5">
                                        <!--Carousel Wrapper-->
                                        <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
                                          data-ride="carousel">
                                          <!--Slides-->
                                          <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                              <img class="d-block w-100"
                                                src="images/buku1.jpg"
                                                alt="First slide">
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
                                      <div class="col-lg-7">
                                        <h3>Pencarian Lanjut</h3><hr>

                                        <form class="form-horizontal" action="/cari_katalog.php">
                                            <div class="form-group">
                                              <label class="control-label col-sm-2" for="judul">Judul:</label>
                                              <div class="col-sm-10">
                                                <input type="text" class="form-control" id="judul" placeholder="Masukkan kata kunci judul" name="judul">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="control-label col-sm-2" for="penulis">Penulis:</label>
                                              <div class="col-sm-10">          
                                                <input type="text" class="form-control" id="penulis" placeholder="Masukkan kata kunci penulis" name="penulis">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="control-label col-sm-2" for="penerbit">Penerbit:</label>
                                              <div class="col-sm-10">          
                                                <input type="text" class="form-control" id="penerbit" placeholder="Masukkan kata kunci penerbit" name="penerbit">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="control-label col-sm-2" for="kota">Kota Terbit:</label>
                                              <div class="col-sm-10">          
                                                <input type="text" class="form-control" id="kota" placeholder="Masukkan kata kunci Kota" name="kota">
                                              </div>
                                            </div>
                                            <div class="form-group">
                                              <label class="control-label col-sm-2" for="tahun">Tahun Terbit:</label>
                                              <div class="col-sm-10">          
                                                <input type="text" class="form-control" id="tahun" placeholder="Masukkan tahun" name="tahun">
                                              </div>
                                            </div>
                                        
                                            <div class="card-body">
                                              <div class="row">
                                                <div class="col-md-3">
                                                  <select class="md-form mdb-select colorful-select dropdown-primary">
                                                    <option value="" disabled selected>Bahasa</option>
                                                    <option value="1">Indonesia</option>
                                                    <option value="2">Inggris</option>
                                                  </select>
                                                </div>

                                                <div class="col-md-4">
                                                  <select class="md-form mdb-select colorful-select dropdown-primary">
                                                    <option value="" disabled selected>Lokasi Ruang Baca</option>
                                                    <option value="1">Informatika</option>
                                                    <option value="2">Desain Produk</option>
                                                    <option value="3">Sistem Informasi</option> 
                                                  </select>
                                                </div>

                                                <div class="col-md-3">
                                                  <select class="md-form mdb-select colorful-select dropdown-primary">
                                                    <option value="" disabled selected>Jenis Koleksi</option>
                                                    <option value="1">Buku Teks</option>
                                                    <option value="2">Buku Referensi</option>
                                                    <option value="3">Buku Tugas Akhir</option>
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

        <script src="pelanggan/assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="pelanggan/assets/js/vendor/bootstrap.min.js"></script>
        <script src="pelanggan/assets/js/jquery-easing/jquery.easing.1.3.js"></script>
        <script src="pelanggan/assets/js/wow/wow.min.js"></script>
        <script src="pelanggan/assets/js/plugins.js"></script>
        <script src="pelanggan/assets/js/main.js"></script>
    </body>
</html>