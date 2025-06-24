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
        <h1>Laporan Aset</h1>

        <div class="col-lg-12 p-1 mt-4">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h5 class="text-start fw-semibold">Tabel Aset <span id="yeart"></span></h5>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped" id="tpnbp">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Aset</th>
                                    <th>Luas</th>
                                    <th>Pemanfaatan</th>
                                    <th>Sisa Lahan</th>
                                    <th>Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $i)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $i->nama_aset }}</td>
                                        <td>{{ number_format($i->luas_aset) }} m2</td>
                                        <td>{{ number_format($i->penggunaan) }} m2</td>
                                        <td>{{ number_format($i->luas_aset - $i->penggunaan) }} m2</td>
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
