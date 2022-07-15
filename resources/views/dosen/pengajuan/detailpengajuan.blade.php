@include('dosen/layoutsDosen/header')
@include('dosen/layoutsDosen/sidebar')
@include('dosen/layoutsDosen/navbar')
<!-- DataTable with Hover -->

<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Pengajuan Kerjasama</h4>
                    </div>
                    <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <a href="/tambahpengajuan" type="button" class="btn btn-success">Tambah
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-4">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr class="odd text-center">
                                    <th>No</th>
                                    <th>Jenis Kerjasama</th>
                                    <th>Tahun Kerjasama</th>
                                    <th>Mitra</th>
                                    <th>Status</th>
                                    <th>Catatan</th>
                                    <th>Dokumen Kerjasama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="odd text-center">
                                    <th>No</th>
                                    <th>Jenis Kerjasama</th>
                                    <th>Tahun Kerjasama</th>
                                    <th>Mitra</th>
                                    <th>Status</th>
                                    <th>Catatan</th>
                                    <th>Dokumen Kerjasama</th>
                                    <th>Aksi</th>
                            </tfoot>

                            <tbody>
                                @php $no = 1; @endphp

                                @foreach ($pengajuan as $datapengajuan)
                                    @if ($datapengajuan->prodiid == Auth::user()->prodi_id)
                                        <tr role="row" class="odd text-center">
                                            <td scope="row">{{ $no++ }}</td>
                                            <td>
                                                <?php
                                                    foreach($kategori as $ka){
                                                        if($ka->id == $datapengajuan->kategori_id){?>
                                                {{ $ka->namakategori }} <?php }
                                                    }
                                                ?>
                                            </td>
                                            <td>{{ date('Y', strtotime($datapengajuan->tanggalmulai)) }}</td>

                                            <td>{{ $datapengajuan->mitra->namamitra }}</td>

                                            <td>
                                                <?php $belumada_status = '<div class="btn btn-outline-warning btn-sm"></i>Belum ada Status</div>'; ?>
                                                @foreach ($trxstatus as $a)
                                                    @if ($datapengajuan->id == $a->pengajuan_id)
                                                        @foreach ($status as $b)
                                                            @if ($a->status_id == $b->id)
                                                                <?php $belumada_status = '<div class="btn btn-outline-primary btn-sm dropdown-toggle ' . $datapengajuan->id . '" data-bs-toggle="modal" data-bs-target="#status' . $datapengajuan->id . '"id="#status' . $datapengajuan->id . '"> ' . $b->namastatus . ' </div>'; ?>
                                                                {{-- @php echo $belumada_status = '<div class="btn btn-outline-primary btn-sm dropdown-toggle ' . $datapengajuan->id . '" data-bs-toggle="modal" data-bs-target="#status' . $datapengajuan->id . '"id="#status' . $datapengajuan->id . '"> ' . $b->namastatus . ' </div>'; @endphp --}}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                <?= $belumada_status ?>
                                                {{-- @php $belumada_status @endphp --}}

                                                {{-- Modal Status --}}
                                                <div class="modal fade" id="status{{ $datapengajuan->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLiveLabel">
                                                                    Status Pengajuan
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row d-flex justify-content-center">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div
                                                                                    class="iq-timeline0 m-0 d-flex align-items-center justify-content-between position-relative">
                                                                                    <ul class="list-inline p-0 m-0">
                                                                                        @foreach ($trxstatus as $a)
                                                                                            @if ($datapengajuan->id == $a->pengajuan_id)
                                                                                                <li>
                                                                                                    <div
                                                                                                        class="timeline-dots timeline-dot1 border-primary text-primary">
                                                                                                    </div>
                                                                                                    @foreach ($status as $item)
                                                                                                        @if ($a->status_id == $item->id)
                                                                                                            <h6
                                                                                                                class="float-left mb-1">
                                                                                                                {{ $item->namastatus }}
                                                                                                            </h6>
                                                                                                        @endif
                                                                                                    @endforeach

                                                                                                    <?php
                                                                                                            foreach($user as $p){
                                                                                                                if($a->created_by == $p->id){?>
                                                                                                    <div
                                                                                                        class="d-inline-block w-100">
                                                                                                        <p>
                                                                                                            Created
                                                                                                            by
                                                                                                            {{ $p->name }}<br>
                                                                                                            {{ $a->created_at }}
                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <?php }
                                                                                                                        }
                                                                                                                        ?>

                                                                                                </li>
                                                                                            @endif
                                                                                        @endforeach
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>

                                            <td>- </td>


                                            <?php
                                            $sudahUnggah = 0;
                                            $unggah = 0;
                                            $iddok = '';
                                            if (!empty($dokumen)) {
                                                foreach ($dokumen as $d) {
                                                    if ($d->pengajuan_id == $datapengajuan->id) {
                                                        $sudahUnggah += 1;
                                                    }
                                            
                                                    if ($d->pengajuan_id == $datapengajuan->id) {
                                                        $unggah = 1;
                                                        $namadok = $d->dokumen;
                                                        $iddok = $d->id;
                                                    }
                                                }
                                            }
                                            ?>

                                            <td>

                                                @if ($sudahUnggah == 0)
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modaldokumen{{ $datapengajuan->id }}"
                                                        id="#modaldokumen{{ $datapengajuan->id }}">
                                                        <svg width="24" viewBox="0 0 24 24" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M13.9455 12.89C14.2327 13.18 14.698 13.18 14.9851 12.89C15.2822 12.6 15.2822 12.13 14.995 11.84L12.1535 8.96C12.0842 8.89 12.005 8.84 11.9158 8.8C11.8267 8.76 11.7376 8.74 11.6386 8.74C11.5396 8.74 11.4406 8.76 11.3515 8.8C11.2624 8.84 11.1832 8.89 11.1139 8.96L8.28218 11.84C7.99505 12.13 7.99505 12.6 8.28218 12.89C8.56931 13.18 9.03465 13.18 9.32178 12.89L10.896 11.29V16.12C10.896 16.53 11.2228 16.86 11.6386 16.86C12.0446 16.86 12.3713 16.53 12.3713 16.12V11.29L13.9455 12.89ZM19.3282 9.02561C19.5609 9.02292 19.8143 9.02 20.0446 9.02C20.2921 9.02 20.5 9.22 20.5 9.47V17.51C20.5 19.99 18.5 22 16.0446 22H8.17327C5.58911 22 3.5 19.89 3.5 17.29V6.51C3.5 4.03 5.4901 2 7.96535 2H13.2525C13.5 2 13.7079 2.21 13.7079 2.46V5.68C13.7079 7.51 15.1931 9.01 17.0149 9.02C17.4313 9.02 17.801 9.02315 18.1258 9.02591C18.3801 9.02807 18.6069 9.03 18.8069 9.03C18.9479 9.03 19.1306 9.02789 19.3282 9.02561ZM19.6047 7.566C18.7908 7.569 17.8324 7.566 17.1423 7.559C16.0472 7.559 15.1452 6.648 15.1452 5.542V2.906C15.1452 2.475 15.6621 2.261 15.9581 2.572C16.7204 3.37179 17.8872 4.59739 18.8736 5.63346C19.2735 6.05345 19.6437 6.44229 19.9452 6.759C20.2334 7.062 20.0215 7.565 19.6047 7.566Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </button>
                                                @endif

                                                @if ($sudahUnggah == 1)
                                                    <a
                                                        href="dokumenkerjasama/{{ $d->dokumen }}">{{ $namadok . ' id dok : ' . $iddok }}</a>
                                                @endif
                                                {{-- Modal Dokumen --}}
                                                <div class="modal fade" id="modaldokumen{{ $datapengajuan->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLiveLabel">
                                                                    Unggah Dokumen Pengajuan</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="table-responsive">
                                                                    <table
                                                                        class="table align-items table-flush table-hover"
                                                                        id="dataTableHover">

                                                                        <tbody>

                                                                            <tr>
                                                                                <td class="font-size:3">
                                                                                    Unggah Dokumen Pengajuan
                                                                                    dengan Mitra
                                                                                    :
                                                                                    {{ $datapengajuan->mitra->namamitra }}
                                                                                </td>


                                                                            </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="row d-flex justify-content">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <form action="/insertdokumen"
                                                                                    method="POST"
                                                                                    enctype="multipart/form-data"
                                                                                    class="forms-sample">
                                                                                    @csrf

                                                                                    <div class="form-group">
                                                                                        <div class="form-group">
                                                                                            {{-- <label class="form-label" for="exampleInputText1">Unggah Dokumen </label> --}}
                                                                                            <input class="form-control"
                                                                                                type="file"
                                                                                                name="dokumen"
                                                                                                placeholder="a"
                                                                                                id="customFile2">
                                                                                        </div>
                                                                                        @foreach ($pengajuan as $ajuan)
                                                                                            @if ($ajuan->user_id == Auth::user()->id)
                                                                                                <input type="hidden"
                                                                                                    name="pengajuan_id"
                                                                                                    value={{ $ajuan->id }}>
                                                                                                <input type="hidden"
                                                                                                    name="user_id"
                                                                                                    value={{ Auth::user()->id }}>
                                                                                            @endif
                                                                                        @endforeach
                                                                                        <br />
                                                                                        <button type="submit"
                                                                                            class="btn btn-primary next action-button float-end"
                                                                                            value="Submit">Submit</button>

                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>


                                            <td>

                                                {{ $datapengajuan->id }}
                                                @if ($sudahUnggah == 0)
                                                    <i class="fa fa-info-circle" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="Button Edit dan Hapus akan tampil ketika sudah unggah dokumen">
                                                    </i>
                                                @endif

                                                @if ($sudahUnggah == 1)
                                                    <?php
                                                    $statusDisable = '';
                                                    
                                                    foreach ($trxstatus as $s) {
                                                        if ($datapengajuan->id == $s->pengajuan_id) {
                                                            if ($s->status_id >= 2) {
                                                                $statusDisable = 'disabled';
                                                            } else {
                                                                $statusDisable = '';
                                                            }
                                                        }
                                                    }
                                                    
                                                    ?>

                                                    <button type="button" class="btn btn-info btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modaldetail{{ $datapengajuan->id }}"
                                                        id="#modaldetail{{ $datapengajuan->id }}">
                                                        <i class="fa fa-info-circle"></i>
                                                    </button>

                                                    <a class="btn btn-primary btn-sm {{ $statusDisable }}">
                                                        <i class="fa fa-edit" data-bs-toggle="modal"
                                                            data-bs-target="#modaleditdokumen{{ $iddok }}"
                                                            id="#modaleditdokumen{{ $d->id }}">
                                                        </i>
                                                    </a>

                                                    <a class="btn btn-danger delete btn-sm hapus {{ $statusDisable }} "
                                                        id-data="{{ $datapengajuan->id }}"
                                                        nama-data="{{ $datapengajuan->mitra->namamitra }}"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Delete" href="#">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                @endif

                                                <!-- Modal Detail -->
                                                <div class="modal fade" id="modaldetail{{ $datapengajuan->id }}"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                    role="dialog" aria-labelledby="staticBackdropLiveLabel"
                                                    aria-hidden="true" style="text-align: left">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLiveLabel">
                                                                    Detail Pengajuan</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="table-responsive">
                                                                    <table
                                                                        class="table align-items-center table-flush table-hover"
                                                                        id="dataTableHover">
                                                                        <thead></thead>
                                                                        <tbody>
                                                                            {{ $datapengajuan->id }}
                                                                            <tr>
                                                                                <td class="font-size:3">
                                                                                    Mitra
                                                                                </td>
                                                                                <td>:</td>
                                                                                <td>{{ $datapengajuan->mitra->namamitra }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="font-size:3">
                                                                                    Nomor Dokumen
                                                                                </td>
                                                                                <td>:</td>
                                                                                <td>52/UN27/KS/2021</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    Tanggal Ajuan
                                                                                </td>
                                                                                <td>:</td>
                                                                                <td>{{ $datapengajuan->created_at->formatLocalized('%A, %d %B %Y') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    Tanggal Mulai Kerjasama
                                                                                </td>
                                                                                <td>:</td>
                                                                                <td>{{ date('Y-m-d', strtotime($datapengajuan->tanggalmulai)) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    Tanggal Berakhir Kerjasama
                                                                                </td>
                                                                                <td>:</td>
                                                                                <td>{{ date('Y-m-d', strtotime($datapengajuan->tanggalakhir)) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    Masa Berlaku Kerjasama :
                                                                                </td>
                                                                                <td>:</td>
                                                                                <td style="color: red">
                                                                                    {{ $diff = Carbon\Carbon::parse($datapengajuan->tanggalakhir)->diffForHumans() }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    Status Dokumen
                                                                                </td>
                                                                                <td>:</td>
                                                                                <td>Dibawa Prodi</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-primary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Modal Edit Dokumen --}}
                                                <div class="modal fade" id="modaleditdokumen{{ $iddok }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLiveLabel">
                                                                    Edit Dokumen
                                                                    Pengajuan
                                                                    {{ 'id dok : ' . $iddok }}
                                                                </h5>

                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="table-responsive">
                                                                    <table
                                                                        class="table align-items table-flush table-hover"
                                                                        id="dataTableHover">

                                                                        <tbody>

                                                                            <tr>
                                                                                <td class="font-size:3">
                                                                                    Edit Dokumen Pengajuan
                                                                                    dengan Mitra
                                                                                    :
                                                                                    {{ $datapengajuan->mitra->namamitra }}
                                                                                </td>


                                                                            </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="row d-flex justify-content">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <form
                                                                                    action="/updatedokumen/{{ $datapengajuan->id }}"
                                                                                    method="POST"
                                                                                    enctype="multipart/form-data"
                                                                                    class="forms-sample">
                                                                                    @csrf

                                                                                    <div class="form-group">
                                                                                        <div class="form-group">
                                                                                            {{-- <label class="form-label" for="exampleInputText1">Unggah Dokumen </label> --}}
                                                                                            <div class="form-group">
                                                                                                <div
                                                                                                    class="custom-file">
                                                                                                    <input
                                                                                                        type="file"
                                                                                                        name="dokumen"
                                                                                                        id="customFile"
                                                                                                        class="form-control"
                                                                                                        value="{{ old('dokumen') }}"
                                                                                                        autofocus>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>


                                                                                        <button type="submit"
                                                                                            class="btn btn-primary next action-button float-end"
                                                                                            value="Submit">Submit</button>

                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

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
</div>



@include('dosen/layoutsDosen/footer')

{{-- alert Delete Pengajuan --}}
<script>
    $('.hapus').click(function() {
        var pengajuanid = $(this).attr('id-data');
        var namapengajuan = $(this).attr('nama-data');
        swal({
            title: "Apakah kamu yakin??",
            text: "Menghapus data pengajuan dengan mitra " + namapengajuan + " ",
            icon: "warning",
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                window.location = "/hapuspengajuan/" + pengajuanid + ""
                swal("Data berhasil Dihapus!", {
                    icon: "success"
                });
            } else {
                swal("Data tidak berhasil dihapus");
            }
        });
    });
</script>
