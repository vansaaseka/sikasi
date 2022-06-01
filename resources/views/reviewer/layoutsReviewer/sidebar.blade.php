<div class="sidebar-body pt-0 data-scrollbar">
    <div class="sidebar-list">
        <!-- Sidebar Menu Start -->
        <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
            <li class="nav-item static-item">
                <a class="nav-link static-item disabled" href="#" tabindex="-1">
                    <span class="default-icon">Home</span>
                    <span class="mini-icon">-</span>
                </a>
            </li>
            <li class="nav-item">

                <a class="nav-link" aria-current="page" href="{{ asset('HOPE/dashboard/index.html') }}">
                    <i class="icon">
                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4"
                                d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                fill="currentColor"></path>
                        </svg>
                    </i>
                    <span class="item-name">Dashboard</span>
                </a>
            </li>

            <li>
                <hr class="hr-horizontal">
            </li>
            <li class="nav-item static-item">
                <a class="nav-link static-item disabled" href="#" tabindex="-1">
                    <span class="default-icon">Pages</span>
                    <span class="mini-icon">-</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ 'validasi' == request()->path() ? 'active' : '' }}" href="/validasi">
                    <i class="icon">
                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4"
                                d="M2 11.0786C2.05 13.4166 2.19 17.4156 2.21 17.8566C2.281 18.7996 2.642 19.7526 3.204 20.4246C3.986 21.3676 4.949 21.7886 6.292 21.7886C8.148 21.7986 10.194 21.7986 12.181 21.7986C14.176 21.7986 16.112 21.7986 17.747 21.7886C19.071 21.7886 20.064 21.3566 20.836 20.4246C21.398 19.7526 21.759 18.7896 21.81 17.8566C21.83 17.4856 21.93 13.1446 21.99 11.0786H2Z"
                                fill="currentColor"></path>
                            <path
                                d="M11.2451 15.3843V16.6783C11.2451 17.0923 11.5811 17.4283 11.9951 17.4283C12.4091 17.4283 12.7451 17.0923 12.7451 16.6783V15.3843C12.7451 14.9703 12.4091 14.6343 11.9951 14.6343C11.5811 14.6343 11.2451 14.9703 11.2451 15.3843Z"
                                fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.211 14.5565C10.111 14.9195 9.762 15.1515 9.384 15.1015C6.833 14.7455 4.395 13.8405 2.337 12.4815C2.126 12.3435 2 12.1075 2 11.8555V8.38949C2 6.28949 3.712 4.58149 5.817 4.58149H7.784C7.972 3.12949 9.202 2.00049 10.704 2.00049H13.286C14.787 2.00049 16.018 3.12949 16.206 4.58149H18.183C20.282 4.58149 21.99 6.28949 21.99 8.38949V11.8555C21.99 12.1075 21.863 12.3425 21.654 12.4815C19.592 13.8465 17.144 14.7555 14.576 15.1105C14.541 15.1155 14.507 15.1175 14.473 15.1175C14.134 15.1175 13.831 14.8885 13.746 14.5525C13.544 13.7565 12.821 13.1995 11.99 13.1995C11.148 13.1995 10.433 13.7445 10.211 14.5565ZM13.286 3.50049H10.704C10.031 3.50049 9.469 3.96049 9.301 4.58149H14.688C14.52 3.96049 13.958 3.50049 13.286 3.50049Z"
                                fill="currentColor">
                            </path>
                        </svg>
                    </i>
                    <span class="item-name">Review Pengajuan</span>
                </a>
            </li>




        </ul>
        <!-- Sidebar Menu End -->
    </div>
</div>
<div class="sidebar-footer"></div>
