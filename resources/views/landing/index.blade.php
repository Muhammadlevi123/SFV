@extends('landing.layout.main')
@section('content')
    <div class="video-container">
        <video autoplay muted loop>
            <source src="{{ asset('assets/img/sfv/DJI_0676.MP4') }}" type="video/mp4" />
        </video>
        <div class="caption">
            <section id="hero-static" class=" hero-static d-flex align-items-center">
                <div class="content container d-flex flex-column justify-content-center align-items-center text-center position-relative"
                    data-aos="zoom-out">
                    <img style="height: 120px" class="pb-3" src="{{ asset('assets/img/logo/SFV_6.png') }}" alt="">
                    <h2 class="color-white">Selamat Datang di <span>SFV</span></h2>
                    <p class="color-white">Unit Pelaksana Teknis dan Desa.</p>
                    {{-- <div class="d-flex">
                        <a href="#about" class="btn-get-started scrollto">Get Started</a>
                        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                            class="glightbox btn-watch-video d-flex align-items-center"><i
                                class="bi bi-play-circle"></i><span>Watch
                                Video</span></a>
                    </div> --}}
                </div>
            </section>
        </div>
    </div>

    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container ">
                <div class="row gy-1">
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out">
                        <div class="service-item text-center position-relative">
                            <div class="icon"><i class="bi bi-house-check"></i></div>
                            <h4><a href="{{ route('detail.index') }}" class="stretched-link">Profil</a>
                            </h4>
                            <p>Informasi Profil Smart Fishering Village Unit Pelaksana Teknis/Desa</p>
                        </div>
                    </div><!-- End Service Item -->
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="200">
                        <div class="service-item text-center position-relative">
                            <div class="icon"><i class="bi bi-archive"></i></div>
                            <h4><a href="{{ route('produktivitas.unit') }}" class="stretched-link">Produktivitas</a></h4>
                            <p>Informasi Pagu, Realisasi dan Capaian Kegiatan SFV Unit Pelaksana
                                Teknis</p>
                        </div>
                    </div><!-- End Service Item -->
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="400">
                        <div class="service-item text-center position-relative">
                            <div class="icon"><i class="bi bi-clipboard-data"></i></div>
                            <h4><a href="{{ route('produksi.unit') }}" class="stretched-link">Produksi</a></h4>
                            <p>Informasi Produksi Berdasarkan Komoditas dan Produk SFV Unit
                                Pelaksana Teknis/Desa</p>
                        </div>
                    </div><!-- End Service Item -->
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
                        <div class="service-item text-center position-relative">
                            <div class="icon"><i class="bi bi-graph-up-arrow"></i></div>
                            <h4><a href="{{ route('pnbp.unit') }}" class="stretched-link">PNBP</a></h4>
                            <p>Informasi Pagu, Realisasi PNBP SFV
                                Unit Pelaksana Teknis</p>
                        </div>
                    </div><!-- End Service Item -->
                </div>

            </div>
        </section><!-- End Featured Services Section -->

        <!-- ======= On Focus Section ======= -->
        <section id="onfocus" class="onfocus">
            <div class="container-fluid p-0" data-aos="fade-up">

                <div class="row g-0">
                    <div class="col-lg-6 video-play position-relative">
                        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class=""></a>
                    </div>
                    <div class="col-lg-6">
                        <div class="content d-flex flex-column justify-content-center h-100">
                            <h3>Smart Fisheries Village.</h3>
                            <p class="fst-italic text-justify">
                                <b>SMART Fisheries Village (SFV)</b> adalah konsep pembangunan perikanan yang berbasis
                                penerapan
                                teknologi dan manajemen tepat guna serta peningkatan ekonomi masyarakat yang memperkaya
                                konsep program Kampung Budidaya dan Desa Inovasi/Desa Mitra. Ada dua jenis SFV :
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle"></i> SFV berbasis desa.</li>
                                <li><i class="bi bi-check-circle"></i> SFV berbasis Unit Pelaksana Teknis
                                    (UPT).</li>

                            </ul>
                            <a href="{{ route('detail.index') }}" class="read-more align-self-start"><span>Read
                                    More</span><i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End On Focus Section -->

        <!-- ======= space-Section ======= -->
        <section class="space"></section>
        <!-- ======= endspace-Section ======= -->

        <!-- ======= Carousel-Section ======= -->

        <!-- TESTIMONIALS -->
    <section class="testimonials-carousel" data-aos="fade-up">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div id="customers-testimonials" class="owl-carousel">
  
              @foreach ($unit as $index => $u)
  
                <!--TESTIMONIAL -->
                
                <div class="item {{ $index == 0 ? 'active' : '' }}" >
                  <div class="shadow-effect">
                      <img class="img-responsive" src="{{ asset($u->img) }}" alt=""/>
                      <a href="{{ url('/unit?id=') . $u->id }}">
                          <div class="item-details">
                              <h4>{{ $u->nama_unit }}</h4>
                              <h6>{{ $u->alamat }}</h6>
                          </div>
                      </a>
                  </div>
                </div>
                <!--END OF TESTIMONIAL -->
  
                @endforeach
  
              </div>
            </div>
          </div>
        </div>
    </section>
      <!-- END OF TESTIMONIALS -->


    </main><!-- End #main -->
