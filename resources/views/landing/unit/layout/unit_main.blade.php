<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SFV Unit</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="{{ asset('assets/adm/css/styles.min.css') }}" />
    @yield('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/styles/choices.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js"></script>
    {{-- <link href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link href="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"> --}}
    <style>
        .fade-in {
            animation: fadeIn 1s;
        }
    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper " style="background-color: rgba(125, 125, 125, 0.015)" id="main-wrapper"
        data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed"
        data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{ route('/') }}" class="text-nowrap logo-img pt-3">
                        <img src="{{ asset('assets/img/logo/SFV_5.png') }}" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('/unit') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Statistik</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('produksi.unit') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Produksi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('produktivitas.unit') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-list"></i>
                                </span>
                                <span class="hide-menu">Produktivitas</span>
                            </a>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('pnbp.unit') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">PNBP</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('aset.unit') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Aset</span>
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper mw-100">
            <!--  Header Start -->
            <header class="app-header" style="background-color: #FDFDFD">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>

                    </ul>
                    @yield('listunit')
                </nav>
            </header>

            @yield('content')

        </div>
    </div>
    {{-- datatables --}}
    {{-- <script src=" https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src=" https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src=" https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script> --}}
    {{-- end datatables --}}
    <script src="{{ asset('assets/adm/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/adm/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/adm/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/adm/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/adm/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/adm/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/adm/js/dashboard.js') }}"></script>
    {{--  --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        new Choices(document.querySelector(".choices-sfv"));
        new Choices(document.querySelector(".choices-thn"));
    </script>s

    @yield('script')
</body>

</html>
