@extends('superadmin.layout.unit_main')
@section('title')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                </div>
            </div>

            {{-- pesan  --}}
            @if ($errors->any())
                <div id="error-alert" class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{-- end-pesan --}}

            <div class="col-lg-12 align-items-strech">
                <div class="row">

                    <div class="col-lg-12 p-1">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-sm-flex d-block align-items-center justify-content-between">
                                    <div class=" m-0">
                                        <h5 class="card-title text-start fw-semibold">Tabel Produksi SFV <ds id="yeart">

                                            </ds>
                                        </h5>
                                    </div>
                                    <div>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-info btn-md" data-bs-toggle="modal"
                                            data-bs-target="#modal_add">
                                            <i class="ti ti-plus"> Tambah</i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal_add" tabindex="-1" role="dialog"
                                            aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-xl " role="document">
                                                <div class="modal-content">
                                                    <div class="text-header text-center">
                                                        <h4>Tambah Data Produksi</h4>
                                                    </div>
                                                    <div class="form-container">
                                                        <form action="{{ route('superadmin.produksi.store') }}"
                                                            method="POST">
                                                            @csrf
                                                            <div class="form-content">
                                                                <div class="label-flex mb-3">
                                                                    <label for="id_unit" class="form-label">Nama
                                                                        Unit</label>
                                                                    <select class="form-control" id="id_unit"
                                                                        name="id_unit" required
                                                                        onchange="toggleNewUnitInput(this)">
                                                                        <option value="" disabled selected>Pilih Unit
                                                                        </option>
                                                                        @foreach ($profiles as $profile)
                                                                            <option value="{{ $profile->id }}">
                                                                                {{ $profile->nama_unit }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="label-flex mb-3">
                                                                    <label for="produk_produksi"
                                                                        class="form-label">Produk</label>
                                                                    <input type="text" class="form-control"
                                                                        id="produk_produksi" name="produk_produksi"
                                                                        value="">
                                                                </div>
                                                                <div class="label-flex mb-3">
                                                                    <label for="target_produksi" class="form-label">Target
                                                                        produksi</label>
                                                                    <input type="number" class="form-control"
                                                                        id="target_produksi" name="target_produksi"
                                                                        value="">
                                                                </div>
                                                                <div class="label-flex mb-3">
                                                                    <label for="capaian_produksi" class="form-label">Capaian
                                                                        Produksi</label>
                                                                    <input type="number" class="form-control"
                                                                        id="capaian_produksi" name="capaian_produksi"
                                                                        value="">
                                                                </div>
                                                                <div class="label-flex mb-3">
                                                                    <label for="biaya_produksi" class="form-label">Biaya
                                                                        Produksi</label>
                                                                    <input type="number" class="form-control"
                                                                        id="biaya_produksi_unit" name="biaya_produksi"
                                                                        value="">
                                                                </div>
                                                                <div class="label-flex mb-3">
                                                                    <label for="pagu_produksi"
                                                                        class="form-label">Pagu</label>
                                                                    <input type="number" class="form-control"
                                                                        id="pagu_produksi" name="pagu_produksi"
                                                                        value="">
                                                                </div>
                                                                <div class="label-flex mb-3">
                                                                    <label for="tahun_tambah"
                                                                        class="form-label">Tahun</label>
                                                                    <select class="form-control" id="tahun_tambah"
                                                                        name="tahun_tambah">
                                                                        <option value="">Pilih Tahun</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    Keluar
                                                                </button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Tambah</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- end modal --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Unit</th>
                                            <th>Produk</th>
                                            <th>Target Produksi</th>
                                            <th>Capaian Produksi</th>
                                            {{-- <th>Presentase Capaian (%)</th> --}}
                                            <th>Pagu</th>
                                            <th>Biaya Produksi</th>
                                            {{-- <th>presentase realisasi(%)</th> --}}
                                            <th>Tahun</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $i)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td data-search="{{ $i->nama_unit }}">{{ $i->nama_unit }}</td>
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
                                                <td data-search="{{ $i->tahun }}">{{ $i->tahun }}</td>
                                                <td class="">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-danger btn-sm me-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalId{{ $i->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modalId{{ $i->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content p-3">
                                                                <form
                                                                    action="{{ route('superadmin.produksi.delete', $i->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="modal-header">
                                                                        <h2 class="modal-title"
                                                                            id="exampleModalLongTitle">Hapus Data</h2>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h6>Apakah kamu yakin ingin menghapus data ini?</h6>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Keluar</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Hapus</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary btn-sm text-dark"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalId-edit{{ $i->id }}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modalId-edit{{ $i->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-xl " role="document">
                                                            <div class="modal-content">
                                                                <div class="text-header text-center">
                                                                    <h4>Edit Data Produksi</h4>
                                                                </div>
                                                                <div class="form-container">
                                                                    <form
                                                                        action="{{ route('superadmin.produksi.update', $i->id) }}}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-content">
                                                                            <div class="label-flex mb-3">
                                                                                <label for="produk_produksi"
                                                                                    class="form-label">Nama Unit</label>
                                                                                <select class="form-control"
                                                                                    id="id_unit" name="id_unit"
                                                                                    required>
                                                                                    @foreach ($profiles as $index => $profile)
                                                                                        <option
                                                                                            value="{{ $profile->id }}"
                                                                                            {{ $index === 0 ? 'selected' : '' }}>
                                                                                            {{ $profile->nama_unit }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="label-flex mb-3">
                                                                                <label for="produk_produksi"
                                                                                    class="form-label">Produk</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="produk_produksi"
                                                                                    name="produk_produksi"
                                                                                    value="{{ $i->produk }}">
                                                                            </div>
                                                                            <div class="label-flex mb-3">
                                                                                <label for="target_produksi"
                                                                                    class="form-label">Target
                                                                                    produksi</label>
                                                                                <input type="number" class="form-control"
                                                                                    id="target_produksi"
                                                                                    name="target_produksi"
                                                                                    value="{{ $i->target_produksi }}">
                                                                            </div>
                                                                            <div class="label-flex mb-3">
                                                                                <label for="capaian_produksi"
                                                                                    class="form-label">Capaian
                                                                                    Produksi</label>
                                                                                <input type="number" class="form-control"
                                                                                    id="capaian_produksi"
                                                                                    name="capaian_produksi"
                                                                                    value="{{ $i->capaian_produksi }}">
                                                                            </div>
                                                                            <div class="label-flex mb-3">
                                                                                <label for="biaya_produksi"
                                                                                    class="form-label">Biaya
                                                                                    Produksi</label>
                                                                                <input type="number" class="form-control"
                                                                                    id="biaya_produksi_unit"
                                                                                    name="biaya_produksi"
                                                                                    value="{{ $i->biaya_produksi }}">
                                                                            </div>
                                                                            <div class="label-flex mb-3">
                                                                                <label for="pagu_produksi"
                                                                                    class="form-label">Pagu</label>
                                                                                <input type="number" class="form-control"
                                                                                    id="pagu_produksi"
                                                                                    name="pagu_produksi"
                                                                                    value="{{ $i->pagu }}">
                                                                            </div>
                                                                            <div class="label-flex mb-3">
                                                                                <label for="tahun_edit"
                                                                                    class="form-label">Tahun</label>
                                                                                <select class="form-control"
                                                                                    id="tahun_edit" name="tahun_edit">
                                                                                    <option value="2024"
                                                                                        {{ $i->tahun == 2024 ? 'selected' : '' }}>
                                                                                        2024</option>
                                                                                    <option value="2023"
                                                                                        {{ $i->tahun == 2023 ? 'selected' : '' }}>
                                                                                        2023</option>
                                                                                    <option value="2022"
                                                                                        {{ $i->tahun == 2022 ? 'selected' : '' }}>
                                                                                        2022</option>
                                                                                    <option value="2021"
                                                                                        {{ $i->tahun == 2021 ? 'selected' : '' }}>
                                                                                        2021</option>
                                                                                    <option value="2020"
                                                                                        {{ $i->tahun == 2020 ? 'selected' : '' }}>
                                                                                        2020</option>
                                                                                    <option value="2019"
                                                                                        {{ $i->tahun == 2019 ? 'selected' : '' }}>
                                                                                        2019</option>
                                                                                    <option value="2018"
                                                                                        {{ $i->tahun == 2018 ? 'selected' : '' }}>
                                                                                        2018</option>
                                                                                    <option value="2017"
                                                                                        {{ $i->tahun == 2017 ? 'selected' : '' }}>
                                                                                        2017</option>
                                                                                    <option value="2016"
                                                                                        {{ $i->tahun == 2016 ? 'selected' : '' }}>
                                                                                        2016</option>
                                                                                    <option value="2015"
                                                                                        {{ $i->tahun == 2015 ? 'selected' : '' }}>
                                                                                        2015</option>
                                                                                    <option value="2014"
                                                                                        {{ $i->tahun == 2014 ? 'selected' : '' }}>
                                                                                        2014</option>
                                                                                    <option value="2013"
                                                                                        {{ $i->tahun == 2013 ? 'selected' : '' }}>
                                                                                        2013</option>
                                                                                    <option value="2012"
                                                                                        {{ $i->tahun == 2012 ? 'selected' : '' }}>
                                                                                        2012</option>
                                                                                    <option value="2011"
                                                                                        {{ $i->tahun == 2011 ? 'selected' : '' }}>
                                                                                        2011</option>
                                                                                    <option value="2010"
                                                                                        {{ $i->tahun == 2010 ? 'selected' : '' }}>
                                                                                        2010</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Keluar
                                                                    </button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Ubah</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
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


    </div>
@endsection
@section('style')
    <style>

    </style>
@endsection
@section('script')
    <script>
        
        new DataTable('#example');
        document.addEventListener('DOMContentLoaded', function() {
            // Menghilangkan alert setelah 5 detik (5000 ms)
            setTimeout(function() {
                var successAlert = document.getElementById('success-alert');
                if (successAlert) {
                    // Menghilangkan alert dengan animasi fade out
                    successAlert.classList.remove('show');
                    successAlert.classList.add('fade');
                    // Menghapus elemen alert setelah animasi selesai
                    setTimeout(function() {
                        successAlert.parentNode.removeChild(successAlert);
                    }, 500); // Durasi fade out sesuai dengan durasi CSS (0.5s)
                }
            }, 5000); // Durasi tampil alert dalam milidetik
        });

        $(document).ready(function() {
            $('#example').DataTable({
                processing: true,
                serverSide: false,
                search: {
                    regex: true,
                    smart: true
                },
                columnDefs: [
                    { targets: [8], searchable: false } // Kolom Aksi tidak dicari
                ]
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Menghilangkan alert setelah 5 detik (5000 ms)
            setTimeout(function() {
                var successAlert = document.getElementById('error-alert');
                if (successAlert) {
                    // Menghilangkan alert dengan animasi fade out
                    successAlert.classList.remove('show');
                    successAlert.classList.add('fade');
                    // Menghapus elemen alert setelah animasi selesai
                    setTimeout(function() {
                        successAlert.parentNode.removeChild(successAlert);
                    }, 500); // Durasi fade out sesuai dengan durasi CSS (0.5s)
                }
            }, 10000); // Durasi tampil alert dalam milidetik
        });
        const currentYear = new Date().getFullYear();
        const startYear = 2010;
        // const selectedYear = {{ $i->tahun }};

        // Fungsi untuk mengisi dropdown tahun
        function populateYearDropdown(selectId, selectedYear = null) {
            const yearSelect = document.getElementById(selectId);

            // Jika sudah ada opsi yang selected, tambahkan opsi lain tanpa menduplikasi
            for (let year = currentYear; year >= startYear; year--) {
                if (year != selectedYear) {
                    let option = document.createElement('option');
                    option.value = year;
                    option.text = year;
                    yearSelect.add(option);
                }
            }
        }

        // Panggil fungsi untuk mengisi dropdown 'tahun_tambah' tanpa opsi terpilih
        populateYearDropdown('tahun_tambah');
    </script>
@endsection
