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
        }

        .container {
            max-width: 2000px;
            margin: 0 auto;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
        }

        .card-body {
            padding: 10px;
        }

        .text-center {
            text-align: center;
        }

        .text-start {
            text-align: left;
        }

        .fw-semibold {
            font-weight: 400;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 5px;
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

    </style>
</head>

<body>
    <div class="container">
        <h1>Laporan Produksi </h1>

        <div class="col-lg-12 p-1 mt-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-4">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="text-start fw-semibold">Tabel Produksi<span id="yeart"></span></h5>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped" id="tpnbp">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Target Produksi</th>
                                    <th>Capaian Produksi</th>
                                    {{-- <th>Presentase Capaian (%)</th> --}}
                                    <th>Pagu</th>
                                    <th>Biaya Produksi</th>
                                    {{-- <th>Presentase Realisasi (%)</th> --}}
                                    <th>Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $i)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $i->produk }}</td>
                                        <td>Rp. {{ number_format($i->target_produksi) }}</td>
                                        <td>Rp. {{ number_format($i->capaian_produksi) }}</td>
                                        {{-- <td>
                                            @if ($i->target_produksi > 0)
                                                @php
                                                    $hasil = ($i->capaian_produksi / $i->target_produksi) * 100;
                                                @endphp
                                                @if ($hasil == floor($hasil))
                                                    {{ number_format($hasil, 0) }}%
                                                @else
                                                    {{ number_format($hasil, 2) }}%
                                                @endif
                                            @else
                                                0%
                                            @endif
                                        </td> --}}
                                        <td>Rp. {{ number_format($i->pagu) }}</td>
                                        <td>Rp. {{ number_format($i->biaya_produksi) }}</td>
                                        {{-- <td>
                                            @if ($i->target_produksi > 0)
                                                @php
                                                    $hasil = ($i->biaya_produksi / $i->pagu) * 100;
                                                @endphp
                                                @if ($hasil == floor($hasil))
                                                    {{ number_format($hasil, 0) }}%
                                                @else
                                                    {{ number_format($hasil, 2) }}%
                                                @endif
                                            @else
                                                0%
                                            @endif
                                        </td> --}}
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
