@include('reviewer/layoutsReviewer/header')

@include('reviewer/layoutsReviewer/sidebar')

@include('navbardashboard')

@include('sweetalert::alert')

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="row">
                <div class="col-md-12 col-xl-6">
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
                <div class="col-md-12 col-xl-6">
                    <div class="card" data-aos="fade-up" data-aos-delay="1000">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title">Selesai Pengajuan</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="selesai" class="selesai"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row row-cols-1">
            <div class="d-slider1 overflow-hidden ">
                <ul class="swiper-wrapper list-inline m-0 p-0 mb-2">
                    <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                        <div class="card-body">
                            <div class="progress-widget">
                                <div id="circle-progress-01"
                                    class="circle-progress-01 circle-progress circle-progress-primary text-center"
                                    data-min-value="0" data-max-value="100" data-value="90" data-type="percent">
                                    <svg class="card-slie-arrow " width="24" height="24px" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                    </svg>
                                </div>
                                <div class="progress-detail">
                                    <p class="mb-2">Belum Validasi</p>
                                    <h4 class="counter">{{ $belum_validasi }}</h4>
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
                                    <svg class="card-slie-arrow " width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                    </svg>
                                </div>
                                <div class="progress-detail">
                                    <p class="mb-2">Proses Validasi</p>
                                    <h4 class="counter">{{ $proses_validasi }}</h4>
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
                                    <p class="mb-2">Selesai Validasi</p>
                                    <h4 class="counter">{{ $selesai_validasi }}</h4>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="swiper-button swiper-button-next"></div>
                <div class="swiper-button swiper-button-prev"></div>
            </div>
        </div> --}}
    </div>
</div>
</div>



@include('reviewer/layoutsReviewer/footer')

<script>
    (function(jQuery) {
        "use strict";
        if (jQuery('#d-activity').length) {
            const options = {
                series: [

                    {
                        name: 'Pengajuan',
                        data: [{!! json_encode($total) !!}, {!! json_encode($total_pks) !!}, {!! json_encode($total_mou) !!}]
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
                    categories: [
                        "Total", "PKS", "Mou"
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
                            return val + " pengajuan"
                        }
                    }
                }
            };

            const chart = new ApexCharts(document.querySelector("#d-activity"), options);
            chart.render();
        }
        if (jQuery('#selesai').length) {
            const options = {
                series: [

                    {
                        name: 'Selesai Pengajuan',
                        data: [{!! json_encode($selesai) !!}, {!! json_encode($selesai_pks) !!}, {!! json_encode($selesai_mou) !!}]
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
                    categories: [
                        "Total",
                        "PKS",
                        "Mou"
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

            const chart = new ApexCharts(document.querySelector("#selesai"), options);
            chart.render();
        }
    })(jQuery)
</script>
