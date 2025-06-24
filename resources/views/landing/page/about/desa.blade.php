@extends('landing.layout.main')
@section('content')
    <main id="main" style="min-height: 700px">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>SFV DESA</h2>
                    <ol>
                        <li><a href="{{ route('/') }}">Home</a></li>
                        <li>Desa</li>
                    </ol>
                </div>

            </div>
        </div><!-- End Breadcrumbs -->
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>List SFV DESA</h2>
                    <p>Smart Fisheries Village Desa.</p>
                </div>

                <div class="row gy-5">
                    @foreach ($unit as $u)
                        <div class="col-xl-3 col-md-4" data-aos="zoom-in" data-aos-delay="200">
                            <div class="service-item">
                                <div class="img">
                                    <img src="{{ asset($u->img) }}" class="img-fluid img-same-size" alt="">
                                </div>
                                <div class="details position-relative">
                                    <div class="icon">
                                        <i class="bi bi-easel2"></i>
                                    </div>
                                    <a href="{{ url('/unit?id=') . $u->id }}" class="stretched-link">
                                        <h3>{{ $u->nama_unit }}</h3>
                                    </a>
                                </div>
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach
                </div>

            </div>
        </section><!-- End Services Section -->



    </main><!-- End #main -->
@endsection
@section('style')
    <style>
        .img-same-size {
            width: 350px;
            height: 200px;
            object-fit: cover;
            display: block;
        }
        .details {
            width: 250px;
            height: 150px;
        }
    </style>
@endsection
@section('script')
@endsection
