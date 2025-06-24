<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SFV Unit</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="{{ asset('assets/adm/css/styles.min.css') }}" />
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    @yield('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/styles/choices.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js"></script>
    {{-- <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href=" https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
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
                            <a class="sidebar-link" href="{{ route('superadmin.home') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Tata Kelola</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('superadmin.produksi.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Produksi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('superadmin.produktivitas.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-list"></i>
                                </span>
                                <span class="hide-menu">Produktivitas</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('superadmin.pnbp.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">PNBP</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('superadmin.aset.index') }}" aria-expanded="false">
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
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <h6><a href="{{ route('opt.dashboard.index') }}">Home</a> @yield('title')</h6>

                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('assets/img/icon/gambar_profile2.png') }}" alt=""
                                        width="35" height="35" class="rounded-circle">


                                    <div class="position-relative m-1" style="top: 5px;">
                                        <h6>SUPER ADMIN</h6>
                                    </div>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        {{-- <a href="{{ route('user.index') }}"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="fas fa-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a> --}}

                                        <form id="logout-form" action="{{ route('unit.logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>

                                        <a href="javascript:void(0);"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                    </div>
                                </div>

                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->

            @yield('content')

        </div>
    </div>
    {{-- datatables --}}
    <script src=" https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src=" https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src=" https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
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
