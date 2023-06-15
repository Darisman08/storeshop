<!DOCTYPE html>
<html lang="en">

<head>
    <title>Console Land</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="home/assets/images/icons/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="home/assets/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="home/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="home/assets/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="home/assets/fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="home/assets/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="home/assets/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="home/assets/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="home/assets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="home/assets/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="home/assets/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="home/assets/vendor/MagnificPopup/magnific-popup.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="home/assets/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="home/assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="home/assets/css/main.css">
    <!--===============================================================================================-->
</head>

<body class="animsition">

    <!-- Header -->
    <header class="header-v3">
        <!-- Header desktop -->
        <div class="container-menu-desktop trans-03">
            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop p-l-45">

                    <!-- Logo desktop -->
                    <a href="/" class="logo">
                        <img src="home/assets/images/icons/logo-01.png" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li class="{{ $active === 'home' ? 'active-menu' : '' }}">
                                <a href="#slide-section">Home</a>
                            </li>
                            <li class="label1" data-label1="hot">
                                <a href="#product-section">Product</a>
                            </li>
                            @auth
                                <li>
                                    <a href="/dash">Admin Area</a>
                                </li>
                            @endauth
                        </ul>
                    </div>

                    <!-- Icon header -->

                    <div class="wrap-icon-header flex-w flex-r-m h-full">
                        <div class="flex-c-m h-full p-r-25 bor6 main-menu">
                            @auth
                                <li>
                                    <a href="">Welcome back, {{ auth()->user()->name }}</a>
                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}">Logout</a>
                                </li>
                            @else
                                <li>
                                    <a href="/login">Login</a>
                                </li>
                            </div>
                        </div>
                    @endauth
                </nav>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="index.html"><img src="home/assets/images/icons/logo-01.png" alt="IMG-LOGO"></a>
            </div>
            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="main-menu-m">
                @auth
                    <li>
                        <a href="">Welcome back, {{ auth()->user()->name }}</a>
                    </li>
                @endauth
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="" class="label1 rs1" data-label1="hot">Product</a>
                </li>
                @can('staff')
                    <li>
                        <a href="/dash">Admin Area</a>
                    </li>
                @endcan
                @auth
                    <li>
                        <a href="/logout">Logout</a>
                    </li>
                    </li>
                @else
                    <li>
                        <a href="/login">Login</a>
                    </li>
                @endauth
            </ul>
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <button class="flex-c-m btn-hide-modal-search trans-04">
                <i class="zmdi zmdi-close"></i>
            </button>

            <form class="container-search-header">
                <div class="wrap-search-header">
                    <input class="plh0" type="text" name="search" placeholder="Search...">

                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </header>
    <!-- Slider -->
    <section id="slide-section" class="section-slide">
        <div class="wrap-slick1 rs2-slick1">
            <div class="slick1">
                @foreach ($slides as $item)
                    <div class="item-slick1 bg-overlay1"
                        style="background-image: url({{ asset('storage/' . $item->image) }});"
                        data-thumb="{{ asset('storage/' . $item->image) }}" data-caption="{{ $item->name }}">
                        <div class="container h-full">
                            <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInUp"
                                    data-delay="800">
                                    <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                        {{ $item->name }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="wrap-slick1-dots p-lr-10"></div>
        </div>
    </section>


    <!-- Banner -->
    {{-- <div class="sec-banner bg0 p-t-95 p-b-55">
        <div class="container">
            <div class="row">
                @foreach ($category as $item)
                <div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="IMG-BANNER">

                        <a href="/"
                            class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Watches
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    Spring 2018
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach

                <div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="home/assets/images/banner-08.jpg" alt="IMG-BANNER">

                        <a href="product.html"
                            class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Bags
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    Spring 2018
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
                    <!-- Block1 -->
                    <div class="block1 wrap-pic-w">
                        <img src="home/assets/images/banner-09.jpg" alt="IMG-BANNER">

                        <a href="product.html"
                            class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                            <div class="block1-txt-child1 flex-col-l">
                                <span class="block1-name ltext-102 trans-04 p-b-8">
                                    Accessories
                                </span>

                                <span class="block1-info stext-102 trans-04">
                                    Spring 2018
                                </span>
                            </div>

                            <div class="block1-txt-child2 p-b-4 trans-05">
                                <div class="block1-link stext-101 cl0 trans-09">
                                    Shop Now
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <!-- Product -->
    <section id="product-section" class="bg0 p-t-23 p-b-130">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Product Overview
                </h3>
            </div>

            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        All Products
                    </button>
                    @foreach ($category as $item)
                        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5"
                            data-filter=".{{ $item->id }}">
                            {{ $item->name }}
                        </button>
                    @endforeach
                </div>

                <div class="flex-w flex-c-m m-tb-10">
                    <div
                        class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                        <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                        <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Filter
                    </div>

                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Search
                    </div>
                </div>

                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>

                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product"
                            placeholder="Search">
                    </div>
                </div>

                <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Sort By
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Default
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Popularity
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Average rating
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        Newness
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Price: Low to High
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Price: High to Low
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col2 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Price
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        All
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $0.00 - $50.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $50.00 - $100.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $100.00 - $150.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $150.00 - $200.00
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="#" class="filter-link stext-106 trans-04">
                                        $200.00+
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col3 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Color
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #222;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Black
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        Blue
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Grey
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Green
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Red
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
                                        <i class="zmdi zmdi-circle-o"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        White
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="filter-col4 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Tags
                            </div>

                            <div class="flex-w p-t-4 m-r--5">
                                <a href="#"
                                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Fashion
                                </a>

                                <a href="#"
                                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Lifestyle
                                </a>

                                <a href="#"
                                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Denim
                                </a>

                                <a href="#"
                                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Streetstyle
                                </a>

                                <a href="#"
                                    class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                    Crafts
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row isotope-grid">
                @foreach ($products as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $item->cat_id }}"
                        style="width: 200px; height: 200px; object-fit: cover;">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="IMG-PRODUCT">

                                <a href="#"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    Quick View
                                </a>
                            </div>

                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="product-detail.html"
                                        class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        {{ $item->name }}
                                    </a>

                                    <span class="stext-105 cl3">
                                        Rp. {{ number_format($item->price, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex-c-m flex-w w-full p-t-38">
                <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7 active-pagination1">
                    1
                </a>

                <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">
                    2
                </a>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg3 p-t-50 p-b-32">
        <div class="flex-c-m flex-w p-b-18">
            <a href="#" class="m-all-1">
                <img src="home/assets/images/icons/icon-pay-01.png" alt="ICON-PAY">
            </a>

            <a href="#" class="m-all-1">
                <img src="home/assets/images/icons/icon-pay-02.png" alt="ICON-PAY">
            </a>

            <a href="#" class="m-all-1">
                <img src="home/assets/images/icons/icon-pay-03.png" alt="ICON-PAY">
            </a>

            <a href="#" class="m-all-1">
                <img src="home/assets/images/icons/icon-pay-04.png" alt="ICON-PAY">
            </a>

            <a href="#" class="m-all-1">
                <img src="home/assets/images/icons/icon-pay-05.png" alt="ICON-PAY">
            </a>
        </div>

        <p class="stext-107 cl6 txt-center">
            Copyright &copy;
            <script>
                document.write(new Date().getFullYear());
            </script> All rights reserved | Made by <a href="https://consoleland.web.id"
                target="_blank">Console Land Store</a>
        </p>
    </footer>


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>


    <!--===============================================================================================-->
    <script src="home/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="home/assets/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="home/assets/vendor/bootstrap/js/popper.js"></script>
    <script src="home/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="home/assets/vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <!--===============================================================================================-->
    <script src="home/assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="home/assets/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="home/assets/vendor/slick/slick.min.js"></script>
    <script src="home/assets/js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script src="home/assets/vendor/parallax100/parallax100.js"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script src="home/assets/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="home/assets/vendor/isotope/isotope.pkgd.min.js"></script>
    <!--===============================================================================================-->

    <!--===============================================================================================-->
    <script src="home/assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
                ps.update();
            })
        });
    </script>
    <!--===============================================================================================-->
    <script src="home/assets/js/main.js"></script>

</body>

</html>
