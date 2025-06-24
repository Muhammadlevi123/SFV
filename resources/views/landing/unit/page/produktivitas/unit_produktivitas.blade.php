@extends('landing.unit.layout.unit_main')
@section('listunit')
    <div class="navbar-collapse justify-content-end " id="navbarNav">
        <form action="{{ route('produktivitas.unit') }}" id="unit-form" class="form-group" style="width:100%">
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
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12 align-items-strech">
                <div class="row">
                    <div class="col-lg-12 p-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                    <div class="mb-3 mb-sm-0">
                                        @if (empty($idu))
                                            <h5 class="card-title fw-semibold">Total Visitor 2023
                                            </h5>
                                        @else
                                            <h5 class="card-title fw-semibold">Total Visitor 
                                                <b class="text-warning">{{ $profile->nama_unit }}</b>
                                            </h5>
                                        @endif
                                    </div>
                                    <div>
                                        <form action="" id="tahun-form">
                                            <select class="form-select" id="tahun-select" name="tahun-select">
                                                <option value="">ALL</option>
                                                <option value="2020"> 2020</option>
                                                <option value="2021"> 2021</option>
                                                <option value="2022"> 2022</option>
                                                <option value="2023"> 2023</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                                <div id="chart-pnbp"></div>
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
                $("#chart-pnbp").html("");
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
                url: "http://def-sfv.apap-project.me/kategorixjumlah?th=" + year + "&&unit=" + {{ $idu }},
                type: 'GET',
                cache: false,
            }).done(function(json) {
                // console.log(json.datas);
                var seriesa = [];
                var label = [];
                $.each(json.datas, function(i, data) {
                    seriesa.push(parseInt(data.jml));
                    label.push(data.kategori);
                });
                // console.log(seriesb);
                var options3 = {
                    series: [{
                        name: 'Pagu',
                        data: seriesa
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
                        enabled: true
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
                            text: 'Jumlah Kunjungan'
                        }
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val
                            }
                        }
                    }
                };

                var chart = new ApexCharts(document.querySelector("#chart-pnbp"), options3);
                chart.render();
            });
        }
        // end pnbps

        $('#tahun-select').on('change', function() {
            $("#chart-pnbp").html("");
            // ===========================
            var year = $(this).val();
            pnbp(year);

        });
        pnbp('');
    </script>
@endsection
