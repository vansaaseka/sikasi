<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIKASI LOGIN</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="HOPE/assets/css/core/libs.min.css" />


    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="HOPE/assets/css/hope-ui.min.css?v=1.1.0" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="HOPE/assets/css/custom.min.css?v=1.1.0" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="HOPE/assets/css/dark.min.css" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="HOPE/assets/css/rtl.min.css" />
</head>

<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->
    <div class="wrapper">
        <section class="login-content">
            <div class="row m-0 align-items-center bg-white vh-100">
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                                <div class="card-body">
                                    <a href="HOPE/dashboard/index.html"
                                        class="navbar-brand d-flex align-items-center mb-3">
                                        <!--Logo start-->

                                        <img src="SIKASI.png" width="216" height="100">
                                        <!--logo End-->
                                    </a>
                                    <h2 class="mb-2 text-center">Login</h2>
                                    <p class="text-center">Sistem Informasi Kerjasama Sekolah Vokasi UNS</p>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" id="email" aria-describedby="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email" autofocus
                                                        placeholder="Enter Email Address">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" id="password" aria-describedby="password"
                                                        class="form-control  @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="current-password"
                                                        placeholder="Enter Paswword">
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-12 d-flex justify-content-between">
                                                <div class="form-check mb-3">
                                                    <input type="checkbox" class="form-check-input" id="customCheck1"
                                                        {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="customCheck1">Remember
                                                        Me</label>
                                                </div>
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                                                @endif
                                            </div> --}}
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary">Login</button>
                                        </div>
                                        {{-- <p class="text-center my-3">or sign in with other accounts?</p>
                              <div class="d-flex justify-content-center">
                                 <ul class="list-group list-group-horizontal list-group-flush">
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="HOPE/assets/images/brands/fb.svg" alt="fb"></a>
                                    </li>
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="HOPE/assets/images/brands/gm.svg" alt="gm"></a>
                                    </li>
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="HOPE/assets/images/brands/im.svg" alt="im"></a>
                                    </li>
                                    <li class="list-group-item border-0 pb-0">
                                       <a href="#"><img src="HOPE/assets/images/brands/li.svg" alt="li"></a>
                                    </li>
                                 </ul>
                              </div> --}}

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
                    <img src="HOPE/assets/images/auth/01.png" class="img-fluid gradient-main animated-scaleX"
                        alt="images">
                </div>
            </div>
        </section>
        @include('sweetalert::alert')
    </div>

    <!-- Library Bundle Script -->
    <script src="HOPE/assets/js/core/libs.min.js"></script>

    <!-- External Library Bundle Script -->
    <script src="HOPE/assets/js/core/external.min.js"></script>

    <!-- Widgetchart Script -->
    <script src="HOPE/assets/js/charts/widgetcharts.js"></script>

    <!-- mapchart Script -->
    <script src="HOPE/assets/js/charts/vectore-chart.js"></script>
    <script src="HOPE/assets/js/charts/dashboard.js" defer></script>

    <!-- fslightbox Script -->
    <script src="HOPE/assets/js/plugins/fslightbox.js"></script>

    <!-- Settings Script -->
    <script src="HOPE/assets/js/plugins/setting.js"></script>

    <!-- Form Wizard Script -->
    <script src="HOPE/assets/js/plugins/form-wizard.js"></script>

    <!-- AOS Animation Plugin-->

    <!-- App Script -->
    <script src="HOPE/assets/js/hope-ui.js" defer></script>
</body>

</html>
