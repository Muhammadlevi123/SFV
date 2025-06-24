<!DOCTYPE html>
<html>

<head>
    <title>Laporan Produksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
        }

        .text-center {
            text-align: center;
        }

        .text-start {
            text-align: left;
        }

        .fw-semibold {
            font-weight: 600;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center; /* Rata tengah untuk semua cell */
        }

        .table th {
            background-color: #f2f2f2;
        }

        .table-striped tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .table-striped tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        /* Gaya untuk responsivitas tabel */
        .table-responsive {
            overflow-x: auto; /* Agar tabel bisa digulir secara horizontal */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Laporan PNBP</h1>

        <div class="col-lg-12 p-1 mt-4">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h5 class="text-start fw-semibold">Tabel PNBP <span id="yeart"></span></h5>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped" id="tpnbp">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Anggaran</th>
                                    <th>Realisasi</th>
                                    <th>Presentase Realisasi(%)</th>
                                    <th>PNBP</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $i)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>Rp. {{ number_format($i->anggaran) }}</td>
                                        <td>Rp. {{ number_format($i->realisasi) }}</td>
                                        <td>
                                            @if ($i->anggaran > 0)
                                                @php
                                                    $hasil = ($i->realisasi / $i->anggaran) * 100;
                                                @endphp
                                                @if ($hasil == floor($hasil))
                                                    {{ number_format($hasil, 0) }}%
                                                @else
                                                    {{ number_format($hasil, 2) }}%
                                                @endif
                                            @else
                                                0%
                                            @endif
                                        </td>
                                        <td>Rp. {{ number_format($i->pnbp) }}</td>
                                        <td>{{ $i->bulan }}</td>
                                        <td>{{ $i->tahun }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
