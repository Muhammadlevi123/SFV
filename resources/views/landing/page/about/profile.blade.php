@extends('landing.layout.main')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
@section('content')
    <main id="main" style="min-height: 700px">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Profile SFV</h2>
                    <ol>
                        <li><a href="{{ route('/') }}">Home</a></li>
                        <li>Profile SFV</li>
                    </ol>
                </div>
            </div>
        </div><!-- End Breadcrumbs -->
        <!-- ======= On Focus Section ======= -->
        <section id="onfocus" class="onfocus">
            <div class="container-fluid p-0" data-aos="fade-up">

                <div class="row g-0">
                    <div class="col-lg-6 col-sm-12 video-play position-relative">

                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="content d-flex flex-column fst-italic justify-content-center h-100">
                            <h3>" PROGRAM SFV MENCOBA UNTUK MENGGALI DAN MENGEMBANGKAN DESA DAN UPT PERIKANAN MENJADI LEBIH
                                MAJU, MODERN DAN BERKELANJUTAN. "</h3>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End On Focus Section -->



        <!-- ======= SFV Section ======= -->
        <section class="SFV" data-aos="">
            <div class="row">
                <div class=" text-content-SFV col-lg-7 col-sm-12 " data-aos="fade-right" data-aos-delay="100">
                    <div>
                        <div class="mini-title">Smart Fisheries Village</div>
                        <h4>SFV menciptakan lingkungan berkelanjutan dan ekonomis</h4>
                    </div>
                    <div class="">
                        <p class="">SFV merupakan konsep pembangunan desa perikanan yang berbasis penerapan teknologi
                            informasi komunikasi dan manajemen tepat guna berkelanjutan untuk meningkatkan ekonomi
                            masyarakat.
                        </p>
                    </div>
                    <div class="flex-sub-header">
                        <div class="sub-header-icon">
                            <img src="{{ asset('assets/img/icon/icon7.png') }}" alt="icon">
                        </div>
                        <div class="margin-text">
                            <span>
                                <h6>Konsep SFV</h6>
                            </span>
                            <p class="mb-30"><b>Circular Economy</b>, penggunaan sumberdaya secara berkelanjutan dan
                                mengurangi
                                tekanan pada sumber daya alam dari aktivitas ekonomi.</p>
                            <p class="mb-30"><b>Pengembangan Ekonomi Berbasis Digital</b>, melalui pelatihan talenta UKM
                                kelautan dan perikanan.</p>
                            <p class="mb-30"><b>Mendorong Mekanisme Kerjasama</b>, dengan skema kemitraan atau Public
                                Private
                                Partnership.</p>
                        </div>
                    </div>
                    <div class="flex-sub-header">
                        <div class="sub-header-icon">
                            <img src="{{ asset('assets/img/icon/icon7.png') }}" alt="icon">
                        </div>
                        <div class="margin-text">
                            <h6>Tujuan SFV</h6>
                            <p class="line-height">Program SFV mencoba untuk menggali dan mengembangkan desa dan UPT
                                perikanan
                                menjadi lebih maju,
                                modern, dan berkelanjutan. Potensi usaha perikanan yang ada baik di UPT dan di desa didorong
                                untuk dimaksimalkan menggunakan aplikasi teknologi dan manajemen tepat guna. Diharapkan
                                program
                                SFV berkontribusi dalam pembangunan desa sebagai pengungkit ekonomi nasional.</p>
                        </div>
                    </div>
                </div>
                <div class="image-SFV col-lg-5 col-sm-12 mx-auto float-lg-right g-0" data-aos="fade-left"
                    data-aos-delay="100">
                    <img src="{{ asset('assets/img/SFV/gambar5.jpg') }}" alt="gambar" width="100%" height="518px">
                </div>

            </div>
        </section><!-- End About Section -->


        <!-- ======= Desa Section ======= -->
        <section class="desa col-sm-12">
            <div class="desa-header col-sm-12">
                <h4>Kriteria Lokasi SFV <span class="shape-line">Desa</span></h4>
            </div>
            <div class="row container-desa justify-content-center col-md-12 col-sm-12 col-lg-12" data-aos="zoom-out">
                {{-- <div class="container-desa-card d-flex align-items-center justify-content-center col-sm-12 col-lg-2 bg-red"> --}}
                <div class="d-flex flex-column  align-items-center justify-content-center desa-item col-lg-12 ">
                    <div class="icon1"><i class="bi bi-globe-asia-australia"></i></div>
                    <div class="header-item ">
                        <h4>Sustainable</h4>
                    </div>
                    <div class="content-item ">Merupakan prinsip keberlanjutan secara lingkungan, sosial dan ekonomi.</div>
                </div>
                {{-- </div> --}}
                {{-- <div class="container-desa-card d-flex flex-wrap align-items-center justify-content-center col-sm-12 col-lg-2 bg-red"> --}}
                <div class="d-flex flex-column  align-items-center justify-content-center desa-item col-lg-12 position-relativeposition-relative "data-aos="zoom-out"
                    data-aos-delay="200">
                    <div class="icon2"><i class="bi bi-robot"></i></div>
                    <div class="header-item text-center">
                        <h4>Modernization</h4>
                    </div>
                    <div class="content-item">Merupakan upaya percepatan dalam pemecahan masalah dan perumusan alternatif
                        solusi.</div>
                </div>
                {{-- </div> --}}
                {{-- <div class="container-desa-card d-flex flex-wrap align-items-center justify-content-center col-sm-12 col-lg-2 bg-red"> --}}
                <div class="d-flex flex-column align-items-center justify-content-center desa-item col-lg-12 position-relative"data-aos="zoom-out"
                    data-aos-delay="400">
                    <div class="icon3"><i class="bi bi-hourglass-split"></i></div>
                    <div class="header-item">
                        <h4>Acceleration</h4>
                    </div>
                    <div class="content-item">Merupakan prinsip keberlanjutan secara lingkungan, sosial dan ekonomi.</div>
                </div>
                {{-- </div> --}}
                {{-- <div class="container-desa-card d-flex flex-wrap align-items-center justify-content-center col-sm-12 col-lg-2 bg-red"> --}}
                <div class="d-flex flex-column  align-items-center justify-content-center desa-item col-lg-12  position-relative"data-aos="zoom-out"
                    data-aos-delay="600">
                    <div class="icon4"><i class="bi bi-recycle"></i></div>
                    <div class="header-item">
                        <h4>Regeneration</h4>
                    </div>
                    <div class="content-item">Merupakan proses terjadinya transfer keahlian dan pengetahuan dalam
                        pengelola unit usaha.</div>
                </div>
                {{-- </div> --}}
                {{-- <div class="container-desa-card d-flex flex-wrap align-items-center justify-content-center col-sm-12 col-lg-2 bg-red"> --}}
                <div class="d-flex flex-column  align-items-center justify-content-center desa-item col-lg-12  position-relative"data-aos="zoom-out"
                    data-aos-delay="800">
                    <div class="icon5"><i class="fa-solid fa-microchip"></i></div>
                    <div class="header-item">
                        <h4>Technology</h4>
                    </div>
                    <div class="content-item">Merupakan proses inovasi melalui Teknologi Informasi dalam pengelolaan usaha.
                    </div>
                </div>
                {{-- </div> --}}
            </div>
        </section><!-- Desa Section -->

        <!-- ======= UPT Section ======= -->

        <section class="UPT">
            <div class="UPT-header col-sm-12">
                <h4>Kriteria Lokasi SFV <span class="shape-line2">UPT BRSDMKP</span></h4>
            </div>
            <div class="UPT-container row justify-content-center">
                <div class="UPT-item d-flex flex-column  align-items-center justify-content-center col-lg-2 col-sm-12 "
                    data-aos="zoom-in">
                    <div class="image-content"><img src="{{ asset('assets/img/content-UPT/image-content2.jpg') }}"
                            alt="gambar" width="180"></div>
                    <div class="header-UPT-item ">Governance</div>
                    <div class="content-UPT-item">Prinsip tata kelola yang dilakukan UPT BRSDMKP dalam menjalankan role
                        model yang meliputi fungsi pendidikan, pelatihan, dan penyuluhan.</div>
                    <div><input type="submit" value="Kategori" data-bs-toggle="modal" data-bs-target="#modal1"></div>
                </div>
                <div class="UPT-item d-flex flex-column  align-items-center justify-content-center col-lg-2 col-sm-12"
                    data-aos="zoom-in">
                    <div class="image-content"><img src="{{ asset('assets/img/content-UPT/image-content9.jpg') }}"
                            alt="gambar" width="185" height="215"></div>
                    <div class="header-UPT-item ">People</div>
                    <div class="content-UPT-item">Merupakan peran bersama pemangku kepentingan dalam membangun SFV UPT
                        sesuai dengan bidang keahlian masing-masing.</div>
                    <div><input type="submit" value="Kategori" data-bs-toggle="modal" data-bs-target="#modal2"></div>
                </div>
                <div class="UPT-item d-flex flex-column  align-items-center justify-content-center col-lg-2 col-sm-12"
                    data-aos="zoom-in">
                    <div class="image-content"><img src="{{ asset('assets/img/content-UPT/image-content4.jpg') }}"
                            alt="gambar" width="185" height="215"></div>
                    <div class="header-UPT-item ">Economy</div>
                    <div class="content-UPT-item">Prinsip yang menunjukkan ekonomi yang dapat berdaya saing tinggi, yang
                        melibatkan berbagai aktivitas inovasi dan kerja sama antara swasta dan masyarakat.</div>
                    <div><input type="submit" value="Kategori" data-bs-toggle="modal" data-bs-target="#modal3"></div>
                </div>
                <div class="UPT-item d-flex flex-column  align-items-center justify-content-center col-lg-2 col-sm-12"
                    data-aos="zoom-in">
                    <div class="image-content"><img src="{{ asset('assets/img/content-UPT/image-content13.jpg') }}"
                            alt="gambar" width="180" height="215"></div>
                    <div class="header-UPT-item ">Mobility</div>
                    <div class="content-UPT-item">Aksesibilitas sistem transportasi yang terintegrasi, pasokan sumber
                        listrik, ketersediaan jaringan internet, aplikasi teknologi informasi dan komunikasi.</div>
                    <div><input type="submit" value="Kategori" data-bs-toggle="modal" data-bs-target="#modal4"></div>
                </div>
                <div class="UPT-item d-flex flex-column  align-items-center justify-content-center col-lg-2 col-sm-12"
                    data-aos="zoom-in">
                    <div class="image-content"><img src="{{ asset('assets/img/content-UPT/image-content11.jpg') }}"
                            alt="gambar" width="170" height="215"></div>
                    <div class="header-UPT-item ">Environment</div>
                    <div class="content-UPT-item">Dimensi SMART environment menunjukkan bahwa SFV UPT memperhatikan faktor
                        keberlanjutan lingkungan.</div>
                    <div><input type="submit" value="Kategori" data-bs-toggle="modal" data-bs-target="#modal5"></div>
                </div>
            </div>

            <!-- Modal-content -->
            <div class="modal fade" id="modal1">
                <div class="modal-dialog modal-dialog-scrollable ">
                    <div class="modal-content2">
                        <div class="text-header text-center">
                            <h4>Governance</h4>
                        </div>
                        <div class="modal-body">
                            <h3>Kriteria Penilaian</h3>
                            <ol type="1">
                                <li>Transparansi, Informasi keuangan dan operasional harus tersedia dan mudah diakses oleh
                                    semua pemangku kepentingan.</li>
                                <li>Akuntabilitas, Ada mekanisme untuk memastikan bahwa semua tindakan dan keputusan dapat
                                    dipertanggungjawabkan.</li>
                                <li>Melibatkan semua pemangku kepentingan dalam proses pengambilan keputusan.</li>
                            </ol><br>
                            <div class="text-center">
                                <input type="submit" value="Tutup" data-bs-dismiss="modal" class="submit1"
                                    id="submit-desa1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal2">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content2">
                        <div class="text-header text-center">
                            <h4>People</h4>
                        </div>
                        <div class="modal-body">
                            <h3>Kriteria Penilaian</h3>
                            <ol type="1">
                                <li>Pemberdayaan, Program harus mencakup pelatihan dan pendidikan untuk meningkatkan
                                    kapasitas masyarakat pesisir.</li>
                                <li>Kesejahteraan, Fokus pada peningkatan kesejahteraan sosial dan ekonomi masyarakat.</li>
                            </ol><br>
                            <div class="submit text-center">
                                <input type="submit" value="Tutup" data-bs-dismiss="modal" id="submit-desa2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal3">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content2">
                        <div class="text-header text-center">
                            <h4>Economy</h4>
                        </div>
                        <div class="modal-body">
                            <h3>Kriteria Penilaian</h3>
                            <ol type="1">
                                <li>Keberlanjutan, Penggunaan sumber daya laut harus dilakukan secara berkelanjutan untuk
                                    memastikan keberlanjutan jangka panjang.</li>
                                <li>Inovasi, Mendorong inovasi dalam praktik ekonomi biru.</li>
                            </ol><br>
                            <div class="text-center">
                                <input type="submit" value="Tutup" data-bs-dismiss="modal" id="submit-desa3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal4">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content2">
                        <div class="text-header text-center">
                            <h4>Mobility</h4>
                        </div>
                        <div class="modal-body">
                            <h3>Kriteria Penilaian</h3>
                            <ol type="1">
                                <li>Aksesibilitas, Meningkatkan aksesibilitas bagi masyarakat pesisir untuk mendukung
                                    kegiatan ekonomi dan sosial.</li>
                                <li>Infrastruktur, Pengembangan infrastruktur yang mendukung mobilitas dan konektivitas.
                                </li>
                            </ol><br>
                            <div class="text-center">
                                <input type="submit" value="Tutup" data-bs-dismiss="modal" id="submit-desa4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal5">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content2">
                        <div class="text-header text-center">
                            <h4>Environment</h4>
                        </div>
                        <div class="modal-body">
                            <h3>Kriteria Penilaian</h3>
                            <ol type="1">
                                <li>Konservasi, Melindungi dan melestarikan ekosistem laut dan pesisir.</li>
                                <li>Praktik Ramah Lingkungan, Mengadopsi praktik keuangan yang ramah lingkungan dan
                                    berkelanjutan.</li>
                            </ol><br>
                            <div class="text-center">
                                <input type="submit" value="Tutup" data-bs-dismiss="modal" id="submit-desa5">
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end modal-content-->

        </section><!-- END UPT-Section -->

        <!-- ======= Carousel-Section ======= -->

        <!-- TESTIMONIALS -->
        <section class="testimonials-carousel" data-aos="fade-up">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="customers-testimonials" class="owl-carousel">

                            @foreach ($unit as $index => $u)
                                <!--TESTIMONIAL -->

                                <div class="item {{ $index == 0 ? 'active' : '' }}">
                                    <div class="shadow-effect">
                                        <img class="img-responsive" src="{{ asset($u->img) }}" alt="" />
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

        <!-- ======= end carousel-Section ======= -->


    </main><!-- End #main -->
