@include('admin/layoutsAdmin/header')

@include('admin/layoutsAdmin/sidebar')

@include('navbardashboard')

@include('sweetalert::alert')



<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="row row-cols-1">
                <div class="col-md-12 col-xl-12">
                    <div class="card" data-aos="fade-up" data-aos-delay="1000">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title">Pengajuan</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="d-activity" class="d-activity"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-12">
                    <div class="card" data-aos="fade-up" data-aos-delay="1000">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title">Kategori Mitra</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="card-body">
                                    <div id="d-category" class="d-category"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-6">
                                <div class="card-body">
                                    <h6><b>Keterangan</b></h6>
                                    <br>
                                    <p>01 - Perusahaan multinasinal</p>
                                    <p>02 - Perusahaan nasionan berstandar tinggi</p>
                                    <p>03 - Perusahaan teknologi global</p>
                                    <p>04 - Perusahaan rintisan (startup company) teknologi</p>
                                    <p>05 - Organisasi nirlaba kelas dunia </p>
                                    <p>06 - Institusi/organisasi multilateral</p>
                                    <p>07 - Perguruan tinggi yang masuk dalam daftar QS100 berdasarkan ilmu (QS100 by
                                        subject)</p>
                                    <p>08 - Perguruan tinggi, fakultas, atau program studi dalam bidang yang relevan
                                        (univ vokasi)</p>
                                    <p>09 - Instansi pemerintah, BUMN dan/atau BUMD</p>
                                    <p>10 - Rumah sakit</p>
                                    <p>11 - UMKM</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="d-slider1 overflow-hidden ">
                        <ul class="swiper-wrapper list-inline m-0 p-0 mb-2">
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        <div id="circle-progress-01"
                                            class="circle-progress-01 circle-progress circle-progress-primary text-center"
                                            data-min-value="0" data-max-value="100" data-value="90" data-type="percent">
                                            <svg class="card-slie-arrow " width="24" height="24px"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Total Pengajuan</p>
                                            <h4 class="counter">{{ $total_ajuan }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        <div id="circle-progress-02"
                                            class="circle-progress-01 circle-progress circle-progress-info text-center"
                                            data-min-value="0" data-max-value="100" data-value="80" data-type="percent">
                                            <svg class="card-slie-arrow " width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Pengajuan PKS</p>
                                            <h4 class="counter">{{ $proses_pks }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        <div id="circle-progress-03"
                                            class="circle-progress-01 circle-progress circle-progress-primary text-center"
                                            data-min-value="0" data-max-value="100" data-value="70" data-type="percent">
                                            <svg class="card-slie-arrow " width="24" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Pengajuan MoU</p>
                                            <h4 class="counter">{{ $proses_mou }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div class="swiper-button swiper-button-next"></div>
                        <div class="swiper-button swiper-button-prev"></div>
                    </div>


                    <div class="d-slider1 overflow-hidden ">
                        <ul class="swiper-wrapper list-inline m-0 p-0 mb-2">
                            @php $i = 1;@endphp
                            @foreach ($prodi as $p)
                                <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                                    <div class="card-body">
                                        <div class="progress-widget">
                                            <div id="circle-progress-{{ $i++ }}"
                                                class="circle-progress-01 circle-progress circle-progress-primary text-center"
                                                data-min-value="0" data-max-value="100" data-value="90"
                                                data-type="percent">
                                                <svg class="card-slie-arrow " width="24" height="24px"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                                </svg>
                                            </div>
                                            <div class="progress-detail">
                                                <a href="/detail/{{ $p->id }}"
                                                    class="mb-2">{{ $p->namaprodi }}</a>
                                                @php $jumlah = App\Models\Pengajuan::where('prodiid', $p->id)->count(); @endphp
                                                <h4 class="counter">{{ $jumlah }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <div class="swiper-button swiper-button-next"></div>
                        <div class="swiper-button swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin/layoutsAdmin/footer')

        <script>
            (function(jQuery) {
                "use strict";
                if (jQuery('#d-activity').length) {
                    const options = {
                        series: [

                            {
                                name: 'Pengajuan',
                                data: [{!! json_encode($total_juli) !!}, {!! json_encode($total_agus) !!}, {!! json_encode($total_sept) !!},
                                    {!! json_encode($total_okto) !!}, {!! json_encode($total_nove) !!}, {!! json_encode($total_dese) !!},
                                    {!! json_encode($total_jan) !!}, {!! json_encode($total_feb) !!}, {!! json_encode($total_mar) !!},
                                    {!! json_encode($total_apr) !!}, {!! json_encode($total_mei) !!}, {!! json_encode($total_jun) !!}
                                ]
                            }
                        ],
                        chart: {
                            type: 'bar',
                            height: 230,
                            stacked: true,
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ["#3a57e8", "#4bc7d2"],
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '28%',
                                endingShape: 'rounded',
                                borderRadius: 5,
                            },
                        },
                        legend: {
                            show: false
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['transparent']
                        },
                        xaxis: {
                            categories: ["Juli",
                                "Agustus", "September",
                                "Oktober", "November", "Desember", "Januari", "Februari", "Maret", "April", "Mei",
                                "Juni"
                            ],
                            labels: {
                                minHeight: 20,
                                maxHeight: 20,
                                style: {
                                    colors: "#8A92A6",
                                },
                            }
                        },
                        yaxis: {
                            title: {
                                text: ''

                            },
                            labels: {
                                minWidth: 19,
                                maxWidth: 19,
                                style: {
                                    colors: "#8A92A6",
                                },
                            }
                        },
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return val + " pengajuan"
                                }
                            }
                        }
                    };

                    const chart = new ApexCharts(document.querySelector("#d-activity"), options);
                    chart.render();
                }
                if (jQuery('#d-category').length) {
                    const options = {
                        series: [

                            {
                                name: 'Kategori Mitra',
                                data: [{!! json_encode($kategori1) !!}, {!! json_encode($kategori2) !!}, {!! json_encode($kategori3) !!},
                                    {!! json_encode($kategori4) !!}, {!! json_encode($kategori5) !!},
                                    {!! json_encode($kategori6) !!},
                                    {!! json_encode($kategori7) !!}, {!! json_encode($kategori8) !!},
                                    {!! json_encode($kategori9) !!},
                                    {!! json_encode($kategori10) !!}, {!! json_encode($kategori11) !!}
                                ]
                            }
                        ],
                        chart: {
                            type: 'bar',
                            height: 230,
                            stacked: true,
                            toolbar: {
                                show: false
                            }
                        },
                        colors: ["#4bc7d2"],
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '28%',
                                endingShape: 'rounded',
                                borderRadius: 5,
                            },
                        },
                        legend: {
                            show: false
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['transparent']
                        },
                        xaxis: {
                            categories: ["01", "02",
                                "03",
                                "04",
                                "05",
                                "06",
                                "07",
                                "08",
                                "09",
                                "10",
                                "11"
                            ],
                            labels: {
                                minHeight: 20,
                                maxHeight: 20,
                                style: {
                                    colors: "#8A92A6",
                                },
                            }
                        },
                        yaxis: {
                            title: {
                                text: 'Jumlah'

                            },
                            labels: {
                                minWidth: 19,
                                maxWidth: 19,
                                style: {
                                    colors: "#8A92A6",
                                },
                            }
                        },
                        fill: {
                            opacity: 1
                        },
                        tooltip: {
                            y: {
                                formatter: function(val) {
                                    return val
                                }
                            }
                        }
                    };

                    const chart = new ApexCharts(document.querySelector("#d-category"), options);
                    chart.render();
                }
            })(jQuery)
        </script>
