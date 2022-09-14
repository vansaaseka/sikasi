<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DzaFolio</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('portfolio/assets//img/favicon.ico') }}" rel="icon">
    <link href="{{ asset('portfolio/assets//img/hero-bg.png') }}" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('portfolio/assets//vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('portfolio/assets//vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('portfolio/assets//vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('portfolio/assets//vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('portfolio/assets//css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: DzaFolio - v4.8.1
  * Template URL: https://bootstrapmade.com/DzaFolio-bootstrap-portfolio-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.html">DzaFolio</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="{{ asset('portfolio/assets//img/logo.png') }}" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#resume">Resume</a></li>
                    <li><a class="nav-link scrollto " href="#work">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <div id="hero" class="hero route bg-image" style="background-image: url(portfolio/assets/img/hero-bg.png)">
        <div class="overlay-itro"></div>
        <div class="hero-content display-table">
            <div class="table-cell">
                <div class="container">
                    <!--<p class="display-6 color-d">Hello, world!</p>-->
                    <h1 class="hero-title mb-4">I am Syadza Tsurayya Eden</h1>
                    <p class="hero-subtitle"><span class="typed"
                            data-typed-items="Web Developer, UI/UX Designer, Freelancer"></span></p>
                    <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
                    <div class="socials">
                        <ul>
                            <li><a href="mailto:syadzatsurayya27@gmail.com"><span class="ico-circle"><i
                                            class="bi bi-envelope"></i></span></a>
                            </li>
                            <li><a href="https://www.linkedin.com/in/syadza-tsurayya-711a7a1b6/"><span
                                        class="ico-circle"><i class="bi bi-linkedin"></i></span></a>
                            </li>
                            <li><a href="https://www.instagram.com/st_rayya/"><span class="ico-circle"><i
                                            class="bi bi-instagram"></i></span></a>
                            </li>
                            <li><a href="https://dribbble.com/syadza27"><span class="ico-circle"><i
                                            class="bi bi-dribbble"></i></span></a></li>

                        </ul>
                    </div>
                    {{-- <div class="col-md-12 text-center">
                        <button type="submit"class="button button-a button-big button-rouded"> Download CV <i
                                class="bi bi-download"></i> </button>
                    </div> --}}
                </div>

            </div>
        </div>
    </div><!-- End Hero Section -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about-mf sect-pt4 route">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-shadow-full">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="about-img">
                                                <img src="{{ asset('portfolio/assets//img/testimonial-2.jpg') }}"
                                                    class="img-fluid rounded b-shadow-a" alt="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-8">
                                            <div class="about-info">
                                                <p><span class="title-s">Name: </span> <span>Syadza Tsurayya
                                                        Eden</span>
                                                </p>
                                                <p><span class="title-s">Profile: </span> <span>Web Developer | UI/UX
                                                        Designer
                                                    </span></p>
                                                <p><span class="title-s">Email: </span>
                                                    <span>syadzatsurayya272gmail.com</span>
                                                </p>
                                                <p><span class="title-s">Phone: </span> <span>(+62) 82234689504</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="skill-mf">
                                        <p class="title-s">Skill</p>
                                        <span>HTML</span> <span class="pull-right">85%</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 85%;"
                                                aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span>CSS3</span> <span class="pull-right">75%</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 75%"
                                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span>PHP</span> <span class="pull-right">80%</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 80%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span>JAVASCRIPT</span> <span class="pull-right">50%</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 50%"
                                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span>FIGMA</span> <span class="pull-right">90%</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 90%"
                                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span>COREL DRAW</span> <span class="pull-right">80%</span>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 80%"
                                                aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="about-me pt-4 pt-md-0">
                                        <div class="title-box-2">
                                            <h5 class="title-left">
                                                About me
                                            </h5>
                                        </div>
                                        <p class="lead">
                                            I am a graduate of the Department of Informatics Engineering at Universitas
                                            Sebelas Maret. I like to learn all things
                                            about software enginner especially in the field of web development, ui/ux
                                            designer, and design by discussing and working with the team!
                                        </p>
                                        <p class="lead">
                                            I currently based in Surakarta. My especially goal is
                                            to master my UI/UX Designer skills so can make people's lives as easy as
                                            they want them to be. Those who have high motivation to keep learning and
                                            looking for experiences around me and by creating experiences for others.
                                            And right now I am looking forward to collaborate with you!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

        <!-- ======= Resume Section ======= -->
        <section id="resume" class="resume">
            <div class="container">

                <div class="title-box text-center">
                    <h3 class="title-a">
                        Resume
                    </h3>
                    <p class="subtitle-a">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    </p>
                    <div class="line-mf"></div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="resume-title">Education</h3>
                        <div class="resume-item pb-0">
                            <h4>Diploma 3 (D3) of Informatic Engineering</h4>

                            <p><em>Sebelas Maret University</em></p>
                            <p>
                            <h5>2019 - 2022</h5>
                            <ul>
                                <li>Final year project focused on : Web Development</li>
                                <li>CGPA : </li>
                            </ul>
                            </p>
                        </div>

                        <h3 class="resume-title">Organization</h3>
                        <div class="resume-item">
                            <h4>E-Mailkomp</h4>
                            <h5>2019 - 2020</h5>
                            <p><em>Staff of Personnel Bureau</em></p>
                            <ul>Improving the skills, expertise and work professionalism of all E-Mailkomp management
                                Strengthen and strengthen the sense of kinship between the management
                                Establish and maintain relationships both internally and externally</ul>
                        </div>
                        <div class="resume-item">
                            <h4>University Student Executive Board</h4>
                            <h5>2020 - 2021</h5>
                            <p><em>Staff of Student Resource Development</em></p>
                            <ul>
                                <li>Responsible for regeneration, coaching skills, abilities, knowledge and leadership
                                    of all
                                    students</li>
                                <li>Responsible for UNS Middle-level Student Managerial Leadership Training
                                    activities</li>
                            </ul>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h3 class="resume-title">Experience</h3>
                        <div class="resume-item">
                            <h4>Apps Developer</h4>
                            <h5>2021 - 2022</h5>
                            <p><em>Intern at M-Knows Consulting</em></p>
                            <p>
                            <ul>
                                <li>Develop Learning Management System Application with Flutter Using The SCRUM Working
                                    Methode </li>
                                <li>Compiling Work Breakdown Structure to define features use in apps</li>
                                <li>Designing the appearance of the application to facilitate the user experience in
                                    using the application, especially in the profile </li>
                            </ul>
                            </p>
                        </div>
                        <div class="resume-item">
                            <h4>Web Developer</h4>
                            <h5>2022</h5>
                            <p><em>Intern at Vocational School - UNS</em></p>
                            <p>
                            <ul>
                                <li>Develop a website regarding the submission of collaboration with external parties
                                    dynamically and responsively using Laravel</li>
                            </ul>
                            </p>
                        </div>
                        <div class="resume-item">
                            <h4>UI/UX Designer</h4>
                            <h5>2022</h5>
                            <p><em>Study Independent at Binar Academy</em></p>
                            <p>
                            <ul>
                                <li>Understand and apply the concept of design thinking in UI/UX designer</li>
                                <li>Designing application base on case studies: financial technology</li>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Resume Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="work" class="portfolio-mf sect-pt4 route">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box text-center">
                            <h3 class="title-a">
                                Portfolio
                            </h3>
                            <p class="subtitle-a">
                                Designing to do list application base case study
                            </p>
                            <div class="line-mf"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="work-box">
                            <a href="{{ asset('portfolio/assets//img/work-6.jpg') }}" data-gallery="portfolioGallery"
                                class="portfolio-lightbox">
                                <div class="work-img">
                                    <img src="{{ asset('portfolio/assets//img/work-6.jpg') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </a>
                            <div class="work-content">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h2 class="w-title">Developing Submission of Collaboration Website </h2>
                                        <div class="w-more">
                                            <span class="w-ctegory">Developing website</span> - <span
                                                class="w-date">2022</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="w-like">
                                            <a href="http://m3119084.mhs.d3tiuns.com/login"> <span
                                                    class="bi bi-plus-circle"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="work-box">
                            <a href="{{ asset('portfolio/assets//img/work-4.jpg') }}" data-gallery="portfolioGallery"
                                class="portfolio-lightbox">
                                <div class="work-img">
                                    <img src="{{ asset('portfolio/assets//img/work-4.jpg') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </a>
                            <div class="work-content">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h2 class="w-title">Developing Submission of Collaboration Landingpage</h2>
                                        <div class="w-more">
                                            <span class="w-ctegory">Developing website</span> - <span
                                                class="w-date">2022</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="w-like">
                                            <a href="http://m3119084.mhs.d3tiuns.com/"> <span
                                                    class="bi bi-plus-circle"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="work-box">
                            <a href="{{ asset('portfolio/assets//img/work-3.jpg') }}" data-gallery="portfolioGallery"
                                class="portfolio-lightbox">
                                <div class="work-img">
                                    <img src="{{ asset('portfolio/assets//img/work-3.jpg') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </a>
                            <div class="work-content">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h2 class="w-title">Designing Coffe Order Application</h2>
                                        <div class="w-more">
                                            <span class="w-ctegory">UI/UX Design - Case Study</span> - <span
                                                class="w-date">
                                                2022</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="w-like">
                                            <a
                                                href="https://www.behance.net/gallery/144685989/Study-Case-UIUX-Ordinary-Cafe-App/modules/817339215">
                                                <span class="bi bi-plus-circle"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="work-box">
                            <a href="{{ asset('portfolio/assets//img/work-2.jpg') }}" data-gallery="portfolioGallery"
                                class="portfolio-lightbox">
                                <div class="work-img">
                                    <img src="{{ asset('portfolio/assets//img/work-2.jpg') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </a>
                            <div class="work-content">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h2 class="w-title">Designing Fintech Application</h2>
                                        <div class="w-more">
                                            <span class="w-ctegory">UI/UX Design - Case Study</span> - <span
                                                class="w-date">
                                                2022</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="w-like">
                                            <a
                                                href="https://www.figma.com/proto/Oow7r8zZxZRuHFQNLLfuQP/Final-Project-Fintech-Kelompok-3?page-id=1028%3A5507&node-id=1380%3A8714&scaling=min-zoom&starting-point-node-id=1300%3A8054">
                                                <span class="bi bi-plus-circle"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="work-box">
                            <a href="{{ asset('portfolio/assets//img/work-5.jpg') }}" data-gallery="portfolioGallery"
                                class="portfolio-lightbox">
                                <div class="work-img">
                                    <img src="{{ asset('portfolio/assets//img/work-5.jpg') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </a>
                            <div class="work-content">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h2 class="w-title">Redesign My Telkomsel Application</h2>
                                        <div class="w-more">
                                            <span class="w-ctegory">UI/UX Designer</span> - <span
                                                class="w-date">2022</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="w-like">
                                            <a
                                                href="https://www.figma.com/file/MyW9gLU97jMdISZoEOYLo8/Redesign-My-Telkomsel?node-id=17%3A2">
                                                <span class="bi bi-plus-circle"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="work-box">
                            <a href="{{ asset('portfolio/assets//img/work-1.jpg" data-gallery="portfolioGallery') }}"
                                class="portfolio-lightbox">
                                <div class="work-img">
                                    <img src="{{ asset('portfolio/assets//img/work-1.jpg') }}" alt=""
                                        class="img-fluid">
                                </div>
                            </a>
                            <div class="work-content">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <h2 class="w-title"> Designing To Do List Application</h2>
                                        <div class="w-more">
                                            <span class="w-ctegory">UI/UX Design - Case Study</span> - <span
                                                class="w-date">
                                                2022</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="w-like">
                                            <a
                                                href="https://www.figma.com/proto/W7GV7jHBWsgi2oce50i048/To-do-list-App---Study-Case-MOA?page-id=2%3A2&node-id=54%3A219&viewport=249%2C331%2C0.12&scaling=min-zoom&starting-point-node-id=54%3A219">
                                                <span class="bi bi-plus-circle"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section><!-- End Portfolio Section -->


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="paralax-mf footer-paralax bg-image sect-mt4 route"
            style="background-image: url(assets/img/overlay-bg.jpg)">
            {{-- <div class="overlay-mf"></div> --}}
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="contact-mf">
                            {{-- <div id="contact" class="box-shadow-full"> --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="title-box-2 pt-4 pt-md-0">
                                        <h5 class="title-left">
                                            Get in Touch
                                        </h5>
                                    </div>

                                    <div class="socials" align-item="center">
                                        <ul>
                                            <li><a href="mailto:syadzatsurayya27@gmail.com"><span
                                                        class="ico-circle"><i class="bi bi-envelope"></i></span></a>
                                            </li>
                                            <li><a href="https://www.linkedin.com/in/syadza-tsurayya-711a7a1b6/"><span
                                                        class="ico-circle"><i class="bi bi-linkedin"></i></span></a>
                                            </li>
                                            <li><a href="https://www.instagram.com/st_rayya/"><span
                                                        class="ico-circle"><i class="bi bi-instagram"></i></span></a>
                                            </li>
                                            <li><a href="https://dribbble.com/syadza27"><span class="ico-circle"><i
                                                            class="bi bi-dribbble"></i></span></a></li>

                                        </ul>
                                    </div>
                                    <br />
                                    <br />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="copyright-box">
                        <p class="copyright">&copy; Copyright <strong>DzaFolio</strong>. All Rights Reserved</p>
                        <div class="credits">
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('portfolio/assets//vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('portfolio/assets//vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('portfolio/assets//vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('portfolio/assets//vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('portfolio/assets//vendor/typed.js/typed.min.js') }}"></script>
    <script src="{{ asset('portfolio/assets//vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('portfolio/assets//js/main.js') }}"></script>

</body>

</html>
