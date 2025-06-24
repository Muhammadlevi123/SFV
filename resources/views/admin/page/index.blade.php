@extends('admin.layout.unit_main')
@section('title')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-4">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-9 fw-semibold">Total Seluruh <ds class="text-danger">produksi</ds>
                        </h5>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="fw-semibold mb-3">Rp. {{ number_format($produksi[0]->jml) }}</h4>
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
                                <h5 class="card-title mb-9 fw-semibold">Total Seluruh <ds class="text-info">
                                        PNBP</ds>
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
            <div class="col-lg-4">
                <!-- Monthly Earnings -->
                <div class="card">
                    <div class="card-body">
                        <div class="row alig n-items-start">
                            <div class="col-8">
                                <h5 class="card-title mb-9 fw-semibold">Total Seluruh <ds class="text-warning">
                                        Visitor</ds>
                                </h5>
                                <h4 class="fw-semibold mb-3">{{ $kunjungan[0]->jml }}</h4>
                                <div class="d-flex align-items-center pb-1">
                                    <h6>Tahun 2022 - sekarang</h6>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-9 fw-semibold">Download Laporan <ds class="">Data</ds>
                        </h5>
                        <div class="mt-4">
                            <a href="{{ route('download.produksi') }}" class="btn btn-primary me-2">Download Produksi </a>
                            <a href="{{ route('download.aset') }}" class="btn btn-primary me-2">Download Aset </a>
                            <a href="{{ route('download.pnbp') }}" class="btn btn-primary">Download PNBP </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Col-12 -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span class="fw-semibold">PNBP dan Anggaran</span>
                        <select id="year-filter" class="form-select w-auto">
                            @foreach ($tahun_pnbp as $t)
                                <option value="{{ $t->tahun }}">{{ $t->tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-body">
                        <div id="chart-1"></div>
                    </div>
                </div>
            </div>
            <div>
            </div>
        </div>
        <div class="row">
            <!-- Col-3 untuk setiap kartu -->
            <div class="col-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="fw-semibold">Capaian Produksi(%)</h6>
                        <select id="year-filter2" class="form-select w-auto">
                            @foreach ($tahun_produksi as $t)
                                <option value="{{ $t->tahun }}">{{ $t->tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-body">
                        {{-- <button id="download-svg">Download SVG</button> --}}
                        <div id="chart-2"></div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="fw-semibold">Biaya Produksi(%)</h6>
                        <select id="year-filter3" class="form-select w-auto">
                            @foreach ($tahun_produksi as $t)
                                <option value="{{ $t->tahun }}">{{ $t->tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-body">
                        <div id="chart-3"></div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="fw-semibold">Realisasi Dana(%)</h6>
                        <select id="year-filter4" class="form-select w-auto">
                            @foreach ($tahun_pnbp as $t)
                                <option value="{{ $t->tahun }}">{{ $t->tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-body">
                        <div id="chart-4"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                            <div class="mb-3 mb-sm-0">
                                <h5 class="card-title text-start fw-semibold">Tabel PNBP <ds id="yeart"></ds>
                                </h5>
                            </div>
                            <div>
                                <form action="" id="tahun-form">
                                    <select class="form-select" id="tahuns-select" name="tahuns-select">
                                        <option value="">ALL</option>
                                        @foreach ($tahun_pnbp as $t)
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
                                        <th>bulan</th>
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
@endsection
@section('style')
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto);

        body {
            font-family: Roboto, sans-serif;
        }

        .card {
            /* margin: 15px 0; */
            /* Atur tinggi kartu sesuai kebutuhan */
            max-width: 100%;
        }

        #chart-2,
        #chart-3,
        #chart-4,
        #chart-5 {
            max-width: 500px;
            height: 100%;
            /* Membuat grafik mengisi tinggi kartu */
        }
    </style>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new DataTable('#example');

        const bulanNama = {
            1: 'Januari',
            2: 'Februari',
            3: 'Maret',
            4: 'April',
            5: 'Mei',
            6: 'Juni',
            7: 'Juli',
            8: 'Agustus',
            9: 'September',
            10: 'Oktober',
            11: 'November',
            12: 'Desember'
        };

        // Function to update data display based on selected year
        function updateData(year) {
    fetch(`pnbpxanggaran?year=${year}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            var bulan = data.bulan.map(b => bulanNama[b]);
            var anggaran = data.anggaran.map(item => item.anggaran);
            var pnbp = data.pnbp.map(item => item.pnbp);

            // Cek apakah data ada
            if (anggaran.length === 0 && pnbp.length === 0) {
                console.log(`Tidak ada data untuk tahun ${year}`);
                alert(`Tidak ada data untuk tahun ${year}`);
                chart.updateSeries([]); // Kosongkan grafik jika tidak ada data
                return; // Keluar dari fungsi jika tidak ada data
            }

            // Perbarui grafik dengan data yang ada
            chart.updateSeries([{
                    name: 'Anggaran',
                    type: 'column',
                    data: anggaran
                },
                {
                    name: 'PNBP',
                    type: 'column',
                    data: pnbp
                }
            ]);

            chart.updateOptions({
                xaxis: {
                    categories: bulan
                },
                
            });
        })
}

// Tambahkan event listener ke dropdown
document.getElementById('year-filter').addEventListener('change', function() {
    var selectedYear = this.value;
    updateData(selectedYear);
});

// Inisialisasi grafik
var chart = new ApexCharts(document.querySelector("#chart-1"), {
    chart: {
        height: 350,
        type: "bar"
    },
    dataLabels: {
        enabled: false
    },

    colors: ['#536493', '#8D493A'], // Warna untuk PNBP dan Anggaran
    series: ['pnbp','anggaran'],
    stroke: {
        width: [4, 4]
    },
    plotOptions: {
        bar: {
            columnWidth: "20%"
        }
    },
    xaxis: {
        categories: ['pnbp','anggaran']
    },
    yaxis: [{
        seriesName: 'Anggaran',
        axisTicks: {
            show: true
        },
        axisBorder: {
            show: true,
        },
        title: {
            text: "PNBP & Anggaran"
        },
        labels: {
            formatter: function(value) {
                return value.toLocaleString("en-US");
            }
        }
    }],
    tooltip: {
        shared: false,
        intersect: true,
        x: {
            show: true
        }
    },
    legend: {
        horizontalAlign: "left",
        offsetX: 40
    }
});

chart.render();

// Muat data awal untuk tahun default
updateData(document.getElementById('year-filter').value);


        function updateData2(year) {
            fetch(`produkxcapaian?year=${year}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Untuk memeriksa data yang diterima dari server
                    // Validasi data
                    var totalProduk = data.totalProduk || 0;
                    var totalCapaian = data.totalCapaian || 0;
                    var selisihProduk = data.selisihProduk || 0;

                    var totalProdukFormatted = totalProduk.toLocaleString("en-US");
                    var totalCapaianFormatted = totalCapaian.toLocaleString("en-US");
                    console.log("total produk : ", totalCapaianFormatted);

                    if (totalProduk === 0 && totalCapaian === 0) {
                        console.error('Total produk dan capaian adalah 0, tidak dapat membuat chart.');
                        return;
                    }

                    var totalKeseluruhan = totalProduk + totalCapaian;
                    var produkPercentage = (totalProduk / totalKeseluruhan) * 100;
                    var capaianPercentage = (totalCapaian / totalKeseluruhan) * 100;

                    // console.log("Produk Percentage:", produkPercentage);
                    // console.log("Capaian Percentage:", capaianPercentage);
                    console.log("Produk Percentage:", produkPercentage.toFixed(2));
                    console.log("Capaian Percentage:", capaianPercentage.toFixed(2));


                    // Pie-chart dengan 2 series (produk dan capaian)
                    var options2 = {
                        chart: {
                            type: 'pie',
                            width: '300px',
                            height: '100%',
                            toolbar: {
                                show: true,
                                offsetX: 0,
                                offsetY: 0,
                                tools: {
                                    download: true,
                                    selection: true,
                                    zoom: true,
                                    zoomin: true,
                                    zoomout: true,
                                    pan: true,
                                    reset: true, // Bisa diganti dengan ikon custom jika diinginkan
                                    customIcons: []
                                },
                                export: {
                                    enabled: true,
                                    csv: {
                                        filename: 'chart-data',
                                        columnDelimiter: ',',
                                        headerCategory: 'Category',
                                        headerValue: 'Value',
                                        categoryFormatter: function(x) {
                                            return new Date(x)
                                                .toDateString(); // Format untuk kategori (misal: tanggal)
                                        },
                                        valueFormatter: function(y) {
                                            return y; // Format untuk nilai
                                        }
                                    },
                                    svg: {
                                        filename: 'chart-svg',
                                    },
                                    png: {
                                        filename: 'chart-png',
                                    }
                                }
                            }
                        },
                        series: [selisihProduk, totalProduk], // Data presentasi untuk pie chart
                        labels: ['Target ', 'Capaian'], // Label untuk setiap bagian
                        colors: ['#387ADF',
                            '#87A922'
                        ], // Warna untuk chart (contoh: hijau untuk capaian, merah untuk produk)
                        dataLabels: {
                            enabled: true,
                            formatter: function(val) {
                                return val.toFixed(2) + "%"; // Format persentase dengan 2 desimal
                            },
                            dropShadow: {
                                enabled: true
                            }
                        },
                        plotOptions: {
                            pie: {
                                customScale: 1.0,
                                donut: {
                                    size: '605%'
                                }
                            }
                        }
                    };

                    document.getElementById("chart-2").innerHTML = "";
                    chart2 = new ApexCharts(document.querySelector("#chart-2"), options2);
                    chart2.render();

                })


        }


        document.getElementById('year-filter2').addEventListener('change', function() {

            var selectedYear = this.value;
            updateData2(selectedYear);

        });


        updateData2(document.getElementById('year-filter2').value);




        //pie-chart2//

        // Add event listener to dropdown
        document.getElementById('year-filter3').addEventListener('change', function() {
            var selectedYear = this.value;
            updateData3(selectedYear);
        });

        function updateData3(year) {
            fetch(`paguxproduksi?year=${year}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Memeriksa data yang diterima dari server

                    var totalPagu = data.totalpagu || 0;
                    var totalProduksi = data.totalproduksi || 0;
                    var selisihBiaya = data.selisihBiaya || 0;

                    if (totalPagu === 0 && totalProduksi === 0) {
                        console.error('Total pagu dan produksi adalah 0, tidak dapat membuat chart.');
                        return;
                    }

                    // var totalKeseluruhan = totalPagu + totalProduksi;
                    // var paguPercentage = (totalPagu / totalKeseluruhan) * 100;
                    // var produksiPercentage = (totalProduksi / totalKeseluruhan) * 100;

                    // Pie-chart dengan 2 series (pagu dan produksi)
                    var options3 = {
                        chart: {
                            type: 'pie',
                            width: '300px',
                            height: '100%',
                            toolbar: {
                                show: true,
                                offsetX: 0,
                                offsetY: 0,
                                tools: {
                                    download: true,
                                    selection: true,
                                    zoom: true,
                                    zoomin: true,
                                    zoomout: true,
                                    pan: true,
                                    reset: true, // Bisa diganti dengan ikon custom jika diinginkan
                                    customIcons: []
                                },
                                export: {
                                    enabled: true,
                                    csv: {
                                        filename: 'chart-data',
                                        columnDelimiter: ',',
                                        headerCategory: 'Category',
                                        headerValue: 'Value',
                                        categoryFormatter: function(x) {
                                            return new Date(x)
                                                .toDateString(); // Format untuk kategori (misal: tanggal)
                                        },
                                        valueFormatter: function(y) {
                                            return y; // Format untuk nilai
                                        }
                                    },
                                    svg: {
                                        filename: 'chart-svg',
                                    },
                                    png: {
                                        filename: 'chart-png',
                                    }
                                }
                            }
                        },
                        series: [selisihBiaya, totalProduksi], // Data presentasi untuk pie chart
                        labels: ['Pagu', 'Biaya'], // Label untuk setiap bagian
                        colors: ['#86A7FC',
                            '#EB5B00'
                        ], // Warna untuk chart (contoh: hijau untuk capaian, merah untuk produk)
                        dataLabels: {
                            enabled: true,
                            formatter: function(val) {
                                return val.toFixed(2) + "%"; // Format persentase dengan 2 desimal
                            },
                            dropShadow: {
                                enabled: true
                            }
                        },
                        plotOptions: {
                            pie: {
                                customScale: 1.0,
                                donut: {
                                    size: '65%'
                                }
                            }
                        }
                    };

                    document.getElementById("chart-3").innerHTML = "";
                    chart3 = new ApexCharts(document.querySelector("#chart-3"), options3);
                    chart3.render();

                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }
        updateData3(document.getElementById('year-filter3').value);

        // pie-chart3

        // Add event listener to dropdown
        document.getElementById('year-filter4').addEventListener('change', function() {
            var selectedYear = this.value;
            updateData4(selectedYear);
        });

        function updateData4(year) {
            fetch(`anggaranxrealisasi?year=${year}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Untuk memeriksa data yang diterima dari server
                    // Validasi data
                    var totalanggaran = data.totalanggaran || 0;
                    var totalrealisasi = data.totalrealisasi || 0;
                    var selisihRealisasi = data.selisihRealisasi || 0;

                    if (totalanggaran === 0 && totalrealisasi === 0) {
                        console.error('Total produk dan capaian adalah 0, tidak dapat membuat chart.');
                        return;
                    }


                    // Pie-chart dengan 2 series (produk dan capaian)
                    var options3 = {
                        chart: {
                            type: 'pie',
                            width: '300px',
                            height: '100%',
                            toolbar: {
                                show: true,
                                offsetX: 0,
                                offsetY: 0,
                                tools: {
                                    download: true,
                                    selection: true,
                                    zoom: true,
                                    zoomin: true,
                                    zoomout: true,
                                    pan: true,
                                    reset: true, // Bisa diganti dengan ikon custom jika diinginkan
                                    customIcons: []
                                },
                                export: {
                                    enabled: true,
                                    csv: {
                                        filename: 'chart-data',
                                        columnDelimiter: ',',
                                        headerCategory: 'Category',
                                        headerValue: 'Value',
                                        categoryFormatter: function(x) {
                                            return new Date(x)
                                                .toDateString(); // Format untuk kategori (misal: tanggal)
                                        },
                                        valueFormatter: function(y) {
                                            return y; // Format untuk nilai
                                        }
                                    },
                                    svg: {
                                        filename: 'chart-svg',
                                    },
                                    png: {
                                        filename: 'chart-png',
                                    }
                                }
                            }
                        },
                        series: [selisihRealisasi, totalrealisasi], // Data presentasi untuk pie chart
                        labels: ['anggaran ', 'realisasi'], // Label untuk setiap bagian
                        colors: ['#5A639C',
                            '#912BBC'
                        ], // Warna untuk chart (contoh: hijau untuk capaian, merah untuk produk)
                        dataLabels: {
                            enabled: true,
                            formatter: function(val) {
                                return val.toFixed(2) + "%"; // Format persentase dengan 2 desimal
                            },
                            dropShadow: {
                                enabled: true
                            }
                        },
                        plotOptions: {
                            pie: {
                                customScale: 1.0,
                                donut: {
                                    size: '605%'
                                }
                            }
                        }
                    };

                    document.getElementById("chart-4").innerHTML = "";
                    chart4 = new ApexCharts(document.querySelector("#chart-4"), options3);
                    chart4.render();
                })
        }
        updateData4(document.getElementById('year-filter4').value);
    </script>
    <script>
        function tablepnbp(yeart) {
            $.ajax({
                url: "tablepnbp?th=" + yeart,
                type: 'GET',
                cache: "false",
            }).done(function(json) {
                $("#tpnbp tbody").html(""); // Bersihkan tabel sebelum menambah data

                var columns = "<tr>";
                if (json.is_all_years) {
                    columns += "<th>Tahun</th>"; // Tambahkan kolom Tahun jika untuk semua tahun
                }
                columns +=
                    "<th>Bulan</th>" +
                    "<th>PNBP</th>" +
                    "<th>Realisasi</th>" +
                    "<th>Anggaran</th>" +
                    "</tr>";
                $("#tpnbp thead").html(columns); // Set header tabel

                $.each(json.datas, function(i, data) {
                    var tr_str = "<tr>";
                    if (json.is_all_years) {
                        tr_str += "<td align='center'>" + data.tahun +
                            "</td>"; // Tambahkan kolom Tahun jika untuk semua tahun
                    }
                    tr_str +=
                        "<td align='center'> " + data.bulan + "</td>" +
                        "<td align='center'> Rp. " + parseFloat(data.pnbp).toLocaleString('id-ID') +
                        "</td>" +
                        "<td align='center'> Rp. " + parseFloat(data.realisasi).toLocaleString('id-ID') +
                        "</td>" +
                        "<td align='center'> Rp. " + parseFloat(data.anggaran).toLocaleString('id-ID') +
                        "</td>" +
                        "</tr>";
                    $("#tpnbp tbody").append(tr_str);
                });
            }).fail(function(jqXHR, textStatus) {
                alert('Request Failed');
            });
        }

        $('#tahuns-select').on('change', function() {
            var yeart = $(this).val(); // Ambil tahun yang dipilih dari dropdown
            $("#tpnbp tbody").html(""); // Kosongkan tabel sebelum diisi dengan data baru
            $('#yeart').text(yeart); // Ubah teks di elemen dengan ID "yeart" menjadi tahun yang dipilih

            // Panggil fungsi untuk memperbarui data tabel berdasarkan tahun yang dipilih
            tablepnbp(yeart);
        });
        $(document).ready(function() {
            tablepnbp('all');
        });
    </script>
@endsection
