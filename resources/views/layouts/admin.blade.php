<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Area Admin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="dashadmin/assets/img/favicon.png" rel="icon">
    <link href="dashadmin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="dashadmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="dashadmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="dashadmin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="dashadmin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="dashadmin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="dashadmin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="dashadmin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="dashadmin/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: May 30 2023 with Bootstrap v5.3.0
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="/dash" class="logo d-flex align-items-center">
                <img src="dashadmin/assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Console Land</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="Profile"
                            class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ auth()->user()->name }}</h6>
                            <span>{{ auth()->user()->position }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/profile">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/logout">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Log Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ $active === 'dash' ? '' : 'collapsed' }}" href="/dash">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ $active == 'product' || $active == 'category' ? '' : 'collapsed' }}"
                    data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-playstation"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav"
                    class="nav-content collapse {{ $active == 'product' || $active == 'category' ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/product" class="{{ $active === 'product' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>List Product</span>
                        </a>
                    </li>
                    @can('admin')
                    <li>
                        <a href="/category" class="{{ $active === 'category' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Category</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link {{ $active === 'slide' ? '' : 'collapsed' }}" href="/slide">
                    <i class="bi bi-images"></i>
                    <span>Slider</span>
                </a>
            </li>
            @can('admin')
            <li class="nav-item">
                <a class="nav-link {{ $active == 'approve-pro' || $active == 'approve-sli' ? '' : 'collapsed' }}"
                    data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-send-check"></i><span>Approval</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav"
                    class="nav-content collapse {{ $active == 'approve-pro' || $active == 'approve-sli' ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="{{ $active === 'approve-pro' ? 'active' : '' }}" href="/approve-pro">
                            <i class="bi bi-circle"></i><span>Product</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ $active === 'approve-sli' ? 'active' : '' }}" href="/approve-sli">
                            <i class="bi bi-circle"></i><span>Slider</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link {{ $active == 'user' || $active == 'role' ? '' : 'collapsed' }}"
                    data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-person-gear"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav"
                    class="nav-content collapse {{ $active == 'user' || $active == 'role' ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="{{ $active === 'user' ? 'active' : '' }}" href="/user">
                            <i class="bi bi-circle"></i><span>List Users</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ $active === 'role' ? 'active' : '' }}" href="/role">
                            <i class="bi bi-circle"></i><span>Role Users</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Tables Nav -->
            @endcan

            <li class="nav-heading">Pages</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/">
                    <i class="bi bi-globe2"></i>
                    <span>Store</span>
                </a>
            </li><!-- End Register Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/logout">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </a>
            </li><!-- End Login Page Nav -->
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        @yield('pagetitle')
        {{-- <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div><!-- End Page Title --> --}}

        <section class="section dashboard">
            <div class="row">
                @yield('content')
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Console Land</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://consoleland.web.id/">Console Land Store</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="dashadmin/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="dashadmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dashadmin/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="dashadmin/assets/vendor/echarts/echarts.min.js"></script>
    <script src="dashadmin/assets/vendor/quill/quill.min.js"></script>
    <script src="dashadmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="dashadmin/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="dashadmin/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="dashadmin/assets/js/main.js"></script>
    <script>
        function preview() {

            frame.src = URL.createObjectURL(event.target.files[0]);

        }

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.file[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
</body>

</html>