@endsection
@section('style')
    <!-- OwlCarousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <!-- Font Awesome for navigation icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        .onfocus .video-play {
            background: linear-gradient(rgba(var(--color-black-rgb), 0.1), rgba(var(--color-black-rgb), 0.3)), url(../assets/img/sfv/DJI_0207.JPG) center center;
            background-size: cover;
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

        /*--------------------------------------------------------------
                # SFV-section
                --------------------------------------------------------------*/

        .SFV {
            background-color: rgba(var(--color-secondary-rgb), 0.05);
            padding: 85px 50px 100px 60px;
        }

        .image-SFV img {
            margin-left: 10px;
            margin-top: 90px;

        }

        .mini-title {
            font-weight: 400;
            font-size: 20px;
            color: rgb(55, 103, 194);
        }

        .text-content-SFV {
            margin-left: 10px;
        }

        .text-content-SFV h4 {
            color: black;
            font-size: 30px;
            font-weight: 400;
        }

        .text-content-SFV h6 {
            color: black;
            font-size: 24px;
            font-weight: bold;
        }

        .text-content-SFV {
            padding-right: 45px;
            width: 49em;
            /* height: 2em; */
        }

        .text-content-SFV p {
            color: darkblue;
            text-align: justify;
        }

        .flex-sub-header {
            display: flex;
        }

        .mb-30 {
            margin-bottom: 35px;
        }

        .mb-20 {
            margin-bottom: 50px;
        }

        .sub-header-icon img {
            width: 40px;
        }

        .margin-text {
            position: relative;
            left: 10px;
        }

        .line-height {
            line-height: 30px;
        }


        /*--------------------------------------------------------------
            # Desa-section
            --------------------------------------------------------------*/
        .desa {
            /* padding: 50px 120px 90px 120px; */
            background-color: #185a86;
        }

        .desa-header {
            text-align: center;
            padding-bottom: 30px;
        }

        .desa-content {
            padding: 1px;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            justify-content: center;
        }

        .desa-header h4 {
            color: #fff;
            font-size: 35px;
            font-weight: 600;
        }

        .tagline {
            font-weight: 700;
            font-size: 20px;
            /* color: #41bd3f; */
        }

        .shape-line {
            /*color:rgb(255 126 132);*/
            /*background-image: url("../img/tagline/tagline.jpg");*/
            /* color: #41bd3f; */
            font-family: 'Roboto', sans-serif;
        }

        .desa-item {
            /* display: flex;
                    flex-wrap: wrap;
                    align-items: center;
                    justify-content: center; */
            margin: 20px 20px 20px 20px;
            border-radius: 10px;
            padding: 38px 30px 30px 28px;
            width: 250px;
            border: white 1px solid;
            box-shadow: 0 0 2px 2px rgba(255, 255, 255, 0.7);
        }

        .desa-item:hover .icon1 {
            border-color: rgb(34, 139, 34);
            background-color: #EBF4F6;
            transform: scale(1.0);
        }

        .desa-item:hover .icon2 {
            border-color: crimson;
            background-color: #EBF4F6;
            transform: scale(1.0);
        }

        .desa-item:hover .icon3 {
            border-color: orangered;
            background-color: #EBF4F6;
            transform: scale(1.0);
        }

        .desa-item:hover .icon4 {
            border-color: darkolivegreen;
            background-color: #EBF4F6;
            transform: scale(1.0);
        }

        .desa-item:hover .icon5 {
            border-color: rgb(63, 63, 196);
            background-color: #EBF4F6;
            transform: scale(1.0);
        }

        .desa-item .icon1,
        .icon2,
        .icon3,
        .icon4,
        .icon5 {
            display: flex;
            align-items: center;
            width: 7em;
            height: 7em;
            border-radius: 50%;
            border: 10px groove #508C9B;
            background-color: #EEEEEE;
            /*background-color: rgb(230, 221, 221); */
            transition: all 0.5s ease;
        }

        .desa-item .header-item {
            margin-top: 10px;
        }

        .desa-item .header-item h4 {
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .desa-item .content-item {
            text-align: center;
            width: 11em;
            height: 9em;
            color: rgb(185, 185, 185);
            font-weight: 600;
        }

        .icon1 i {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 56px;
            margin: auto;
        }

        .icon2 i {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 56px;
            margin: auto;
        }

        .icon3 i {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 56px;
            margin: auto;
        }

        .icon4 i {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 56px;
            margin: auto;
        }

        .icon5 i {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 56px;
            margin: auto;
        }

        .bi-hourglass-split {
            color: orangered;
        }

        .bi-globe-asia-australia {
            color: green;
        }

        .fa-microchip {
            color: rgb(71, 71, 220);
        }

        .bi-robot {
            color: crimson;
        }

        .bi-recycle {
            color: darkolivegreen;
        }

        .text-content p {
            width: 11em;
            height: 9em;
            color: rgb(170, 170, 170);
        }

        /*--------------------------------------------------------------
        # UPT-section
        --------------------------------------------------------------*/
        .UPT {
            background: linear-gradient(135deg, #508C9B, #EEEEEE);
            box-shadow: 0 -4px 8px -4px rgba(170, 170, 170, 1);
            padding: 50px 10px 80px 10px;
        }

        .UPT-header {
            text-align: center;
            padding-bottom: 25px;
        }

        .UPT-header h6 {
            font-weight: 600;
            font-size: 25px;
            color: rgb(55, 103, 194);
        }

        .UPT-header h4 {
            color: white;
            font-size: 35px;
            font-weight: 600;
        }

        .shape-line2 {
            /* color: rgb(55, 103, 194); */
            /*background-image: url("../img/tagline/tagline.jpg");*/
            background-position: bottom center;
            background-size: 100%;
            padding-bottom: 6rem;
            background-repeat: no-repeat;
        }

        .UPT-container {
            /* display: grid;
                grid-template-columns: 1fr 1fr 1fr 1fr 1fr; */
            /* margin: 0 50px 0 50px; */
        }

        .UPT-item {
            background-color: #EBF4F6;
            margin-right: 12px;
            padding: 20px 35px 20px 35px;
            text-align: center;
            border-radius: 7px;
            transition: transform 0s;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .UPT-item:hover {
            transform: translateY(-10px) !important ;
            background-color: #d6e1e4;
        }

        .UPT-item:hover .header-UPT-item {
            color: #472183;
            font-weight: 800;
        }

        .image-content {
            width: 100%;
            height: 50px;
        }

        .header-UPT-item {
            padding-top: 180px;
            padding-bottom: 10px;
            color: black;
            font-size: 20px;
            font-weight: 600;
        }

        .content-UPT-item {
            width: 12em;
            height: 12em;
            font-size: 14px;
            font-weight: 500;
            padding-bottom: 190px;
        }

        input[type="submit"] {
            color: var(--color-white);
            background: var(--color-primary);
            border: none;
            padding: 15px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            transition: 0.2s ease;
            box-shadow: 0 8px 10px rgba(0, 0, 0, 0.1);
        }

        .modal-content2 {
            position: fixed;
            background-color: #f8f9fa;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 550px;
            height: 600px;
            border: 2px ridge black;
        }

        .modal-body ol {
            transform: translateX(-10px);
        }

        .modal-content2 input[type="submit"] {}

        input[type="submit"]:hover {
            color: var(--color-white);
            background: rgba(var(--color-primary-rgb), 0.85);
        }

        #submit-desa1 {
            margin-top: 100px
        }

        #submit-desa2 {
            margin-top: 150px;
        }

        #submit-desa3 {
            margin-top: 180px;
        }

        #submit-desa4 {
            margin-top: 180px;
        }

        #submit-desa5 {
            margin-top: 180px;
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
            background-color: #ddd;
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
            width: 100%;
            height: 150px;
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
            transform: translateY(-30px)
        }

        .owl-dot.active {
            width: 16px;
            height: 16px;
            background-color: #f33f02 !important;
            /* Warna background untuk dot aktif */
        }

        .item {
            transform: translateY(30px)
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
