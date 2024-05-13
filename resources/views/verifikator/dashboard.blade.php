@include('verifikator/layoutsVerifikator/header')

@include('verifikator/layoutsVerifikator/sidebar')

@include('navbardashboard')


<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-slider1 overflow-hidden ">
                        <ul class="swiper-wrapper list-inline m-0 p-0 mb-2">
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
                                                    // Konversi string JSON proditerlibat_id menjadi array
                                                    $proditerlibatIds = json_decode($pengajuan->proditerlibat_id, true);
                                                    // Hitung jumlah ID dalam array
                                                    $jumlahId = count($proditerlibatIds);
                                                @endphp

                                                @if ($jumlahId >= 2)
                                                    <tr>
                                                        <td>{{ $pengajuan->mitra->namamitra }}</td>
                                                        <td>
                                                            @foreach ($proditerlibatIds as $prodiItem)
                                                                @php
                                                                    // Ambil ID Prodi dari $prodiItem yang merupakan array
                                                                    $prodiId = $prodiItem['id'];
                                                                    // Cari Prodi berdasarkan ID
                                                                    $prodi = App\Models\Prodi::find($prodiId);
                                                                @endphp
                                                                @if ($prodi)
                                                                    {{ $prodi->namaprodi }}
                                                                    @if (!$loop->last)
                                                                        ,
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
                                            <a href="/verifprodi/{{ $p->id }}"
                                                class="mb-2">{{ $p->namaprodi }}</a>
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

@include('verifikator/layoutsVerifikator/footer')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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