@endsection
@section('style')
<!-- OwlCarousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
<!-- Font Awesome for navigation icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        .header .navbar a {
            color: #e3e0e0;
        }

        .header.sticked .navbar a {
            color: #1e1e1e;
        }

        .portfolio-item {
            max-height: 14em !important;
        }

        .video-container {
            /* background: red; */

            position: relative;
        }

        .video-container video {
            width: 100%;
            height: 100%;
            position: absolute;
            object-fit: cover;
            z-index: 0;
            /* background: rgba(0,0,0,0.9) */
        }

        /* Just styling the content of the div, the *magic* in the previous rules */
        .video-container .caption {
            z-index: 1;
            position: relative;
            text-align: center;
            color: #dc0000;
            padding: 10px;
        }

        /* start css-carousel */

        .testimonials-carousel {
        background-color: var(--color-primary);
        position: relative;
        
      }
      .testimonials-carousel:after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: 35%;
        background-color: white;
      }
      #customers-testimonials .item-details {
        background-color: #333333;
        color: #fff;
        padding: 20px 10px;
        text-align: left;
      }
      .img-responsive {
        width: 100%;
        height: 270px;
        object-fit: cover;
      }
      .item-details {
        width:100%;
        height:150px;
        object-fit: cover;
      }
      #customers-testimonials .item-details h5 {
        margin: 0 0 15px;
        font-size: 18px;
        line-height: 18px;
      }
      #customers-testimonials .item-details h5 span {
        color: red;
        float: right;
        padding-right: 20px;
      }
      #customers-testimonials .item-details p {
        font-size: 14px;
      }
      #customers-testimonials .item {
        text-align: center;
        margin-bottom: 80px;
      }
      .owl-carousel .owl-nav [class*="owl-"] {
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
      }
      .owl-carousel .owl-nav [class*="owl-"].disabled:hover {
        background-color: #d6d6d6;
      }
      .owl-carousel {
        position: relative;
      }
      .owl-dots {
        text-align: center;
        margin-top: 20px;   
      }
      .owl-dot {
        display: inline-block;
        width: 12px;
        height: 12px;
        margin: 5px;
        border-radius: 50%;
        transition: background-color 0.3s;
        background-color: black;
        color: black;
        background-color: black !important;
        transform:translateY(-30px)
      }
      .owl-dot.active {
        width: 16px;
        height: 16px;
        background-color: #f33f02 !important; /* Warna background untuk dot aktif */
      }  
      .item {
        transform:translateY(30px)
      }

            /* end css-carousel */

    </style>
@endsection
@section('script')
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- owl-carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        "use strict";
        $('#customers-testimonials').owlCarousel({
            loop: true,
            center: true,
            items: 3,
            margin: 30,
            autoplay: true,
            dots: true,
            nav: false,
            autoplayTimeout: 8500,
            smartSpeed: 450,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1170: {
                    items: 3
                }
            }
        });
    });
</script>
@endsection
