<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Area</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="admin/assets/images/favicon.icon" type="image/x-icon">
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css " rel="stylesheet">
    <!-- vendor css -->
    <link rel="stylesheet" href="admin/assets/css/style.css">

</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar  ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div ">

                <div class="">
                    <div class="main-menu-header">
                        <img class="img-radius" src="admin/assets/images/user/avatar-2.jpg" alt="User-Profile-Image">
                        <div class="user-details">
                            <span>{{ auth()->user()->name }}</span>
                            <div id="more-details">Roles</div>
                        </div>
                    </div>
                </div>

                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Menu</label>
                    </li>
                    <li class="nav-item">
                        <a href="/dash" class="nav-link {{ Request::is('/dash') ? 'active' : '' }}"><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-box"></i></span><span class="pcoded-mtext">Product</span></a>
                        <ul class="pcoded-submenu">
                            <li><a class="{{ Request::is('/product') ? 'active' : '' }}" href="/product">List Products</a></li>
                            <li><a class="{{ Request::is('/approval') ? 'active' : '' }}" href="/approval">Approval</a></li>
                            <li><a class="{{ Request::is('/category') ? 'active' : '' }}" href="/category">Categories</a></li>
                        </ul>
                    </li>

                    <li class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-lock"></i></span><span class="pcoded-mtext">User</span></a>
                        <ul class="pcoded-submenu">
                            <li><a class="{{ Request::is('/users') ? 'active' : '' }}" href="/users">List Users</a></li>
                            <li><a class="{{ Request::is('/roles') ? 'active' : '' }}" href="/roles">Roles</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-log-out"></i></span><span class="pcoded-mtext">Logout</span></a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse" href="/"><span></span></a>
            <a href="/" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="admin/assets/images/logo.png" alt="" class="logo">
                <img src="admin/assets/images/logo-icon.png" alt="" class="logo-thumb">
            </a>
        </div>
    </header>
    <!-- [ Header ] end -->
    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">@yield('title')</h5>
                            </div>
                            @yield('create')                            
                        </div>
                    </div>             
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div id="data-container" class="row">
               @yield('content')
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>

    @yield('modal')
    <!-- Required Js -->
    <script src="admin/assets/js/vendor-all.min.js"></script>
    <script src="admin/assets/js/plugins/bootstrap.min.js"></script>
    <script src="admin/assets/js/pcoded.min.js"></script>

    <!-- Apex Chart -->
    <script src="admin/assets/js/plugins/apexcharts.min.js"></script>


    <!-- custom-chart js -->
    <script src="admin/assets/js/pages/dashboard-main.js"></script>

</body>

</html>
