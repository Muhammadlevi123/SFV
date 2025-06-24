@extends('superadmin.layout.unit_main')

@section('title')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Row 1 -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <!-- Tambahan konten bisa dimasukkan di sini jika diperlukan -->
                </div>
            </div>

            <div class="col-lg-12 align-items-stretch">
                <div class="row">
                    <div class="col-lg-12 p-1">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-sm-flex d-block align-items-center justify-content-between">
                                    <div class="m-0">
                                        <h5 class="card-title text-start fw-semibold">Informasi User
                                            <span id="yeart"></span>
                                        </h5>
                                    </div>
                                    <div>
                                        <!-- Tambahan tombol atau konten lainnya bisa dimasukkan di sini -->
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-sm" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Unit</th>
                                                <th>Alamat</th>
                                                <th>Email</th>
                                                <th>Pj</th>
                                                <th>Kerja Sama</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $i)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $i->nama_unit }}</td>
                                                    <td>{{ $i->alamat }}</td>
                                                    <td>{{ $i->email }}</td>
                                                    <td>{{ $i->pj }}</td>
                                                    <td>{{ $i->kerjasama }}</td>
                                                </tr>
                                            @endforeach
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
    <style>
        /* Mengurangi ukuran font dan padding tabel */
        #example {
            font-size: 12px; /* Ukuran font lebih kecil */
        }

        #example th, #example td {
            padding: 12px; /* Padding lebih kecil */
        }
    </style>
@endsection

@section('script')
    <!-- Tambahkan JavaScript khusus di sini jika diperlukan -->
@endsection
