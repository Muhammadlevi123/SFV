<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Smart Fisheries Village</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo/SFV.png') }}" rel="icon">
    <link href="{{ asset('assets/img/logo/SFV.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="{{ asset('assets/css/variables.css') }}" rel="stylesheet">
    <!-- <link href="assets/css/variables-blue.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-green.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-orange.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-purple.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-red.css" rel="stylesheet"> -->
    <!-- <link href="assets/css/variables-pink.css" rel="stylesheet"> -->

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    @yield('style')
    <!-- =======================================================
  * Template Name: HeroBiz
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top" data-scrollto-offset="0">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a href="{{ route('/') }}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src='{{ asset('assets/img/logo/SFV_5.png') }}' alt="">
                {{-- <h1><span>.</span></h1> --}}
            </a>

            <nav id="navbar" class="navbar ">
                <ul>
                    <li><a class="nav-link scrollto" href="{{ route('/') }}">Home</a></li>
                    <li class="dropdown megamenu"><a href="#"><span>Smart Fisheries Village</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li>
                                <a href="{{ route('upt.index') }}"
                                    class="d-flex align-items-center pb-1 position-relative">
                                    <div class="text-bg-light rounded-1 me-1 p-2 d-flex align-items-center justify-content-center"
                                        style="background: rgba(0,0,0,0.1) !important">
                                        <i class="bi bi-safe-fill fs-3" style="color: rgb(255, 157, 0)" /></i>
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold" style="font-size: 14px !important;">
                                            SFV UPT
                                        </h6>
                                        <span class="d-block text-body-secondary" style="font-size: 12px !important">SFV
                                            Unit Pelaksana Tugas</span>
                                    </div>
                                </a>
                                <a href="{{ route('desa.index') }}"
                                    class="d-flex align-items-center pb-1 position-relative">
                                    <div class="text-bg-light rounded-1 me-1 p-2 d-flex align-items-center justify-content-center"
                                        style="background: rgba(0,0,0,0.1) !important">
                                        <i class="bi bi-motherboard-fill fs-3" style="color: rgb(3, 177, 200)" /></i>
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold" style="font-size: 14px !important;">
                                            SFV Desa
                                        </h6>
                                        <span class="d-block text-body-secondary"
                                            style="font-size: 12px !important">Berbasis Desa</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('detail.index') }}"
                                    class="d-flex align-items-center pb-1 position-relative">
                                    <div class="text-bg-light rounded-1 me-1 p-2 d-flex align-items-center justify-content-center"
                                        style="background: rgba(0,0,0,0.1) !important">
                                        <i class="bi bi-circle-square text-danger fs-3" /></i>
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold" style="font-size: 14px !important;">
                                            Profile
                                        </h6>
                                        <span class="d-block text-body-secondary" style="font-size: 12px !important">
                                            Profile SFV</span>
                                    </div>
                                </a>
                                <a href="{{ route('produktivitas.unit') }}"
                                    class="d-flex align-items-center pb-1 position-relative">
                                    <div class="text-bg-light rounded-1 me-1 p-2 d-flex align-items-center justify-content-center"
                                        style="background: rgba(0,0,0,0.1) !important">
                                        <i class="bi bi-bar-chart-line-fill fs-3"
                                            style="color: rgb(169, 48, 255)" /></i>
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold" style="font-size: 14px !important;">
                                            Produktivitas
                                        </h6>
                                        <span class="d-block text-body-secondary"
                                            style="font-size: 12px !important">Produktivitas SFV</span>
                                    </div>
                                </a>
                                <a href="{{ route('produksi.unit') }}"
                                    class="d-flex align-items-center pb-1 position-relative">
                                    <div class="text-bg-light rounded-1 me-1 p-2 d-flex align-items-center justify-content-center"
                                        style="background: rgba(0,0,0,0.1) !important">
                                        <i class="bi bi-box-seam-fill fs-3" style="color: rgb(6, 175, 42)" /></i>
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold" style="font-size: 14px !important;">
                                            Produksi
                                        </h6>
                                        <span class="d-block text-body-secondary"
                                            style="font-size: 12px !important">Produksi SFV</span>
                                    </div>
                                </a>
                                <a href="{{ route('pnbp.unit') }}"
                                    class="d-flex align-items-center pb-1 position-relative">
                                    <div class="text-bg-light rounded-1 me-1 p-2 d-flex align-items-center justify-content-center"
                                        style="background: rgba(0,0,0,0.1) !important">
                                        <i class="bi bi-graph-up-arrow fs-3" style="color: rgb(12, 96, 230)" /></i>
                                    </div>
                                    <div class="d-inline-block">
                                        <h6 class="mb-1 fw-semibold" style="font-size: 14px !important;">
                                            PNBP
                                        </h6>
                                        <span class="d-block text-body-secondary"
                                            style="font-size: 12px !important"></span>
                                    </div>
                                </a>
                            </li>
                            {{-- <li style="border-left: 1px solid rgb(90, 90, 90);">
                  
                            </li> --}}
                            <li></li>

                        </ul>
                    </li>
                    {{-- <li><a class="nav-link scrollto" href="index.html#contact">Contact</a></li> --}}
                </ul>
                <i class="bi bi-list mobile-nav-toggle d-none"></i>
            </nav><!-- .navbar -->

            <a class="btn-getstarted scrollto" href="{{ route('unit.login') }}#portfolio">Login</a>

        </div>
    </header><!-- End Header -->

    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer bottom">
        <div class="footer-legal text-center">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">
                {{--  --}}
                <div class="social-links order-first order-lg-start mb-3 mb-lg-0">
                    {{-- <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a> --}}
                </div>
                {{--  --}}
                <div class="d-flex flex-column align-items-center align-items-lg-last">
                    <div class="copyright">
                        <img style="max-height: 4em" src="{{ asset('assets/img/logo/SFV_7.png') }}" alt="">

                    </div>
                    <div class="credits">
                        All right Reserved <a href="https://bootstrapmade.com/">2023-2024</a>
                    </div>
                </div>
                {{--  --}}
            </div>
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    @yield('script')
    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>


    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
