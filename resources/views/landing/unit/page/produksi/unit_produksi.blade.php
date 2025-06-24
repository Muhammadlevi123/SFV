@extends('landing.unit.layout.unit_main')
@section('listunit')
    <div class="navbar-collapse justify-content-end " id="navbarNav">
        <form action="{{ route('produksi.unit') }}" id="unit-form" class="form-group" style="width:100%">
            <div class="sidebar-item search-form m-0">
                <select class="form-control choices-sfv" name="id" id="unit-select">
                    <option value="">ALL</option>
                    @if (empty($idu))
                        @foreach ($profile_list as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->nama_unit }}</option>
                        @endforeach
                    @else
                        @foreach ($profile_list as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $profile->id ? 'selected' : '' }}>
                                {{ $item->nama_unit }}</option>
                        @endforeach
                    @endif
                </select>
            </div><!-- End sidebar search formn-->
        </form>
        {{-- <button class="btn btn-info btn-lg mx-2"><i class="ti ti-search"></i></button> --}}
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4">
                        <!-- Yearly Breakup -->
                        <div class="card overflow-hidden">
                            <div class="card-body p-4">
                                <h5 class="card-title mb-9 fw-semibold">Target <ds class="text-danger">
                                        Produksi</ds>
                                </h5>
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h4 class="fw-semibold mb-3">{{ number_format($produksi[0]->jml) }} Kg</h4>
                                        <div class="d-flex align-items-center mb-3">
                                            <h6>Tahun 2022 - sekarang</h6>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Monthly Earnings -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row alig n-items-start">
                                    <div class="col-8">
                                        <h5 class="card-title mb-9 fw-semibold"> Total Capaian<ds class="text-info">
                                                Produksi</ds>
                                        </h5>
                                        <h4 class="fw-semibold mb-3">{{ number_format($capaian[0]->jml) }} Kg</h4>
                                        <div class="d-flex align-items-center pb-1">
                                            <h6>Tahun 2022 - sekarang</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Monthly Earnings -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row alig n-items-start">
                                    <div class="col-8">
                                        <h5 class="card-title mb-9 fw-semibold">Total Biaya<ds class="text-warning">
                                                Produksi</ds>
                                        </h5>
                                        <h4 class="fw-semibold mb-3">Rp.{{ number_format($biayaproduksi[0]->jml) }}</h4>
                                        <div class="d-flex align-items-center pb-1">
                                            <h6>Tahun 2022 - sekarang</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 align-items-strech">
                <div class="row">
                    <div class="col-lg-12 p-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                    <div class="mb-3 mb-sm-0">
                                        <h5 class="card-title fw-semibold">Target Nilai Pagu / Produksi</h5>
                                    </div>
                                    <div>
                                        <form action="" id="tahun-form">
                                            <select class="form-select" id="tahun-select" name="tahun-select">
                                                <option value="">ALL</option>
                                                @foreach ($thnpr as $t)
                                                    <option value="{{ $t->tahun }}">{{ $t->tahun }}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </div>
                                </div>
                                <div id="chart-pnbp"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 p-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                    <div class="mb-3 mb-sm-0">
                                        <h5 class="card-title text-start fw-semibold">Total Hasil Produksi / Target</h5>
                                    </div>
                                </div>
                                <div id="chart-aset"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 p-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                    <div class="mb-3 mb-sm-0">
                                        <h5 class="card-title text-start fw-semibold">Komoditas Hasil Produksi</h5>
                                    </div>
                                </div>
                                <div id="chart-komoditas"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
