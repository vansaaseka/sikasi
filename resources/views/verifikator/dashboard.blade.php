@include('verifikator/layoutsVerifikator/header')

@include('verifikator/layoutsVerifikator/sidebar')

@include('navbardashboard')


<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="row">
                <div class="col-md-12 col-xl-4">
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
                <div class="col-md-12 col-xl-4">
                    <div class="card" data-aos="fade-up" data-aos-delay="1000">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title">Proses Pengajuan</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="proses" class="proses"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-4">
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


    </div>
</div>





@include('verifikator/layoutsVerifikator/footer')
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
        if (jQuery('#proses').length) {
            const options = {
                series: [

                    {
                        name: 'Proses Pengajuan',
                        data: [{!! json_encode($proses) !!}, {!! json_encode($proses_pks) !!}, {!! json_encode($proses_mou) !!}]
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
                colors: ["#3AE8C2"],
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

            const chart = new ApexCharts(document.querySelector("#proses"), options);
            chart.render();
        }
    })(jQuery)
</script>
