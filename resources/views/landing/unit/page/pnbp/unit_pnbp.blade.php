@extends('landing.unit.layout.unit_main')
@section('listunit')
    <div class="navbar-collapse justify-content-end " id="navbarNav">
        <form action="{{ route('pnbp.unit') }}" id="unit-form" class="form-group" style="width:100%">
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
                                <h5 class="card-title mb-9 fw-semibold">Total Seluruh <ds class="text-danger">PNBP</ds>
                                </h5>
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h4 class="fw-semibold mb-3">Rp. {{ number_format($pnbpall[0]->jml) }}</h4>
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
                                <div class="row align-items-start">
                                    <div class="col-12">
                                        <h5 class="card-title mb-9 fw-semibold">Total <ds class="text-info">
                                                PNBP</ds>
                                            @if (empty($idu))
                                                (ALL)
                                            @else
                                                {{ $profile->nama_unit }}
                                            @endif
                                        </h5>
                                        <h4 class="fw-semibold mb-3">Rp. {{ number_format($pnbpunit[0]->jml) }}</h4>
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
                                        @if (empty($idu))
                                            <h5 class="card-title fw-semibold">Target PNBP / Anggaran
                                            </h5>
                                        @else
                                            <h5 class="card-title fw-semibold">Target PNBP / Anggaran
                                                <b class="text-warning">{{ $profile->nama_unit }}</b>
                                            </h5>
                                        @endif
                                    </div>
                                    <div>
                                        <form action="" id="tahun-form">
                                            <select class="form-select" id="tahun-select" name="tahun-select">
                                                <option value="">ALL</option>
                                                @foreach ($thnp as $t)
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
                    <div class="col-lg-12 p-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                    <div class="mb-3 mb-sm-0">
                                        <h5 class="card-title text-start fw-semibold">Tabel PNBP <ds id="yeart">2023
                                            </ds>
                                        </h5>
                                    </div>
                                    <div>
                                        <form action="" id="tahun-form">
                                            <select class="form-select" id="tahuns-select" name="tahuns-select">
                                                <option value="">ALL</option>
                                                @foreach ($thnp as $t)
                                                    <option value="{{ $t->tahun }}">{{ $t->tahun }}</option>
                                                @endforeach
                                            </select>
                                        </form>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="tpnbp" style="width:100%">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Unit SFV</th>
                                                <th>PNBP</th>
                                                <th>Realisasi</th>
                                                <th>Anggaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
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
        function tablepnbp(yeart) {
            $.ajax({
                url: "/operator/pnbp?th=" + yeart,
                type: 'GET',
                cache: "false",
            }).done(function(json) {
                $.each(json.datas, function(i, data) {
                    // $('table').append('<tr><td>' + data.tahun + '</td>');
                    var tr_str = "<tr>" +
                        "<td align='center'>" + data.nama_unit + "</td>" +
                        "<td align='center'>Rp. " + parseFloat(data.pnbp).toLocaleString('id-ID') +
                        "</td>" +
                        "<td align='center'>Rp. " + parseFloat(data.realisasi).toLocaleString('id-ID') +
                        "</td>" +
                        "<td align='center'>Rp. " + parseFloat(data.anggaran).toLocaleString('id-ID') +
                        "</td>" +
                        "</tr>";
                    $("#tpnbp tbody").append(tr_str);

                });
                // console.log(tr_str);


            }).fail(function(jqXHR, textStatus) {
                alert('Request Failed');
            });
        };
    </script>
    {{--  --}}
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
        // pnbp
        function pnbp(year, unit) {
            $.ajax({
                    url: "/operator/pnbpxanggaran?th=" + year + "&&unit=" + {{ $idu }},
                    type: 'GET',
                    cache: false,
                })
                .done(function(json) {
                    // console.log("Request berhasil, data diterima:", json); // Debugging
                    var seriesa = [];
                    var seriesb = [];
                    var label = [];
                    $.each(json.datas, function(i, data) {
                        seriesa.push(parseInt(data.jml_pnbp));
                        seriesb.push(parseInt(data.jml_anggaran));
                        label.push(data.tahun);
                    });

                    var options3 = {
                        series: [{
                            name: 'PNBP',
                            data: seriesa
                        }, {
                            name: 'Anggaran',
                            data: seriesb
                        }],
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
                })
            // .fail(function(jqXHR, textStatus, errorThrown) {
            //     console.log("Request gagal: " + textStatus + ", " + errorThrown); // Debugging kesalahan
            // })
            // .always(function() {
            //     console.log("Request AJAX selesai."); // Debugging untuk mengetahui apakah permintaan selesai
            // });
        }


        // end pnbp

        $('#tahuns-select').on('change', function() {
            $("#tpnbp tbody").html("");
            $("#yeart").text("");

            // ===========================
            var yeart = $(this).val();
            tablepnbp(yeart);
            $('#yeart').text(yeart);

        });
        tablepnbp('');

        $('#tahun-select').on('change', function() {
            $("#chart-pnbp").html("");
            // ===========================
            var year = $(this).val();
            pnbp(year);

        });
        pnbp('');
    </script>
@endsection
