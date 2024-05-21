@include('dosen/layoutsDosen/header')

@include('dosen/layoutsDosen/sidebar')

@include('navbardashboard')
@include('sweetalert::alert')


<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="row row-cols-1">
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
                                        <p class="mb-2">Total Pengajuan</p>
                                        <h4 class="counter">{{ $pengajuan_user }}</h4>
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
                                        <p class="mb-2">Proses Pengajuan</p>
                                        <h4 class="counter">{{ $proses_pengajuan }}</h4>
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
                                        <p class="mb-2">Selesai Pengajuan</p>
                                        <h4 class="counter">{{ $totalselesai }}</h4>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                            <div class="card-body">
                                <div class="progress-widget">
                                    <div id="circle-progress-04"
                                        class="circle-progress-01 circle-progress circle-progress-success text-center"
                                        data-min-value="0" data-max-value="100" data-value="70" data-type="percent">
                                        <svg class="card-slie-arrow " width="24" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                        </svg>
                                    </div>
                                    <div class="progress-detail">
                                        <p class="mb-2">Total Kerja Sama</p>
                                        <h4 class="counter">{{ $kerjasama }}</h4>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="swiper-button swiper-button-next"></div>
                    <div class="swiper-button swiper-button-prev"></div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="row row-cols-1">
                <div class="col-md-6 col-xl-6">
                    <div class="card" data-aos="fade-up" data-aos-delay="1000">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title">Status Kerja Sama</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container" style="position: relative; height:400px;">
                                <div id="chartStatusPengajuan"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-6">
                    <div class="card" data-aos="fade-up" data-aos-delay="1000">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title">Mitra Kategori</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container" style="position: relative; height:400px;">
                                <canvas id="chartPieMitraKategori"></canvas>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="row row-cols-1">
                <div class="col-md-6 col-xl-5">
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
                <div class="col-md-12 col-xl-7">
                    <div class="card" data-aos="fade-up" data-aos-delay="1000">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title">Kategori Mitra</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-6">
                                <div class="card-body">
                                    <div id="pie-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6 col-xl-6">
                    <div class="card" data-aos="fade-up" data-aos-delay="1000">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title">Proses Dokumen Kerjasama</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="activity-bar"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-6">
                    <div class="card" data-aos="fade-up" data-aos-delay="1000">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title">Kategori Pengajuan</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="kategori_pengajuan" class="d-activity"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Mitra Sharing</h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive mt-4">
                                <table id="datatable" class="table table-striped" data-toggle="data-table">
                                    <thead>
                                        <tr>
                                            <th>Nama Mitra</th>
                                            <th>Prodi Terlibat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mitraSharing as $pengajuan)
                                            @php
                                                $proditerlibatIds = json_decode($pengajuan->proditerlibat_id, true);
                                                $jumlahId = count($proditerlibatIds);
                                            @endphp

                                            @if ($jumlahId >= 2)
                                                <tr>
                                                    <td>{{ $pengajuan->mitra->namamitra }}</td>
                                                    <td>
                                                        @foreach ($proditerlibatIds as $prodiItem)
                                                            @php
                                                                $prodiId = $prodiItem['id'];
                                                                $prodi = App\Models\Prodi::find($prodiId);
                                                            @endphp
                                                            @if ($prodi)
                                                                {{ $prodi->namaprodi }}
                                                                @if (!$loop->last)
                                                                    <br>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mb-5">
                    <h2>Total Pengajuan Kerja Sama</h2>
                </div>
                @foreach ($prodis as $p)
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="text-primary mb-0">
                                        <a href="/detail/{{ $p->id }}" class="mb-2">{{ $p->namaprodi }}</a>
                                    </h6>
                                    @php $jumlah = App\Models\Pengajuan::where('prodiid', $p->id)->count(); @endphp
                                    <h4 class="text-dark mb-0">{{ $jumlah }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    (function(jQuery) {
        "use strict";
        if (jQuery('#d-activity').length) {
            const PengajuanOptions = {
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

            const PengajuanChart = new ApexCharts(document.querySelector("#d-activity"), PengajuanOptions);
            PengajuanChart.render();
        }
        if (jQuery('#pie-chart').length) {
            const data = [{
                    x: "Perusahaan nasional berstandar tinggi",
                    y: {!! json_encode($kategori1) !!}
                },
                {
                    x: "Perusahaan teknologi global",
                    y: {!! json_encode($kategori2) !!}
                },
                {
                    x: "Perusahaan rintisan (startup company) teknologi",
                    y: {!! json_encode($kategori3) !!}
                },
                {
                    x: "Organisasi nirlaba kelas dunia",
                    y: {!! json_encode($kategori4) !!}
                },
                {
                    x: "Institusi/organisasi multilateral",
                    y: {!! json_encode($kategori5) !!}
                },
                {
                    x: "Perguruan tinggi yang masuk dalam daftar QS100 berdasarkan ilmu (QS100 by subject)",
                    y: {!! json_encode($kategori6) !!}
                },
                {
                    x: "Perguruan tinggi, fakultas, atau program studi dalam bidang yang relevan (univ vokasi)",
                    y: {!! json_encode($kategori7) !!}
                },
                {
                    x: "Instansi pemerintah, BUMN dan/atau BUMD",
                    y: {!! json_encode($kategori8) !!}
                },
                {
                    x: "Rumah sakit",
                    y: {!! json_encode($kategori9) !!}
                },
                {
                    x: "UMKM",
                    y: {!! json_encode($kategori10) !!}
                },
            ];
            const PieOptions = {
                chart: {
                    type: 'pie',
                    width: 800,
                },
                labels: data.map(item => item.x),
                series: data.map(item => item.y),
                colors: ["#4bc7d2", "#3a57e8", "#FF0000", "#FFA500", "#FFFF00", "#00FF00", "#0000FF", "#4B0082",
                    "#8A2BE2",
                    "#FF1493", "#FF4500"
                ],
                legend: {
                    show: true,
                    position: 'right',

                },
                responsive: [{
                    breakpoint: 230,
                    options: {
                        chart: {
                            width: 400
                        },
                        legend: {
                            position: 'right'
                        }
                    }
                }]
            };

            const PieChart = new ApexCharts(document.querySelector("#pie-chart"), PieOptions);
            PieChart.render();
        }

        if (jQuery('#activity-bar').length) {
            var statusCounts = {!! json_encode($statusCounts) !!};


            var years = ['2021', '2022', '2023', '2024'];
            var seriesData = [];

            var colors = ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0', '#00D8B6', '#FFD601', '#546E7A',
                '#26a69a', '#D10CE8', '#FF7F00'
            ];

            Object.keys(statusCounts).forEach((status, index) => {
                var data = [];
                years.forEach(year => {
                    data.push(statusCounts[status][year] ||
                        0);
                });

                seriesData.push({
                    name: status,
                    data: data,
                    color: colors[index % colors.length],
                });
            });


            var options = {
                chart: {
                    type: 'bar',
                    height: 260,
                    stacked: true,
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        columnWidth: '50%',
                    },
                },
                stroke: {
                    width: 1,
                    colors: ['#fff'],
                },
                series: seriesData,
                xaxis: {
                    categories: years,
                },
                fill: {
                    opacity: 1,
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'left',
                },
            };

            var chart = new ApexCharts(document.querySelector("#activity-bar"), options);
            chart.render();
        }

        if (jQuery('#kategori_pengajuan').length) {
            const options = {
                series: [

                    {
                        name: 'Pengajuan',
                        data: [{!! json_encode($total) !!}, {!! json_encode($total_pks) !!}, {!! json_encode($total_mou) !!},
                            {!! json_encode($total_pksTurunan) !!}, {!! json_encode($total_addendum) !!},
                            {!! json_encode($total_pksPerpanjangan) !!},
                            {!! json_encode($total_mouPerpanjangan) !!}
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
                    categories: [
                        "Total", "PKS", "Mou", "PKS Turunan dari PKS Induk", "Addendum PKS",
                        "PKS (perpanjangan)",
                        "Mou (Perpanjangan)",
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

            const ChartKategoriPengajuan = new ApexCharts(document.querySelector("#kategori_pengajuan"), options);
            ChartKategoriPengajuan.render();
        }


    })(jQuery)
</script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '/getChartData',
            method: 'GET',
            success: function(data) {
                var options = {
                    chart: {
                        type: 'bar',
                        height: 350,
                    },
                    colors: ['#3a57e8', '#3a57e8', '#3a57e8'],
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '28%',
                            endingShape: 'rounded',
                            borderRadius: 5,
                        },
                    },
                    dataLabels: {
                        enabled: true
                    },
                    series: [{
                        name: 'Status Kerja Sama',
                        data: [data.aktif, data.kadaluwarsa, data.kurang3bulan]
                    }],
                    xaxis: {
                        categories: ['Aktif', 'Kadaluwarsa', 'Kurang 3 Bulan']
                    },
                    legend: {
                        position: 'top'
                    }
                };

                var chart = new ApexCharts(document.querySelector("#chartStatusPengajuan"),
                    options);
                chart.render();
            },
        });
    });
</script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '/getCategoryMitra',
            method: 'GET',
            success: function(data) {
                var ctx = document.getElementById('chartPieMitraKategori').getContext('2d');
                var myPieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['Internasional', 'Nasional', 'Regional'],
                        datasets: [{
                            label: 'Kategori Mitra',
                            data: [data.internasional, data.nasional, data
                                .regional
                            ],
                            backgroundColor: ['#3a57e8', '#28a745', '#ffc107']
                        }]
                    },
                    options: {
                        responsive: true,
                        legend: {
                            diplay: true,
                            position: 'top'
                        },
                        title: {
                            display: true,
                            text: 'Mitra Kategori'
                        }
                    }
                });
            },
        });
    });
</script>

@include('dosen/layoutsDosen/footer')
