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
                        <img src="home/assets/images/icons/logo_console.png" alt="IMG-LOGO">
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
                            @can('staff')
                                <li>
                                    <a href="/dash">Admin Area</a>
                                </li>
                            @endcan                            
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
                                    <a href="/profile">My Profile</a>
                                </li>
                                <li>
                                    <a href="/logout">Logout</a>
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
                <a href="index.html"><img src="home/assets/images/icons/logo_console.png" alt="IMG-LOGO"></a>
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
                    <li>
                        <a href="/profile">My Profile</a>
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
                    <div class="thumb-image item-slick1 bg-overlay1"
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

                {{-- <div class="flex-w flex-c-m m-tb-10">
                    <form action="/landing" method="GET">
                        <div class="flex-w flex-c-m m-tb-10">
                            <div class="m-r-15">
                                <label for="customRangeMin" class="form-label">Harga Min:</label>
                                <input type="range" class="form-range" id="customRangeMin" name="min_price" min="0" max="20000000"
                                    value="{{ $minPrice ?? 0 }}">
                                <span id="minPriceValue">Rp. {{ number_format($minPrice ?? 0, 0, ',', '.') }}</span> Juta
                            </div>
                            <div class="m-r-15">
                                <label for="customRangeMax" class="form-label">Harga Max:</label>
                                <input type="range" class="form-range" id="customRangeMax" name="max_price" min="0" max="20000000"
                                    value="{{ $maxPrice ?? 0 }}">
                                <span id="maxPriceValue">Rp. {{ number_format($maxPrice ?? 0, 0, ',', '.') }}</span> Juta
                            </div>
                            <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4">
                                <button type="submit" class="bg0">Search</button>
                            </div>
                        </div>
                    </form>
                </div> --}}
                
                
                
                
            </div>
            <div class="row isotope-grid">
                @foreach ($products as $item)
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ $item->cat_id }}">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="IMG-PRODUCT">

                                <a href="#"
                                    class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                    {{ $item->description }}
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
                                <div class="block2-txt-child2 flex-r p-t-3">
                                    <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                        <img class="icon-heart1 dis-block trans-04"
                                            src="home/assets/images/icons/icon-heart-01.png" alt="ICON">
                                        <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                            src="home/assets/images/icons/icon-heart-02.png" alt="ICON">
                                    </a>
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
            </script> All rights reserved | Made by <a href="https://consoleland.my.id"
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
    {{-- <script>
        var minRangeInput = document.getElementById('customRangeMin');
        var minPriceValue = document.getElementById('minPriceValue');
    
        minRangeInput.addEventListener('input', function() {
            var value = parseFloat(minRangeInput.value);
            minPriceValue.textContent = 'Rp. ' + formatCurrency(value) + ',-';
        });
    
        var maxRangeInput = document.getElementById('customRangeMax');
        var maxPriceValue = document.getElementById('maxPriceValue');
    
        maxRangeInput.addEventListener('input', function() {
            var value = parseFloat(maxRangeInput.value);
            maxPriceValue.textContent = 'Rp. ' + formatCurrency(value) + ',-';
        });
    
        function formatCurrency(amount) {
            var formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
            return formatter.format(amount);
        }
    </script> --}}

</body>

</html>
