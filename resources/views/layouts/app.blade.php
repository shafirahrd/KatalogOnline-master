<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="pelanggan/assets/img/favicon.png">
    <title>Katalog Online</title>
    @yield('link')
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    {{-- <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div> --}}
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="/">
                        <!-- Logo icon image, you can use font-icon also -->
                        <b>
                            <img src="{{ asset('asset/image/logo_sm.png') }}" alt="beranda" class="dark-logo light-logo" />
                        </b>
                        <!-- Logo text image you can use text also -->
                        <span class="hidden-xs">
                            <img src="{{ asset('asset/image/logo.png') }}" alt="beranda" class="light-logo dark-logo" />
                        </span>
                    </a>
                </div>
                <!-- /Logo -->
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left">
                    <li>
                        <a href="javascript:void(0)" class="open-close waves-effect waves-light">
                            <i class="ti-menu"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="user-profile"><br>
                    <div>
                        <img src="{{ asset('asset/image/logo_its.png') }}" alt="logo-its" style="width:60%; height:60%;">
                    </div>
                </div><br>
                <ul class="nav" id="side-menu">
                    <li class="devider"></li>
                    <li>
                        <a href="/" class="waves-effect">
                            <span class="hide-menu"> BERANDA </span>
                        </a>
                    </li>
                    <li>
                        <a href="/lokasi" class="waves-effect active">
                            <span class="hide-menu"> LOKASI RUANG BACA </span>
                        </a>
                    </li>
                    <li>
                        <a href="/koleksi" class="waves-effect">
                            <span class="hide-menu"> JENIS KOLEKSI </span>
                        </a>
                    </li>
                    <li>
                        <a href="/katalog" class="waves-effect">
                            <span class="hide-menu"> KATALOG </span>
                        </a>
                    </li>
                    <li class="devider"></li>
                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        @yield('content')
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    @yield('script')
</body>

</html>
