@extends('landing.layout.main')
@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>PRODUKSI</h2>
                    <ol>
                        <li><a href="{{ route('/') }}">Home</a></li>
                        <li>Produksi</li>
                    </ol>
                </div>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Blog Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">

                <div class="row g-5">
                    <div class="col-lg-3">

                        <div class="sidebar">
                            <form action="">
                                <div class="sidebar-item search-form m-0">
                                    <h3 class="sidebar-title mb-2">SFV :</h3>
                                    <select class="form-control choices-sfv">
                                        <option></option>
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option value="WY">Wyoming</option>
                                    </select>
                                </div><!-- End sidebar search formn-->

                                <div class="sidebar-item search-form m-0">
                                    <h3 class="sidebar-title mb-2 mt-3">Tahun :</h3>
                                    <select class="form-control choices-thn">
                                        <option></option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                    </select>
                                </div><!-- End sidebar search formn-->

                                <div class="d-grid gap-2 mt-4">
                                    <button class="btn btn-primary" type="button"><i class="bi bi-search"></i>
                                        Tampilkan</button>
                                </div>
                            </form>

                        </div><!-- End Blog Sidebar -->

                    </div>
                    <div class="col-lg-9">

                        <div class="row gy-4 posts-list">

                            <div class="col-lg-6">
                                <article class="card d-flex flex-column">
                                    <div class="card-body">
                                        <div id="chart-pagu"></div>
                                    </div>
                                    <div class="card-footer bg-transparent border-0">
                                        <h6 class="title text-center">
                                            Prosentase Realisasi PNBP Terhadap Pagu
                                        </h6>
                                    </div>

                                </article>
                            </div><!-- End post list item -->

                            <div class="col-lg-6">
                                <article class="card d-flex flex-column">
                                    <div class="card-body">
                                        <div id="chart-belanja"></div>
                                    </div>
                                    <div class="card-footer bg-transparent border-0">
                                        <h6 class="title text-center">
                                            Realisasi Per Jenis Akun Belanja PNBP
                                        </h6>
                                    </div>
                                </article>
                            </div><!-- End post list item -->

                            <div class="col-lg-6">
                                <article class="card d-flex flex-column">
                                    <div class="card-body">
                                        <div id="chart-realisasi"></div>
                                    </div>
                                    <div class="card-footer bg-transparent border-0">
                                        <h6 class="title text-center">
                                            Realisasi PNBP Per Bulan
                                        </h6>
                                    </div>
                                </article>
                            </div><!-- End post list item -->

                            <div class="col-lg-6">
                                <article class="card d-flex flex-column">
                                    <div class="card-body">
                                        <div id="chart-jenis"></div>
                                    </div>
                                    <div class="card-footer bg-transparent border-0">
                                        <h6 class="title text-center">
                                            Realisasi PNBP Per Bulan
                                        </h6>
                                    </div>
                                </article>
                            </div><!-- End post list item -->


                        </div><!-- End blog posts list -->
                    </div>



                </div>

            </div>
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@endsection
@section('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/styles/choices.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js"></script>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        new Choices(document.querySelector(".choices-sfv"));
        new Choices(document.querySelector(".choices-thn"));
    </script>
    <script>
        // pagu
        var options1 = {
            series: [75],
            chart: {
                height: 350,
                type: 'radialBar',
                toolbar: {
                    show: true
                }
            },
            plotOptions: {
                radialBar: {
                    startAngle: -135,
                    endAngle: 225,
                    hollow: {
                        margin: 0,
                        size: '70%',
                        background: '#fff',
                        image: undefined,
                        imageOffsetX: 0,
                        imageOffsetY: 0,
                        position: 'front',
                        dropShadow: {
                            enabled: true,
                            top: 3,
                            left: 0,
                            blur: 4,
                            opacity: 0.24
                        }
                    },
                    track: {
                        background: '#fff',
                        strokeWidth: '67%',
                        margin: 0, // margin is in pixels
                        dropShadow: {
                            enabled: true,
                            top: -3,
                            left: 0,
                            blur: 4,
                            opacity: 0.35
                        }
                    },

                    dataLabels: {
                        show: true,
                        name: {
                            offsetY: -10,
                            show: true,
                            color: '#888',
                            fontSize: '17px'
                        },
                        value: {
                            formatter: function(val) {
                                return parseInt(val);
                            },
                            color: '#111',
                            fontSize: '36px',
                            show: true,
                        }
                    }
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    type: 'horizontal',
                    shadeIntensity: 0.5,
                    gradientToColors: ['#ABE5A1'],
                    inverseColors: true,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100]
                }
            },
            stroke: {
                lineCap: 'round'
            },
            labels: ['Percent'],
        };

        var chart = new ApexCharts(document.querySelector("#chart-pagu"), options1);
        chart.render();
        // end pagu

        // belanja
        var options2 = {
            series: [44, 55, 13, 43, 22],
            labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
            chart: {
                width: 400,
                type: 'donut',
                toolbar: {
                    show: true
                },

            },
            legend: {
                show: true,
                position: 'bottom',
            },
            plotOptions: {
                pie: {
                    donut: {
                        labels: {
                            show: true,
                        }
                    }
                }
            }

        };

        var chart = new ApexCharts(document.querySelector("#chart-belanja"), options2);
        chart.render();
        // end belanja

        // realisasi
        var options3 = {
            series: [{
                name: "STOCK ABC",
                data: ['110000000', '40000000', '65000000', '98000000']
            }],
            chart: {
                type: 'area',
                height: 350,
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },

            title: {
                text: 'Fundamental Analysis of Stocks',
                align: 'left'
            },
            subtitle: {
                text: 'Price Movements',
                align: 'left'
            },
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

            legend: {
                horizontalAlign: 'left'
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart-realisasi"), options3);
        chart.render();
        // end realisasi

        // jenis

        var options4 = {
            series: [44, 55],
            labels: ['Team A', 'Team B'],
            chart: {
                width: 400,
                type: 'pie',
                toolbar: {
                    show: true
                },

            },
            legend: {
                show: true,
                position: 'bottom',
            },
            plotOptions: {
                pie: {
                    donut: {
                        labels: {
                            show: true,
                        }
                    }
                }
            }

        };

        var chart = new ApexCharts(document.querySelector("#chart-jenis"), options4);
        chart.render();
        // end jenis
    </script>
@endsection
