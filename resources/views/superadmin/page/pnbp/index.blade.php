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
                                        <h5 class="card-title text-start fw-semibold">Tabel PNBP SFV <ds id="yeart">
                                            </ds>
                                        </h5>
                                    </div>
                                    <div>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-info btn-md" data-bs-toggle="modal"
                                            data-bs-target="#modalId">
                                            <i class="ti ti-plus"> Tambah</i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modalId" tabindex="-1" role="dialog"
                                            aria-labelledby="modalTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-xl " role="document">
                                                <div class="modal-content">
                                                    <div class="text-header text-center">
                                                        <h4>Tambah Data PNBP</h4>
                                                    </div>
                                                    <div class="form-container">
                                                        <form action="{{ route('superadmin.pnbp.store') }}" method="POST">
                                                            @csrf
                                                            <div class="form-content">
                                                                <div class="label-flex mb-3">
                                                                    <label for="id_unit" class="form-label">Nama
                                                                        Unit</label>
                                                                        <select class="form-control" id="id_unit" name="id_unit" required onchange="toggleNewUnitInput(this)">
                                                                            <option value="" disabled selected>Pilih Unit</option>
                                                                            @foreach ($profiles as $profile)
                                                                                <option value="{{ $profile->id }}">{{ $profile->nama_unit }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                </div>
                                                                <div class="label-flex mb-3">
                                                                    <label for="anggaran_pnbp" class="form-label">Anggaran</label>
                                                                    <input type="number" class="form-control" id="anggaran_pnbp" name="anggaran_pnbp" value="" >
                                                                </div>
                                                                <div class="label-flex mb-3">
                                                                    <label for="realisasi_pnbp" class="form-label">Realisasi</label>
                                                                    <input type="number" class="form-control" id="realisasi_pnbp" name="realisasi_pnbp" value="" >
                                                                </div>  
                                                                <div class="label-flex mb-3">
                                                                    <label for="pnbp" class="form-label">PNBP</label>
                                                                    <input type="number" class="form-control" id="pnbp" name="pnbp" value="" >
                                                                </div>     
                                                                <div class="label-flex mb-3">
                                                                    <label for="bulan_pnbp" class="form-label">Bulan</label>
                                                                    <input type="number" class="form-control" id="bulan_pnbp" name="bulan_pnbp" value="">
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
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                                    Keluar
                                                                </button>
                                                                <button type="submit" class="btn btn-primary">Tambah</button>
                                                            </div>
                                                        </form>
                                                    </div>   
                                                </div>
                                            </div>
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
                                                <th>Anggaran</th>
                                                <th>Realisasi</th>
                                                <th>Presentase Realisasi(%)</th>
                                                <th>PNBP</th>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $i)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{ $i->nama_unit }}</td>
                                                <td>Rp. {{ number_format($i->anggaran) }}</td>
                                                <td>Rp.{{ number_format($i->realisasi) }}</td>
                                                <td>@if ($i->anggaran > 0)
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
                                                @endif</td>
                                                <td>Rp.{{ number_format($i->pnbp) }}</td>
                                                <td>{{ $i->bulan }}</td>
                                                <td>{{ $i->tahun }}</td>
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
                                                                <form action="{{ route('opt.pnbp.delete', $i->id) }}"
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
                                                                            data-bs-dismiss="modal">Close</button>
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
                                                                    <h4>Edit Data PBNP</h4>
                                                                </div>
                                                                <div class="form-container">
                                                                    <form
                                                                        action="{{ route('superadmin.pnbp.update', $i->id) }}}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="form-content">
                                                                            <div class="label-flex mb-3">
                                                                                <label for="produk_produksi"
                                                                                    class="form-label">Nama Unit</label>
                                                                                    <select class="form-control" id="id_unit" name="id_unit" required>
                                                                                        @foreach ($profiles as $index => $profile)
                                                                                            <option value="{{ $profile->id }}" {{ $index === 0 ? 'selected' : '' }}>
                                                                                                {{ $profile->nama_unit }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                            </div>
                                                                            <div class="label-flex mb-3">
                                                                                <label for="anggaran_pnbp"
                                                                                    class="form-label">Anggaran</label>
                                                                                <input type="number" class="form-control"
                                                                                    id="anggaran_pnbp"
                                                                                    name="anggaran_pnbp"
                                                                                    value="{{ $i->anggaran }}">
                                                                            </div>
                                                                            <div class="label-flex mb-3">
                                                                                <label for="realisasi_pnbp"
                                                                                    class="form-label">
                                                                                    Realisasi</label>
                                                                                <input type="number" class="form-control"
                                                                                    id="realisasi_pnbp"
                                                                                    name="realisasi_pnbp"
                                                                                    value="{{ $i->realisasi }}">
                                                                            </div>
                                                                            <div class="label-flex mb-3">
                                                                                <label for="pnbp"
                                                                                    class="form-label">PNBP</label>
                                                                                <input type="number" class="form-control"
                                                                                    id="pnbp"
                                                                                    name="pnbp"
                                                                                    value="{{ $i->pnbp }}">
                                                                            </div>
                                                                            <div class="label-flex mb-3">
                                                                                <label for="bulan_pnbp"
                                                                                    class="form-label">Bulan</label>
                                                                                <input type="number" class="form-control"
                                                                                    id="bulan_pnbp"
                                                                                    name="bulan_pnbp"
                                                                                    value="{{ $i->bulan }}">
                                                                            </div>
                                                                            <div class="label-flex mb-3">
                                                                                <label for="tahun_edit" class="form-label">Tahun</label>
                                                                                <select class="form-control" id="tahun_edit" name="tahun_edit">
                                                                                    <option value="2024" {{ $i->tahun == 2024 ? 'selected' : '' }}>2024</option>
                                                                                    <option value="2023" {{ $i->tahun == 2023 ? 'selected' : '' }}>2023</option>
                                                                                    <option value="2022" {{ $i->tahun == 2022 ? 'selected' : '' }}>2022</option>
                                                                                    <option value="2021" {{ $i->tahun == 2021 ? 'selected' : '' }}>2021</option>
                                                                                    <option value="2020" {{ $i->tahun == 2020 ? 'selected' : '' }}>2020</option>
                                                                                    <option value="2019" {{ $i->tahun == 2019 ? 'selected' : '' }}>2019</option>
                                                                                    <option value="2018" {{ $i->tahun == 2018 ? 'selected' : '' }}>2018</option>
                                                                                    <option value="2017" {{ $i->tahun == 2017 ? 'selected' : '' }}>2017</option>
                                                                                    <option value="2016" {{ $i->tahun == 2016 ? 'selected' : '' }}>2016</option>
                                                                                    <option value="2015" {{ $i->tahun == 2015 ? 'selected' : '' }}>2015</option>
                                                                                    <option value="2014" {{ $i->tahun == 2014 ? 'selected' : '' }}>2014</option>
                                                                                    <option value="2013" {{ $i->tahun == 2013 ? 'selected' : '' }}>2013</option>
                                                                                    <option value="2012" {{ $i->tahun == 2012 ? 'selected' : '' }}>2012</option>
                                                                                    <option value="2011" {{ $i->tahun == 2011 ? 'selected' : '' }}>2011</option>
                                                                                    <option value="2010" {{ $i->tahun == 2010 ? 'selected' : '' }}>2010</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Close
                                                                    </button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Save</button>
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
@endsection
@section('style')
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
        // Mendapatkan tahun saat ini
    const currentYear = new Date().getFullYear();
    const startYear = 2010; // Tahun awal (2010)
    const selectedYear = {{$i->tahun}}; // Tahun yang akan di-select untuk tahun_edit

    // Fungsi untuk mengisi dropdown tahun
    function populateYearDropdown(selectId, selectDefault = null) {
        const yearSelect = document.getElementById(selectId);

        for (let year = currentYear; year >= startYear; year--) {
            let option = document.createElement('option');
            option.value = year;
            option.text = year;

            // Jika ada nilai default yang diberikan, tandai sebagai 'selected'
            if (selectDefault && year == selectDefault) {
                option.selected = true;
            }

            yearSelect.add(option);
        }
    }

    // Mengisi dropdown untuk tahun_tambah tanpa select default
    populateYearDropdown('tahun_tambah');
    </script>
@endsection
