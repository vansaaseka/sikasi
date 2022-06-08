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
                <div class="card-body p-0">
                    <div class="table-responsive mt-4">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr class="odd text-center">
                                    <th>No</th>
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
                                    @if ($datapengajuan->user_id == Auth::user()->id)
                                        <tr role="row" class="odd text-center">
                                            <td scope="row">{{ $no++ }}</td>
                                            <td>{{ date('Y', strtotime($datapengajuan->tanggalmulai)) }}</td>

                                            <td>{{ $datapengajuan->mitra->namamitra }}</td>

                                            <td>
                                                <button type="button" class="btn btn-outline-info dropdown-toggle"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#status{{ $datapengajuan->id }}"
                                                    id="#status{{ $datapengajuan->id }}">
                                                    Status
                                                </button>
                                            </td>

                                            <td>- </td>
                                            <td>
                                                <?php
                                                $sudahUnggah = 0;
                                                foreach ($dokumen as $d) {
                                                    if ($d->pengajuan_id == $datapengajuan->id) {
                                                        $sudahUnggah += 1;
                                                        $namadok = $d->dokumen;
                                                    }
                                                }
                                                ?>

                                                @if ($sudahUnggah == 0)
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modaldokumen{{ $datapengajuan->id }}"
                                                        id="#modaldokumen{{ $datapengajuan->id }}">
                                                        Unggah Dokumen
                                                    </button>
                                                @endif
                                                @if ($sudahUnggah == 1)
                                                    <a
                                                        href="dokumenkerjasama/{{ $d->dokumen }}">{{ $namadok }}</a>
                                                @endif

                                            </td>

                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#pengajuan" id="#modalCenter">
                                                    <i class="fa fa-info-circle"></i>
                                                </button>
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
                                                                                            <input
                                                                                                class="form-control"
                                                                                                type="file"
                                                                                                name="dokumen"
                                                                                                placeholder="a"
                                                                                                id="customFile2">
                                                                                        </div>
                                                                                        @foreach ($pengajuan as $datapengajuan)
                                                                                            @if ($datapengajuan->user_id == Auth::user()->id)
                                                                                                <input type="hidden"
                                                                                                    name="pengajuan_id"
                                                                                                    value={{ $datapengajuan->id }}>
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
                    </div>
                </div>
                {{-- Modal Status --}}
                @foreach ($pengajuan as $datapengajuan)
                    <div class="modal fade" id="status{{ $datapengajuan->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLiveLabel">Status Pengajuan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
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
                                                                                <h6 class="float-left mb-1">
                                                                                    {{ $item->namastatus }}</h6>
                                                                            @endif
                                                                        @endforeach

                                                                        <?php
                                        foreach($user as $p){
                                            if($a->created_by == $p->id){?>
                                                                        <div class="d-inline-block w-100">
                                                                            <p>
                                                                                Created by {{ $p->name }}<br>
                                                                                {{ $a->created_at }}</p>
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
                @endforeach


                <?php foreach($dokumen as $item){
                                            if($item->pengajuan_id == $datapengajuan->id){?>
                <a class="btn btn-primary btn-sm">
                    <i class="fa fa-edit" data-bs-toggle="modal"
                        data-bs-target="#modaleditdokumen{{ $item->id }}"
                        id="#modaleditdokumen{{ $item->id }}">
                    </i>
                </a>



                <a class="btn btn-danger delete btn-sm hapus" id-data="{{ $datapengajuan->id }}"
                    nama-data="{{ $datapengajuan->mitra->namamitra }}" data-toggle="tooltip" data-placement="top"
                    title="" data-original-title="Delete" href="#">
                    <i class="fa fa-trash"></i>
                </a>

                </td>

                </tr>

                {{-- Modal Edit Dokumen --}}
                <div class="modal fade" id="modaleditdokumen{{ $item->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLiveLabel">Edit Dokumen Pengajuan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row d-flex justify-content">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="/updatedokumen/{{ $item->id }}" method="POST"
                                                    enctype="multipart/form-data" class="forms-sample">
                                                    @csrf

                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            {{-- <label class="form-label" for="exampleInputText1">Unggah Dokumen </label> --}}
                                                            <div class="form-group">
                                                                <div class="custom-file">
                                                                    <input type="file" name="dokumen" id="customFile"
                                                                        class="form-control"
                                                                        value="{{ old('dokumen') }}" autofocus>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @foreach ($pengajuan as $datapengajuan)
                                                            @if ($datapengajuan->user_id == Auth::user()->id)
                                                                <input type="hidden" name="pengajuan_id"
                                                                    value={{ $datapengajuan->id }}>
                                                                <input type="hidden" name="user_id"
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
            </div>
        </div>
        <?php }} ?>
        @endif
        @endforeach

        </tbody>
        </table>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="pengajuan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLiveLabel">Detail Pengajuan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead></thead>
                        <tbody>
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
                                <td>28 Maret 2022</td>
                            </tr>
                            <tr>
                                <td>
                                    Tanggal Mulai Kerjasama
                                </td>
                                <td>:</td>
                                <td>28 Agustus 2022</td>
                            </tr>
                            <tr>
                                <td>
                                    Tanggal Berakhir Kerjasama
                                </td>
                                <td>:</td>
                                <td>31 Desember 2022</td>
                            </tr>
                            <tr>
                                <td>
                                    Masa Berlaku Kerjasama :
                                </td>
                                <td>:</td>
                                <td style="color: red">
                                    Aktif (4 Bulan 3 Hari )</td>
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
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
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

@include('dosen/layoutsDosen/footer')
