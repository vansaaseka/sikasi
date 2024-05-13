</aside>
<main class="main-content">
    <div class="position-relative">
        <!--Nav Start-->

        <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
            <div class="container-fluid navbar-inner">
                <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                    <i class="icon">
                        <svg width="20px" height="20px" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                        </svg>
                    </i>
                </div>

                <div class="input-group search-input">
                    <span class="input-group-text" id="search-input">
                        <svg width="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></circle>
                            <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                    <input type="search" class="form-control" placeholder="Search...">
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <span class="navbar-toggler-bar bar1 mt-2"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto align-items-center navbar-list mb-2 mb-lg-0">
                        {{-- Mengubah nama user --}}
                        @if (Auth()->user()->role == '0')
                            <ul class="nav-item dropdown">
                                <a class="nav-link d-flex align-items-center" href="#" id="dropdownNotification"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    @if (count($pengajuanDeadline) > 0)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                            <path
                                                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                            fill="currentColor" class="bi bi-bell-slash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.164 14H15c-.299-.199-.557-.553-.78-1-.9-1.8-1.22-5.12-1.22-6q0-.396-.06-.776l-.938.938c.02.708.157 2.154.457 3.58.161.767.377 1.566.663 2.258H6.164zm5.581-9.91a4 4 0 0 0-1.948-1.01L8 2.917l-.797.161A4 4 0 0 0 4 7c0 .628-.134 2.197-.459 3.742q-.075.358-.166.718l-1.653 1.653q.03-.055.059-.113C2.679 11.2 3 7.88 3 7c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0c.942.19 1.788.645 2.457 1.284zM10 15a2 2 0 1 1-4 0zm-9.375.625a.53.53 0 0 0 .75.75l14.75-14.75a.53.53 0 0 0-.75-.75z" />
                                        </svg>
                                    @endif
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownNotification">
                                    @if ($trxstatus->isNotEmpty())
                                        <p class="ms-2">Status Pengajuan</p>
                                        @foreach ($trxstatus as $item)
                                            <li class="dropdown-item">
                                                <p style="font-size: 14px">
                                                    Status: {{ $item->status->namastatus }} <br>
                                                    Mitra: {{ $item->pengajuan->mitra->namamitra }}
                                                </p>
                                            </li>
                                        @endforeach
                                    @else
                                        <p>Tidak ada data Status yang tersedia.</p>
                                    @endif

                                    <p class="ms-2">Deadline Mitra</p>
                                    @foreach ($pengajuanDeadline as $item)
                                        <li class="dropdown-item">
                                            <p style="font-size: 14px">
                                                <i class="bi bi-exclamation-circle"></i>
                                                {{ $item->mitra->namamitra }} <br>
                                                <span style="font-size: 11px" class="text-secondary">Tanggal
                                                    Berakhir:</span>
                                                <label for="" style="font-size: 11px" class="text-secondary">
                                                    {{ \Carbon\Carbon::parse($item->tanggalakhir)->format('d M Y') }}
                                                </label>
                                            </p>
                                        </li>
                                    @endforeach
                                </ul>
                            </ul>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="nav-link py-0 d-flex align-items-center" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">


                                <?php if (empty(Auth::user()->photo) || Auth::user()->photo == 'NULL') {?>
                                <img src="{{ asset('HOPE/assets/images/avatars/01.png') }}" alt="User-Profile"
                                    class="img-fluid avatar avatar-50 avatar-rounded">
                                <?php } ?>

                                <?php if (!empty(Auth::user()->photo)) {?>
                                <img src="{{ asset(Auth::user()->photo) }}" alt="User-Profile"
                                    class="img-fluid avatar avatar-50 avatar-rounded">

                                <?php } ?>

                                <div class="caption ms-3 d-none d-md-block ">
                                    <h6 class="mb-0 caption-title"><?= Auth::user()->name ?></h6>

                                </div>

                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                {{-- <li><a class="dropdown-item disabled" href="/profileDosen">Profile</a></li> --}}
                                <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item"
                                onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>



        <div class="iq-navbar-header" style="height: 215px;">
            <div class="container-fluid iq-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div>
                                <br />
                                <h4>Sistem Informasi Kerja Sama Sekolah Vokasi
                                </h4>
                                <hr class="dropdown-divider">

                                <h5 style="text-align: center">
                                    Selamat Datang <?= Auth::user()->name ?></h5>
                            </div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="iq-header-img">
                <img src="{{ asset('HOPE/assets/images/dashboard/top-header.png') }}" alt="header"
                    class="img-fluid w-100 h-100">
            </div>
        </div>
        <!-- Nav Header Component End -->
        <!--Nav End-->
    </div>
