<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIKASI</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('logosv.png') }}" rel="icon">
    <link href="{{ asset('SIKASI2.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    {{-- {{ asset('assets/img/logo.png') }} --}}
    <link href="{{ asset('landingpage/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landingpage/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('landingpage/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('landingpage/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('landingpage/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet') }}">

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="{{ asset('landingpage/assets/css/variables-blue.css') }}" rel="stylesheet">


    <!-- Template Main CSS File -->
    <link href="{{ asset('landingpage/assets/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: HeroBiz - v2.1.0
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    {{-- <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div> --}}

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top" data-scrollto-offset="0">
        <div class="container-fluid d-flex align-items-center justify-content-between">

            <a class="navbar-brand">
                <img src="SIKASI2.png" width="162" height="75">
            </a>

            <nav id="navbar" class="navbar">
                <ul>


                    <li><a class="nav-link scrollto" href="index.html#about">Tentang</a></li>
                    <li><a class="nav-link scrollto" href="index.html#onfocus">Ketentuan Umum</a></li>
                    <li><a class="nav-link scrollto" href="index.html#cta">Status Pengajuan</a></li>
                    {{-- <li><a class="nav-link scrollto" href="index.html#faq">FAQ</a></li>
                    <li><a class="nav-link scrollto" href="index.html#team">Team</a></li> --}}
                    <li><a class="nav-link scrollto" href="index.html#contact">Kontak</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle d-none"></i>
            </nav><!-- .navbar -->

            <a class="btn-getstarted scrollto" href="/login">Login</a>

        </div>
    </header><!-- End Header -->

    <section id="hero-animated" class="hero-animated d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
            data-aos="zoom-out">

            <h2>Selamat Datang di SIKASI</h2>
            <p>Sistem Informasi Kerjasama Sekolah Vokasi</p>
            <div class="d-flex">
                <a href="/login" class="btn-get-started scrollto">Pengajuan Kerjasama</a>

            </div>
        </div>
    </section>

    <main id="main">



        <!-- ======= Tentang Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-header">

                    <p>Sistem Informasi Kerjasama Sekolah Vokasi dibangun dengan tujuan
                        untuk memudahkan proses pengajuan kerjasama antara prodi dengan pihak mitra yang terlibat.
                        Dengan adannya sistem ini diharapkan dapat memudahkan pihak program pendidikan yang berada
                        dibawah lingkungan Sekolah Vokasi Universitas Sebelas Maret dalam memonitoring proses kerjasama
                        yang diajukan.</p>
                </div>

            </div>
            <!-- ======= Featured Services Section ======= -->
            <section id="featured-services" class="featured-services">
                <div class="container">

                    <div class="row gy-4">

                        <div class="col-xl-6 col-md-12 d-flex" data-aos="zoom-out">
                            <div class="service-item position-relative">
                                <div class="icon">
                                    <i class="bi bi-globe"></i>
                                </div>
                                <h4><a href="" class="stretched-link">Perjanjian Kerjasama (PKS)</a></h4>
                                <p>Perjanjian Kerjasama merupakan suatu perjanjian sebagai tindak lanjut dari Memorandum
                                    of
                                    Understanding antara Universitas Sebelas Maret dengan pihak mitra (instansi
                                    pemerintah/
                                    perguruan tinggi/ sekolah/ BUMN/ perusahaan swasta/perbankan/yayasan, dll).</p>
                            </div>
                        </div><!-- End Service Item -->

                        <div class="col-xl-6 col-md-12 d-flex" data-aos="zoom-out" data-aos-delay="200">
                            <div class="service-item position-relative">
                                <div class="icon">
                                    <i class="bi bi-globe"></i></i>
                                </div>
                                <h4><a href="" class="stretched-link">Momerandum Of Understanding (MoU)</a></h4>
                                <p>Memorandum of Understanding merupakan payung hukum untuk seluruh perjanjian
                                    kerjasama/kontrak kerja/kontrak swakelola/penunjukan langsung, antara Universitas
                                    Sebelas Maret dengan pihak mitra (instansi pemerintah/perguruan
                                    tinggi/sekolah/BUMN/perusahaan swasta/perbankan/yayasan, dll)
                                </p>
                            </div>
                        </div><!-- End Service Item -->

                    </div>

                </div>
            </section>
            <!-- End Featured Services Section -->
        </section>
        <!-- End About Section -->

        <!-- ======= On Focus Section ======= -->
        <section id="onfocus" class="onfocus">
            <div class="container-fluid p-0" data-aos="fade-up">

                <div class="row g-0">

                    <div class="col-lg-12">
                        <div class="content d-flex flex-column justify-content-center h-100">
                            <h3>Ketentuan Umum Pengajuan PKS</h3>
                            <ul>
                                <li><i class="bi bi-check-circle"></i> Memorandum of Agreement atau Perjanjian
                                    Kerjasama merupakan suatu perjanjian sebagai tindak lanjut dari Memorandum of
                                    Understanding antara Universitas Sebelas Maret dengan pihak mitra (instansi
                                    pemerintah/ perguruan tinggi/ sekolah/ BUMN/ perusahaan swasta/perbankan/yayasan,
                                    dll).
                                    MoA bisa dilaksanakan antara UNS langsung dengan pihak mitra, atau antara
                                    unit/lembaga/fakultas di lingkungan UNS dengan unit yang ada di bawah pihak mitra.

                                </li>
                                <li><i class="bi bi-check-circle"></i> Yang bisa menandatangani Perjanjian Kerja
                                    Sama/Kontrak Kerjasama antara lain:
                                    <ol>Wakil Rektor UNS</ol>
                                    <ol>Dekan/Kepala/Ketua/Pejabat Pembuat Komitmen (disesuaikan dengan level pejabat
                                        pihak
                                        mitra) yang kemudian diketahui oleh WR Perencanaan, Kerjasama, Bisnis, dan
                                        Informasi </ol>
                                </li>
                                </li>
                                <li><i class="bi bi-check-circle"></i> Pada kop terdapat logo UNS dan logo pihak mitra
                                    (bergantung pada kesepakatan para pihak) dengan tinta berwarna
                                </li>
                            </ul>
                            <a href="https://docs.google.com/document/d/16DdIXw-bC1RcbhHdNzTN1yfEeHRTmGKn/edit"
                                class="read-more align-self-start"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="content d-flex flex-column justify-content-center h-100">
                            <h3>Ketentuan Umum Pengajuan MoU</h3>
                            <ul>
                                <li><i class="bi bi-check-circle"></i> Memorandum of Understanding merupakan payung
                                    hukum untuk seluruh perjanjian kerjasama/kontrak kerja/kontrak swakelola/penunjukan
                                    langsung, antara Universitas Sebelas Maret dengan pihak mitra (instansi
                                    pemerintah/perguruan tinggi/sekolah/BUMN/perusahaan swasta/perbankan/yayasan, dll)
                                </li>
                                <li><i class="bi bi-check-circle"></i> Pejabat penandatangan adalah Rektor atau Wakil
                                    Rektor Bidang Perencanaan dan Kerjasama UNS (disesuaikan dengan jabatan pejabat
                                    penandatangan pihak mitra)</li>
                                <li><i class="bi bi-check-circle"></i> Pada kop terdapat logo UNS dan logo pihak mitra
                                    (bergantung pada kesepakatan para pihak) dengan tinta berwarna
                                </li>
                            </ul>
                            <a href="https://docs.google.com/document/d/14-a9RWT5DCFc8F-Bj7nP0NNoLoGmypV1/edit"
                                class="read-more align-self-start"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End On Focus Section -->

        <!-- ======= Status Pengajuan ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-out">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Status Pengajuan PKS
                                    </h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div
                                    class="iq-timeline0 m-0 d-flex align-items-center justify-content-between position-relative">
                                    <ul class="list-inline p-0 m-0">
                                        <li>
                                            <div class="timeline-dots1 border-primary text-primary">
                                                <svg width="20" height="20" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,3H5C3.89,3 3,3.89 3,5V9H5V5H19V19H5V15H3V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M10.08,15.58L11.5,17L16.5,12L11.5,7L10.08,8.41L12.67,11H3V13H12.67L10.08,15.58Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="float-left mb-1">Mengajukan Kerjasama PKS </p>

                                            <div class="d-inline-block w-100">
                                                <h6>Dosen mengajukan kerjasama melalui website SIKASI</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-dots1 border-primary text-primary">
                                                <svg width="20" height="20" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,3H5C3.89,3 3,3.89 3,5V9H5V5H19V19H5V15H3V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M10.08,15.58L11.5,17L16.5,12L11.5,7L10.08,8.41L12.67,11H3V13H12.67L10.08,15.58Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="float-left mb-1">Pengajuan Kerjasama Diterima</p>

                                            <div class="d-inline-block w-100">
                                                <h6>Proses pengajuan diterima, masuk kedalam daftar antrian</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-dots1 border-primary text-primary">
                                                <svg width="20" height="20" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,3H5C3.89,3 3,3.89 3,5V9H5V5H19V19H5V15H3V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M10.08,15.58L11.5,17L16.5,12L11.5,7L10.08,8.41L12.67,11H3V13H12.67L10.08,15.58Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="float-left mb-1">Dokumen Pengajuan Direview BPU</p>

                                            <div class="d-inline-block w-100">
                                                <h6>Dokumen pengajuan diperiksa kelengkapan oleh perwakilan BPU</h6>
                                            </div>
                                        </li>
                                        </li>
                                        <li>
                                            <div class="timeline-dots1 border-primary text-primary">
                                                <svg width="20" height="20" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,3H5C3.89,3 3,3.89 3,5V9H5V5H19V19H5V15H3V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M10.08,15.58L11.5,17L16.5,12L11.5,7L10.08,8.41L12.67,11H3V13H12.67L10.08,15.58Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="float-left mb-1">Dokumen Pengajuan Selesai Direview BPU</p>

                                            <div class="d-inline-block w-100">
                                                <h6>Dokumen telah diperiksa dan diperbaiki oleh BPU</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-dots1 border-primary text-primary">
                                                <svg width="20" height="20" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,3H5C3.89,3 3,3.89 3,5V9H5V5H19V19H5V15H3V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M10.08,15.58L11.5,17L16.5,12L11.5,7L10.08,8.41L12.67,11H3V13H12.67L10.08,15.58Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="float-left mb-1">Proses Tanda Tangan Dekan</p>

                                            <div class="d-inline-block w-100">
                                                <h6>Dokumen kerjasama dalam proses pengajuan tanda tangan Dekan Sekolah
                                                    Vokasi UNS</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-dots1 border-primary text-primary">
                                                <svg width="20" height="20" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,3H5C3.89,3 3,3.89 3,5V9H5V5H19V19H5V15H3V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M10.08,15.58L11.5,17L16.5,12L11.5,7L10.08,8.41L12.67,11H3V13H12.67L10.08,15.58Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="float-left mb-1">Dokumen Telah Ditandatangani Dekan</p>

                                            <div class="d-inline-block w-100">
                                                <h6>Dokumen hardcopy kerjasama telah disetujui Dekan, kemudian
                                                    diambil oleh perwakilan pihak
                                                    prodi untuk proses pegajuan tandatangan dengan mitra</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-dots1 border-primary text-primary">
                                                <svg width="20" height="20" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,3H5C3.89,3 3,3.89 3,5V9H5V5H19V19H5V15H3V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M10.08,15.58L11.5,17L16.5,12L11.5,7L10.08,8.41L12.67,11H3V13H12.67L10.08,15.58Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="float-left mb-1">Proses Pengajuan Tanda Tangan Mitra</p>

                                            <div class="d-inline-block w-100">
                                                <h6>Perwakilan pihak prodi mengajukan proses tanda tangan dengan mitra
                                                </h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-dots1 border-primary text-primary">
                                                <svg width="20" height="20" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,3H5C3.89,3 3,3.89 3,5V9H5V5H19V19H5V15H3V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M10.08,15.58L11.5,17L16.5,12L11.5,7L10.08,8.41L12.67,11H3V13H12.67L10.08,15.58Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="float-left mb-1">Dokumen Telah Ditandatangani Mitra</p>

                                            <div class="d-inline-block w-100">
                                                <h6>Dokumen hardcopy telah ditandatangani oleh pihak mitra dan
                                                    dikembalikan ke pihak BPU
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-dots1 border-primary text-primary">
                                                <svg width="20" height="20" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,3H5C3.89,3 3,3.89 3,5V9H5V5H19V19H5V15H3V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M10.08,15.58L11.5,17L16.5,12L11.5,7L10.08,8.41L12.67,11H3V13H12.67L10.08,15.58Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="float-left mb-1">Proses Pengajuan Tanda Tangan WR 4</p>

                                            <div class="d-inline-block w-100">
                                                <h6>BPU sekolah vokasi mengajukan dokumen ke DKPI
                                            </div>
                                        </li>

                                        <li>
                                            <div class="timeline-dots1 border-primary text-primary">
                                                <svg width="20" height="20" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,3H5C3.89,3 3,3.89 3,5V9H5V5H19V19H5V15H3V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M10.08,15.58L11.5,17L16.5,12L11.5,7L10.08,8.41L12.67,11H3V13H12.67L10.08,15.58Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="float-left mb-1">Dokumen Direview DKPI</p>

                                            <div class="d-inline-block w-100">
                                                <h6>Dokumen diperiksa oleh DKPI
                                            </div>
                                        </li>
                                        <li>

                                            <div class="timeline-dots1 border-primary text-primary">
                                                <svg width="20" height="20" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,3H5C3.89,3 3,3.89 3,5V9H5V5H19V19H5V15H3V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M10.08,15.58L11.5,17L16.5,12L11.5,7L10.08,8.41L12.67,11H3V13H12.67L10.08,15.58Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="float-left mb-1">Proses Tanda Tanga WR4</p>

                                            <div class="d-inline-block w-100">
                                                <h6>Proses Pengajuan Tanda Tangan oleh Wakil Rektor 4
                                            </div>
                                        </li>
                                        <li>

                                            <div class="timeline-dots1 border-primary text-primary">
                                                <svg width="20" height="20" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,3H5C3.89,3 3,3.89 3,5V9H5V5H19V19H5V15H3V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M10.08,15.58L11.5,17L16.5,12L11.5,7L10.08,8.41L12.67,11H3V13H12.67L10.08,15.58Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <p class="float-left mb-1">Selesai</p>

                                            <div class="d-inline-block w-100">
                                                <h6> Proses Pengajuan Kerjasama Telah Selesai, hardcopy dokumen bisa
                                                    diambil oleh perwakilan prodi</h6>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Status Pengajuan MoU</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div
                                    class="iq-timeline0 m-0 d-flex align-items-center justify-content-between position-relative">
                                    <ul class="list-inline p-0 m-0">

                                        <li>
                                            <div class="timeline-dots1 border-success text-success">
                                                <svg width="20" height="20" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,3H5C3.89,3 3,3.89 3,5V9H5V5H19V19H5V15H3V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M10.08,15.58L11.5,17L16.5,12L11.5,7L10.08,8.41L12.67,11H3V13H12.67L10.08,15.58Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <h6 class="float-left mb-1">Mengajukan Kerjasama Mou</h6>
                                            <div class="d-inline-block w-100">
                                                <p>Dosen mengajukan kerjasama melalui website SIKASI</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-dots1 border-success text-success">
                                                <svg width="20" height="20" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,3H5C3.89,3 3,3.89 3,5V9H5V5H19V19H5V15H3V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M10.08,15.58L11.5,17L16.5,12L11.5,7L10.08,8.41L12.67,11H3V13H12.67L10.08,15.58Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <h6 class="float-left mb-1">Pengajuan Kerjasama Diterima</h6>
                                            <div class="d-inline-block w-100">
                                                <p>Pengajuan Kerjasama masuk ke dalam antrian</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-dots1 border-success text-success">
                                                <svg width="20" height="20" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,3H5C3.89,3 3,3.89 3,5V9H5V5H19V19H5V15H3V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M10.08,15.58L11.5,17L16.5,12L11.5,7L10.08,8.41L12.67,11H3V13H12.67L10.08,15.58Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <h6 class="float-left mb-1">Pengajuan DKPI</h6>
                                            <div class="d-inline-block w-100">
                                                <p>Dokumen diajukan ke DKPI</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-dots1 border-success text-success">
                                                <svg width="20" height="20" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,3H5C3.89,3 3,3.89 3,5V9H5V5H19V19H5V15H3V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M10.08,15.58L11.5,17L16.5,12L11.5,7L10.08,8.41L12.67,11H3V13H12.67L10.08,15.58Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <h6 class="float-left mb-1">Dokumen Direview DKPI</h6>
                                            <div class="d-inline-block w-100">
                                                <p>Dokumen dilakukan pengecekan oleh DKPI</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-dots1 border-success text-success">
                                                <svg width="20" height="20" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,3H5C3.89,3 3,3.89 3,5V9H5V5H19V19H5V15H3V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M10.08,15.58L11.5,17L16.5,12L11.5,7L10.08,8.41L12.67,11H3V13H12.67L10.08,15.58Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <h6 class="float-left mb-1">Proses TTD WR 4</h6>
                                            <div class="d-inline-block w-100">
                                                <p>Proses antrian ttd WR 4</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-dots1 border-success text-success">
                                                <svg width="20" height="20" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19,3H5C3.89,3 3,3.89 3,5V9H5V5H19V19H5V15H3V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M10.08,15.58L11.5,17L16.5,12L11.5,7L10.08,8.41L12.67,11H3V13H12.67L10.08,15.58Z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <h6 class="float-left mb-1">Selesai</h6>
                                            <div class="d-inline-block w-100">
                                                <p>Proses Pengajuan Kerjasama Telah Selesai, hardcopy dokumen bisa
                                                    diambil oleh perwakilan prodi</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Call To Action Section -->








        {{-- <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq">
            <div class="container-fluid" data-aos="fade-up">

                <div class="row gy-4">

                    <div
                        class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                        <div class="content px-xl-5">
                            <h3>Frequently Asked <strong>Questions</strong></h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                            </p>
                        </div>

                        <div class="accordion accordion-flush px-xl-5" id="faqlist">

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Non consectetur a erat nam at lectus urna duis?
                                    </button>
                                </h3>
                                <div id="faq-content-1" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus
                                        laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor
                                        rhoncus dolor purus non.
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?
                                    </button>
                                </h3>
                                <div id="faq-content-2" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                        interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus
                                        scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
                                        Mauris ultrices eros in cursus turpis massa tincidunt dui.
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi?
                                    </button>
                                </h3>
                                <div id="faq-content-3" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci.
                                        Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl
                                        suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis
                                        convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="500">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?
                                    </button>
                                </h3>
                                <div id="faq-content-4" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                        interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus
                                        scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
                                        Mauris ultrices eros in cursus turpis massa tincidunt dui.
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="600">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                                        <i class="bi bi-question-circle question-icon"></i>
                                        Tempus quam pellentesque nec nam aliquam sem et tortor consequat?
                                    </button>
                                </h3>
                                <div id="faq-content-5" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                        Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim
                                        suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan.
                                        Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit
                                        turpis cursus in
                                    </div>
                                </div>
                            </div><!-- # Faq item-->

                        </div>

                    </div>

                    <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                        style='background-image: url("assets/img/faq.jpg");'>&nbsp;</div>
                </div>

            </div>
        </section><!-- End F.A.Q Section --> --}}



        {{-- <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Our Team</h2>
                    <p>Architecto nobis eos vel nam quidem vitae temporibus voluptates qui hic deserunt iusto omnis nam
                        voluptas asperiores sequi tenetur dolores incidunt enim voluptatem magnam cumque fuga.</p>
                </div>

                <div class="row gy-5">

                    <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                                <h4>Walter White</h4>
                                <span>Chief Executive Officer</span>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="400">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                                <h4>Sarah Jhonson</h4>
                                <span>Product Manager</span>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="600">
                        <div class="team-member">
                            <div class="member-img">
                                <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                                <h4>William Anderson</h4>
                                <span>CTO</span>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                </div>

            </div>
        </section><!-- End Team Section --> --}}



        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-header">
                    <h2>Sekolah Vokasi Universitas Sebelas Maret</h2>
                </div>

            </div>

            <div class="map">
                <iframe
                    src="https://maps.google.com/maps?width=300&amp;height=200&amp;hl=en&amp;q=Jalan%20Kolonel%20Sutarto%20Nomor%20150K%2C%20Jebres%2C%20Surakarta%20City%2C%20Central%20Java%2057126+(Sekolah%20Vokasi)&amp;ie=UTF8&amp;t=&amp;z=12&amp;iwloc=B&amp;output=embed"
                    frameborder="0" allowfullscreen></iframe>
            </div><!-- End Google Maps -->

            <div class="container">

                <div class="row gy-5 gx-lg-5">

                    <div class="col-lg-4">

                        <div class="info">
                            <h3>Hubungi Kami</h3>


                            <div class="info-item d-flex">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h4>Lokasi:</h4>
                                    <p>Kampus Tirtomoyo, Universitas Sebelas Maret
                                        Jl. Kolonel Sutarto 150 K, Jebres, Surakarta</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Email:</h4>
                                    <p>vokasi@unit.uns.ac.id</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-phone flex-shrink-0"></i>
                                <div>
                                    <h4>Telepon:</h4>
                                    <p>0271-664126</p>
                                </div>
                            </div><!-- End Info Item -->

                        </div>

                    </div>

                    <div class="col-lg-8">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">


        <div class="footer-legal text-center">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div class="copyright">
                        &copy; Copyright <strong><span>Sekolah Vokasi | UNS</span></strong>.
                    </div>

                </div>

                <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                    <a href="https://twitter.com/vokasi_uns" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="https://www.facebook.com/vokasi.uns" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/vokasiuns" class="instagram"><i
                            class="bi bi-instagram"></i></a>
                    <a href="https://www.youtube.com/channel/UCz7StIjWe4osVgpG_ErbvWQ" class="youtube"><i
                            class="bi bi-youtube"></i></a>

                </div>

            </div>
        </div>

    </footer><!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    {{-- <div id="preloader"></div> --}}


    <!-- Vendor JS Files -->
    <script src="{{ asset('landingpage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landingpage/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('landingpage/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('landingpage/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('landingpage/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('landingpage/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ 'landingpage/assets/js/main.js' }}"></script>

</body>

</html>
