@extends('admin.layout.unit_main')
@section('title')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
@section('content')
    @foreach ($profiles as $data)
        <div class="container-fluid">
            <div class="">@if (session('success'))
                <div id="success-alert" class="pesan-sukses alert alert-success alert-dismissible fade show "style="z-index: 1050; top: 20px; right: 10%; width: 20%;" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif</div>
            
            {{-- <div class="container-cover col-lg-12 col-sm-12 bg-secondary d-flex justify-content-start mb-1">
                <h1>PROFILE</h1>
            {{-- </div> --}}
            
            <div class="d-flex row gap-4">
                
                <div class=" profile-card card col-lg-4 col-sm-12 ">
                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                        <div class="profile-image "><img src="{{ asset('assets/img/icon/gambar_profile2.png') }}"
                                alt="Foto" class=""></div>
                        <div class="mt-5 center">
                            <h5>{{ $data['profile']->email }}</h5>
                        </div>
                    </div>
                </div>

                <div class="content-card card col-lg-7 p-4 ">
                    <div class="row">
                        <div class="col-lg-6 d-flex flex-column pb-5">
                            <div class="text-item ">
                                <label for=""><b>Username</b></label>
                                <div><input type="text" class="readonly" value="{{ $data['user']->username }}" readonly>
                                </div>
                            </div>
                            <div class="text-item">
                                <label for=""><b>Kerja Sama</b></label>
                                <div><input type="text" class="readonly" value="{{ $data['profile']->kerjasama }}" readonly>
                                </div>
                            </div>
                            <div class="text-item">
                                <label for=""><b>Penanggung Jawab</b></label>
                                <div><input type="text" class="readonly" value="{{ $data['profile']->pj }}" readonly></div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex flex-column pb-5">
                            <div class="text-item">
                                <label for=""><b>Nama Unit</b></label>
                                <div><input type="text" class="readonly" value="{{ $data['profile']->nama_unit }}" readonly>
                                </div>
                            </div>
                            <div class="text-item">
                                <label for=""><b>Status SFV</b></label>
                                <div><input type="text" class="readonly" value="{{ $data['profile']->status_sfv }}" readonly>
                                </div>
                            </div>
                            <div class="text-item">
                                <label for=""><b>Role</b></label>
                                <div><input type="text" class="readonly" value="{{ $data['user']->role }}" readonly></div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-card d-flex justify-content-start">
                        {{-- button-start-edit --}}
                        <button class="submit btn btn-info btn-md" data-bs-toggle="modal"
                            data-bs-target="#modal_edit_profile">Update</button>
                            
                        {{-- button-start-edit --}}

                        {{-- modal-edit --}}

                        <!-- Modal -->
                        <div class="modal fade" id="modal_edit_profile" tabindex="-1" role="dialog"
                            aria-labelledby="modalTitleId" aria-hidden="true">
                            <div class="modal-dialog modal-xl " role="document">
                                <div class="modal-content">
                                    <div class="text-header text-center">
                                        <h4>Update Profile</h4>
                                    </div>
                                    <div class="form-container">
                                        <form action="{{ route('user.update', $data['user']->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-content">
                                                <div class="label-flex mb-3">
                                                    <label for="username_profile" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="username_profile"
                                                        name="username_profile" value="{{ $data['user']->username }}">
                                                    @error('username_profile')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="label-flex mb-3">
                                                    <label for="nama_profile" class="form-label">
                                                        Nama Unit</label>
                                                    <input type="text" class="form-control" id="nama_profile"
                                                        name="nama_profile" value="{{ $data['profile']->nama_unit }}">
                                                    @error('nama_profile')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="label-flex mb-3">
                                                    <label for="kerjasama_profile" class="form-label">
                                                        Kerja Sama</label>
                                                    <input type="text" class="form-control" id="kerjasama_profile"
                                                        name="kerjasama_profile" value="{{ $data['profile']->kerjasama }}">
                                                    @error('kerjasama_profile')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="label-flex mb-3">
                                                    <label for="SFV_profile" class="form-label">
                                                        Status SFV</label>
                                                    <input type="text" class="form-control" id="SFV_profile"
                                                        name="SFV_profile" value="{{ $data['profile']->status_sfv }}">
                                                    @error('SFV_profile')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="label-flex mb-3">
                                                    <label for="penanggungjawab_profile" class="form-label">Penanggung
                                                        Jawab</label>
                                                    <input type="text" class="form-control"
                                                        id="penanggungjawab_profile" name="penanggungjawab_profile"
                                                        value="{{ $data['profile']->pj }}">
                                                    @error('penanggungjawab_profile')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="label-flex mb-3">
                                                    <label for="email_profile" class="form-label">Email</label>
                                                    <input type="text" class="form-control" id="email_profile"
                                                        name="email_profile" value="{{ $data['profile']->email }}">
                                                    @error('email_profile')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Keluar
                                                </button>
                                                <button type="submit" class="btn btn-primary">Ubah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- end-modal-edit --}}
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('style')
    <style>
        .container-cover {
            padding: 100px;
            width: 100%;
        }

        .profile-card {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1),
                /* Bayangan bawah */
                0 -2px 4px rgba(0, 0, 0, 0.1),
                /* Bayangan atas */
                2px 0 4px rgba(0, 0, 0, 0.1),
                /* Bayangan kanan */
                -2px 0 4px rgba(0, 0, 0, 0.1);
            /* Bayangan kiri */
            ;
            /* position: relative;
            bottom: 50px; */
            height: 330px;
            /* margin-right: 50px;
            margin-left: 50px;  */
            background: white;
        }

        .profile-image {
            /* margin-left: 40px;
            margin-top: 20px; */
            border-radius: 50%;
            width: 10em;
            height: 10em;
            /* background-color: rgb(194, 194, 194); */
        }

        .profile-image img {
            max-width: 100%;
            height: 100%;
        }

        .text-item {
            margin-top: 20px;
            margin-left: 40px;
            line-height: 30px;
        }

        .text-item input[type="text"],
        input[type="number"] {
            width: 220px;
            text-decoration: none;
            border-radius: 1px;
            padding-left: 10px;
            box-shadow: 0 2px 4px rgba(255, 255, 255, 0.1),
                /* Bayangan bawah */
                2px 0 4px rgba(255, 255, 255, 0.1);
            /* Bayangan kanan */
        }

        .content-card {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1),
                /* Bayangan bawah */
                0 -2px 4px rgba(0, 0, 0, 0.1),
                /* Bayangan atas */
                2px 0 4px rgba(0, 0, 0, 0.1),
                /* Bayangan kanan */
                -2px 0 4px rgba(0, 0, 0, 0.1);
            /* Bayangan kiri */
            ;
            background: white;
            /* position: relative;
            bottom: 50px; */
            /* height: 600px; */
            /* width: 650px; */
            border-radius: 5px;
        }

        .footer-card {
            border-top: 1px solid;
            padding-bottom: 20px;
        }

        .footer-card button {
            width: 100px;
            height: 40px;
            margin-left: 50px;
            margin-top: 40px;
        }

        label {
            font-size: 15px;
        }

        .submit {
            border: none;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 8px;
            box-shadow: 0 8px 10px rgba(0, 0, 0, 0.1);
        }

        .readonly {
            background: rgb(237, 235, 235);
        }
        .pesan-sukses {
            position: absolute;
            /* left: 900px; */
            width: 300px;
            z-index: 
        }
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
        @if ($errors->any())
            $('#modal_edit_profile').modal('show');
        @endif
    });
    </script>
@endsection
