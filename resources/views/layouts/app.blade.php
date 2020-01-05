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

    <link href="{{asset('bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{asset('plugins/bower_components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{asset('plugins/bower_components/morrisjs/morris.css')}}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{asset('plugins/bower_components/chartist-js/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="{{asset('plugins/bower_components/calendar/dist/fullcalendar.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('plugins/bower_components/dropify/dist/css/dropify.min.css')}}">
    <!-- Custom CSS -->
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{asset('css/colors/default.css')}}" id="theme" rel="stylesheet">
    <!-- CSS tambahan -->
    <link href="{{asset('css/mystyle.css')}}" rel="stylesheet">
    <!-- Toggle CSS -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!--alerts CSS -->
    <link href="{{asset('plugins/bower_components/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css">
    {{-- Datatable --}}
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css')}}"/>

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
                {{-- <ul class="nav navbar-top-links navbar-left">
                    <li>
                        <a href="javascript:void(0)" class="open-close waves-effect waves-light">
                            <i class="ti-menu"></i>
                        </a>
                    </li>
                </ul> --}}
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
                <div class="user-profile">
                    <div>
                        <img src="{{ asset('asset/image/logo_its.png') }}" alt="logo-its" class="w50h50">
                    </div>
                </div>
                @if(Auth::check())
                    @if(Auth::user()->user_role == 0)
                        <center><p>Welcome, Pustakawan <b>{{Auth::user()->nama}}</b></p></center>
                    @endif
                    @if(Auth::user()->user_role == 1)
                        <center><p>Welcome, Administrator <b>{{Auth::user()->nama}}</b></p></center>
                    @endif
                @endif
                <ul class="nav" id="side-menu">
                    <li class="devider"></li>
                    <li>
                        <a href="/" class="waves-effect">
                            <span class="hide-menu"> BERANDA </span>
                        </a>
                    </li>
                    <li>
                        @if(Request::path() == 'katalog' || Request::is('search*') )
                        <a href="/katalog" class="waves-effect active">
                            <span class="hide-menu"> KATALOG </span>
                        </a>
                        @else
                        <a href="/katalog" class="waves-effect">
                            <span class="hide-menu"> KATALOG </span>
                        </a>
                        @endif
                    </li>
                    <li>
                        @if(Request::path() == 'koleksi')
                        <a href="/koleksi" class="waves-effect active">
                            <span class="hide-menu"> JENIS KOLEKSI </span>
                        </a>
                        @else
                        <a href="/koleksi" class="waves-effect">
                            <span class="hide-menu"> JENIS KOLEKSI </span>
                        </a>
                        @endif
                    </li>
                    <li>
                        @if(Request::path() == 'lokasi')
                        <a href="/lokasi" class="waves-effect active">
                            <span class="hide-menu"> LOKASI RUANG BACA </span>
                        </a>
                        @else
                        <a href="/lokasi" class="waves-effect">
                            <span class="hide-menu"> LOKASI RUANG BACA </span>
                        </a>
                        @endif
                    </li>
                    <li class="devider"></li>
                    @if(Auth::check())
                        <br>
                        <li><center><b>ADMIN</b></center></li>
                        <li>
                            @if(Request::path() == 'excel' || Request::path() == 'csv' || Request::is('upload*'))
                            <a href="/excel" class="waves-effect active">
                                <span class="hide-menu"> UNGGAH DATA KATALOG </span>
                            </a>
                            @else
                            <a href="/excel" class="waves-effect">
                                <span class="hide-menu"> UNGGAH DATA KATALOG </span>
                            </a>
                            @endif
                        </li>
                        <li>
                            @if(Request::path() == 'log')
                            <a href="/log" class="waves-effect active">
                                <span class="hide-menu"> RIWAYAT UNGGAHAN </span>
                            </a>
                            @else
                            <a href="/log" class="waves-effect">
                                <span class="hide-menu"> RIWAYAT UNGGAHAN </span>
                            </a>
                            @endif
                        </li>
                        <li class="devider"></li><br>
                        <li>
                        <a href="/logout" class="waves-effect">
                                <span class="hide-menu float-right">LOGOUT <i class="fa fa-sign-out ml-2" aria-hidden="true"></i></span>
                            </a>
                        </li>
                    @endif
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