@section('style')
@endsection
@section('script')
    <script>
        // select unit
        $(function() {
            $("#unit-select").change(function() {
                $("#chart-realisasi").html("");
                $("#chart-pnbp").html("");
                $("#chart-komoditas").html("");
                $("#chart-aset").html("");
                $("#unit-form").submit();
            });
        });
        // end select unit
    </script>
    {{--  --}}
    <script>
        // pagu
        function realisasi(year, unit) {
            $.ajax({
                url: "http://def-sfv.apap-project.me/anggaranxrealisasi?th=" + year + "&&unit=" +
                    {{ $idu }},
                type: 'GET',
                cache: false,
            }).done(function(json) {
                // console.log(json.datas);
                var sisa = [];
                var textrea = [];
                var textang = [];
                var textsisa = [];
                // console.log(sisa);
                var cat = [];
                $.each(json.datas, function(i, data) {
                    var a = data.jml_realisasi / data.jml_anggaran;
                    sisa.push((a * 100));
                    textang.push(data.jml_anggaran);
                    textrea.push(data.jml_realisasi);
                    textsisa.push(data.jml_sisa);
                    cat.push(data.tahun);
                });
                $('#textrea').text(textrea);
                $('#textang').text(textang);
                $('#textsisa').text(textsisa);
                var options1 = {
                    series: sisa,
                    chart: {
                        width: '100%',
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
                    labels: cat,
                };
                var chart = new ApexCharts(document.querySelector("#chart-realisasi"), options1);
                chart.render();
            });
        }
        // end pagu

        // pnbp
        function pnbp(year, unit) {

            $.ajax({
                url: "operator/paguxproduksi?th=" + year + "&&unit=" + {{ $idu }},
                type: 'GET',
                cache: false,
            }).done(function(json) {
                // console.log(json.datas);
                var seriesa = [];
                var seriesb = [];
                var label = [];
                $.each(json.datas, function(i, data) {
                    seriesa.push(parseInt(data.jml_pagu));
                    seriesb.push(parseInt(data.jml_produksi));
                    label.push(data.tahun);
                });
                // console.log(seriesb);
                var options3 = {
                    series: [{
                        name: 'Pagu',
                        data: seriesa
                    }, {
                        name: 'Biaya Produksi',
                        data: seriesb
                    }, ],
                    chart: {
                        type: 'bar',
                        height: 350
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: label,
                    },
                    yaxis: {
                        title: {
                            text: 'Nominal Rp.'
                        },
                        labels: {
                                formatter: function(val) {
                                    return "Rp. " + val.toLocaleString(
                                    'id-ID'); // Format ribuan dengan pemisah koma
                                }
                            }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                            y: {
                                formatter: function(val) {
                                    return "Rp. " + val.toLocaleString(
                                    'id-ID'); // Format ribuan dengan pemisah koma
                                }
                            }
                        }
                };

                var chart = new ApexCharts(document.querySelector("#chart-pnbp"), options3);
                chart.render();
            });
        }
        // end pnbp

        // komoditas
        function komoditas(year, unit) {
            $.ajax({
                url: "/operator/produkxcapaian?th=" + year + "&&unit=" + {{ $idu }},
                type: 'GET',
                cache: false,
            }).done(function(json) {
                console.log(json.datas);
                var seriesa = [];
                var label = [];
                $.each(json.datas, function(i, data) {
                    seriesa.push(parseInt(data.jml_produksi));
                    label.push(data.produk);
                });
                var options4 = {
                    series: seriesa,
                    labels: label,
                    chart: {
                        height: '393',
                        width: '100%',
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
                var chart = new ApexCharts(document.querySelector("#chart-komoditas"), options4);
                chart.render();
            });
        }
        // end komoditas

        // aset
        function aset(year, unit) {
            $.ajax({
                url: "/operator/targetxcapaian?th=" + year + "&&unit=" + {{ $idu }},
                type: 'GET',
                cache: false,
            }).done(function(json) {
                // console.log(json.datas);
                var seriesa = [];
                var seriesb = [];
                var label = [];
                $.each(json.datas, function(i, data) {
                    seriesa.push(parseInt(data.jml_target_produksi));
                    seriesb.push(parseInt(data.jml_capaian_produksi));
                    label.push(data.tahun);
                });
                // console.log(seriesb);
                var options5 = {
                    series: [{
                        name: 'Target Produksi',
                        data: seriesa
                    }, {
                        name: 'Capaian Produksi',
                        data: seriesb
                    }, ],
                    chart: {
                        type: 'bar',
                        height: 350
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: label,
                    },
                    yaxis: {
                        title: {
                            text: 'Target Produksi (Kg)'
                        },
                        labels: {
                                formatter: function(val) {
                                    return "Rp. " + val.toLocaleString(
                                    'id-ID'); // Format ribuan dengan pemisah koma
                                }
                            }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                                formatter: function(val) {
                                    return "Rp. " + val.toLocaleString(
                                    'id-ID'); // Format ribuan dengan pemisah koma
                                }
                            }
                    }
                };

                var chart = new ApexCharts(document.querySelector("#chart-aset"), options5);
                chart.render();
            });
        }
        // end aset

        $('#tahun-select').on('change', function() {
            $("#chart-realisasi").html("");
            $("#chart-pnbp").html("");
            $("#chart-komoditas").html("");
            $("#chart-aset").html("");
            // ===========================
            $('#textrea').text("");
            $('#textang').text("");
            $('#textsisa').text("");
            // ===========================
            var year = $(this).val();
            // console.log(year);
            realisasi(year);
            pnbp(year);
            komoditas(year);
            aset(year);

        });
        realisasi('');
        pnbp('');
        komoditas('');
        aset('');
    </script>
@endsection
