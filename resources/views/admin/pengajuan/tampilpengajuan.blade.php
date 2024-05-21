@include('admin/layoutsAdmin/header')
@include('admin/layoutsAdmin/sidebar')
@include('admin/layoutsAdmin/navbar')
@include('sweetalert::alert')
<!-- DataTable with Hover -->

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Pengajuan Kerja Sama</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <button id="filterModalButton" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#filterModal">
                            Filter
                        </button>
                    </div>
                    <!-- Filter Modal -->
                    <!-- Filter Modal -->
                    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="filterModalLabel">Filter Status</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="modalFilterStatus" class="form-label">Pilih Status:</label>
                                        <select id="modalFilterStatus" class="form-select">
                                            <option value="">Semua Status</option>
                                            @foreach ($status as $st)
                                                <option value="{{ $st->namastatus }}">{{ $st->namastatus }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-primary" id="applyFilterButton">Terapkan
                                        Filter</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive mt-4">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr class="odd text-center">
                                    <th>No</th>
                                    <th>Tahun Kerja Sama</th>
                                    <th>Kategori Pengajuan</th>
                                    <th>Pengusul</th>
                                    <th>Prodi</th>
                                    <th>Mitra</th>
                                    <th>Status</th>
                                    <th>Seremoni</th>
                                    <th>Website</th>
                                    <th>Sosmed</th>
                                    <th>Catatan</th>
                                    <th>Nomor Kerja Sama</th>
                                    <th>Nomor Mitra</th>
                                    <th>Dokumen Kerja Sama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="odd text-center">
                                    <th>No</th>
                                    <th>Tahun Kerja Sama</th>
                                    <th>Kategori Pengajuan</th>
                                    <th>Pengusul</th>
                                    <th>Prodi</th>
                                    <th>Mitra</th>
                                    <th>Status</th>
                                    <th>Seremoni</th>
                                    <th>Website</th>
                                    <th>Sosmed</th>
                                    <th>Catatan</th>
                                    <th>Nomor Kerja Sama</th>
                                    <th>Nomor Mitra</th>
                                    <th>Dokumen Kerja Sama</th>
                                    <th>Aksi</th>
                            </tfoot>

                            <tbody>
                                @php
                                    $no = 1;
                                @endphp


                                @foreach ($pengajuan as $datapengajuan)
                                    <tr role="row" class="">
                                        <td scope="row">{{ $no++ }}</td>
                                        <td style="tex-align:center">
                                            {{ date('Y', strtotime($datapengajuan->tanggalmulai)) }}</td>

                                        <td>
                                            <?php
                                                    foreach($kategori as $ka){
                                                        if($ka->id == $datapengajuan->kategori_id){?>
                                            {{ $ka->namakategori }} <?php }
                                                    }
                                                ?>
                                        </td>

                                        <td>{{ $datapengajuan->user->name }}</td>

                                        <?php
                                                    foreach($prodi as $p){
                                                        if($p->id == $datapengajuan->user->prodi_id){?>
                                        <td>{{ $p->namaprodi }} </td>
                                        <?php }
                                                    }
                                                    ?>



                                        <td>{{ $datapengajuan->mitra->namamitra }}</td>
                                        <td>
                                            <?php $belumada_status = '<div class="btn btn-outline-warning btn-sm"></i>Belum ada Status</div>'; ?>
                                            @foreach ($trxstatus as $a)
                                                @if ($datapengajuan->id == $a->pengajuan_id)
                                                    @foreach ($status as $b)
                                                        @if ($a->status_id == $b->id)
                                                            @if ($a->status_id == 11)
                                                                <?php $belumada_status = '<div class="btn btn-outline-success btn-sm dropdown-toggle ' . $datapengajuan->id . '" data-bs-toggle="modal" data-bs-target="#status' . $datapengajuan->id . '"id="#status' . $datapengajuan->id . '"> ' . $b->namastatus . ' </div>'; ?>
                                                            @else
                                                                <?php $belumada_status = '<div class="btn btn-outline-primary btn-sm dropdown-toggle ' . $datapengajuan->id . '" data-bs-toggle="modal" data-bs-target="#status' . $datapengajuan->id . '"id="#status' . $datapengajuan->id . '"> ' . $b->namastatus . ' </div>'; ?>
                                                            @endif
                                                            {{-- @php echo $belumada_status = '<div class="btn btn-outline-primary btn-sm dropdown-toggle ' . $datapengajuan->id . '" data-bs-toggle="modal" data-bs-target="#status' . $datapengajuan->id . '"id="#status' . $datapengajuan->id . '"> ' . $b->namastatus . ' </div>'; @endphp --}}
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            <?= $belumada_status ?>
                                            {{-- @php $belumada_status @endphp --}}
                                            </button>
                                            <i class="fa fa-edit" data-bs-toggle="modal"
                                                data-bs-target="#modalstatus{{ $datapengajuan->id }}"
                                                id="#modalstatus{{ $datapengajuan->id }}">
                                            </i>

                                        </td>
                                        {{-- Modal Status --}}
                                        <div class="modal fade" id="status{{ $datapengajuan->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLiveLabel">
                                                            Status Pengajuan
                                                        </h5>
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

                                        {{-- Modal Edit Status --}}
                                        <div class="modal fade" id="modalstatus{{ $datapengajuan->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document"
                                                style="text-align: left">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLiveLabel">
                                                            Verifikasi Pengajuan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="col-md-12">
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <form action="/insertnewstatus" method="POST"
                                                                            enctype="multipart/form-data"
                                                                            class="forms-sample">
                                                                            @csrf

                                                                            <div class="form-group">
                                                                                <label class="form-label"
                                                                                    for="exampleInputText1">Update
                                                                                    Status
                                                                                </label>
                                                                                <div class="form-group"><label
                                                                                        class="col-lg-5 control-label">Status</label>
                                                                                    <br />
                                                                                    <?php foreach($status as $s){
                                                                                        ?>
                                                                                    <div class="col-lg-10">
                                                                                        <div class="form-check">
                                                                                            <label
                                                                                                class="form-check-label">
                                                                                                <input type="radio"
                                                                                                    class="form-check-input"
                                                                                                    name="status_id"
                                                                                                    id="status_id"
                                                                                                    value="{{ $s->id }}"
                                                                                                    required>

                                                                                                {{ $s->namastatus }}
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                    {{-- </div> --}}
                                                                                    <?php
                                                                                                         }?>

                                                                                    <br />
                                                                                    <div class="form-group">
                                                                                        <label class="form-label"
                                                                                            for="exampleInputText1">Catatan
                                                                                        </label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputText1"
                                                                                            name="catatan" required>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label class="form-label"
                                                                                            for="exampleInputText1">Status
                                                                                            Dokumen </label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="exampleInputText1"
                                                                                            name="status_dokumen"
                                                                                            required>
                                                                                    </div>
                                                                                    {{-- <div class="custom-file">
                                                            <input type="file" name="dokumen" placeholder="Choose file" id="file">
                                                        </div> --}}
                                                                                </div>

                                                                                <input type="hidden"
                                                                                    name="pengajuan_id"
                                                                                    value={{ $datapengajuan->id }}>
                                                                                <input type="hidden"
                                                                                    name="created_by"
                                                                                    value={{ Auth::user()->id }}>
                                                                                <input type="hidden"
                                                                                    name="created_by"
                                                                                    value={{ Auth::user()->id }}>
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
                                        <td>
                                            @if ($datapengajuan->seremoni == 'seremoni')
                                                <p>Ada</p>
                                            @elseif ($datapengajuan->seremoni == 'non_seremoni')
                                                <p>Tidak Ada</p>
                                            @endif
                                        </td>
                                        <td>{{ $datapengajuan->mitra->website }}</td>

                                        <td>{{ $datapengajuan->mitra->sosmed }}</td>
                                        <td> @php
                                            $tsz = App\Models\Trxstatus::where('pengajuan_id', $datapengajuan->id)
                                                ->orderBy('id', 'desc')
                                                ->first();
                                        @endphp
                                            @isset($tsz)
                                                {{ $tsz->catatan }}
                                            @endisset
                                        </td>
                                        <td>
                                            @foreach ($dokumen as $doc)
                                                @if ($datapengajuan->id == $doc->pengajuan_id)
                                                    @if (empty($doc->nodokumen))
                                                        <button type="button" class="btn btn-secondary btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalnodok{{ $datapengajuan->id }}"
                                                            id="#modalnodok{{ $datapengajuan->id }}">
                                                            Input
                                                        </button>
                                                    @else
                                                        {{ $doc->nodokumen }}
                                                    @endif
                                                @endif
                                            @endforeach
                                            {{-- Modal Nomor Dokumen --}}
                                            <div class="modal fade" id="modalnodok{{ $datapengajuan->id }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLiveLabel">
                                                                Input Nomor Dokumen Pengajuan</h5>
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
                                                                            <td class="font-size:3"
                                                                                style="text-align:center">
                                                                                Mitra
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
                                                                        <form
                                                                            action="/updatedokumen/{{ $datapengajuan->id }}"
                                                                            method="POST"
                                                                            enctype="multipart/form-data"
                                                                            class="forms-sample">
                                                                            @csrf

                                                                            <div class="form-group">

                                                                                <div class="form-group">
                                                                                    <div class="form-group">

                                                                                        <input type="text"
                                                                                            name="nodokumen"
                                                                                            id="customFile"
                                                                                            class="form-control"
                                                                                            value="" autofocus>

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
                                        </td>
                                        <td>
                                            @foreach ($mitra as $mit)
                                                @if (empty($mit->nomor))
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#nomormitra{{ $datapengajuan->id }}"
                                                        id="#nomormitra{{ $datapengajuan->id }}">
                                                        Input
                                                    </button>
                                                @else
                                                    {{ $mit->nomor }}
                                                @endif
                                            @endforeach
                                            {{-- Modal Nomor Dokumen --}}
                                            <div class="modal fade" id="nomormitra{{ $datapengajuan->id }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLiveLabel">
                                                                Input Nomor Mitra</h5>
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
                                                                            <td class="font-size:3"
                                                                                style="text-align:center">
                                                                                Mitra
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
                                                                        <form
                                                                            action="/updatemitra/{{ $datapengajuan->id }}"
                                                                            method="POST"
                                                                            enctype="multipart/form-data"
                                                                            class="forms-sample">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            <div class="form-group">
                                                                                <div class="form-group">
                                                                                    <div class="form-group">
                                                                                        <input type="text"
                                                                                            name="nomor"
                                                                                            id="customFile"
                                                                                            class="form-control"
                                                                                            autofocus>

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
                                        </td>

                                        <td>
                                            <?php
                                                foreach($dokumen as $d){
                                                    if($d->pengajuan_id == $datapengajuan->id){?>
                                            <a href="dokumenkerjasama/{{ $d->dokumen }}">{{ $d->dokumen }}</a>
                                            <?php }
                                                }
                                                ?>
                                        </td>

                                        <td>
                                            <?php foreach($dokumen as $item){
                                            if($item->pengajuan_id == $datapengajuan->id){?>
                                            <a class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit" data-bs-toggle="modal"
                                                    data-bs-target="#modaleditdokumen{{ $item->id }}"
                                                    id="#modaleditdokumen{{ $item->id }}">
                                                </i>
                                            </a>
                                            <a class="btn btn-danger delete btn-sm hapus  "
                                                id-data="{{ $datapengajuan->id }}"
                                                nama-data="{{ $datapengajuan->mitra->namamitra }}"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Delete" href="#">
                                                <i class="fa fa-trash"></i>
                                            </a>

                                            {{-- Modal Edit Dokumen --}}
                                            <div class="modal fade" id="modaleditdokumen{{ $item->id }}"
                                                tabindex="-1" role="dialog"
                                                aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLiveLabel">
                                                                Edit
                                                                Dokumen Pengajuan</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="modal-body">
                                                                <div class="table-responsive">
                                                                    <table
                                                                        class="table align-items table-flush table-hover"
                                                                        id="dataTableHover">

                                                                        <tbody>

                                                                            <tr>
                                                                                <td class="font-size:3"
                                                                                    style="text-align:center">
                                                                                    Mitra
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
                                                                                    action="/updatedokumen/{{ $item->id }}"
                                                                                    method="POST"
                                                                                    enctype="multipart/form-data"
                                                                                    class="forms-sample">
                                                                                    @csrf

                                                                                    <div class="form-group">
                                                                                        <div class="form-group">
                                                                                            {{-- <label class="form-label" for="exampleInputText1">Unggah Dokumen </label> --}}
                                                                                            <div class="form-group">
                                                                                                <p> Unggah Dokumen
                                                                                                    dalam
                                                                                                    format .doc
                                                                                                    .docx .pdf
                                                                                                </p>
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
                                                                                        @foreach ($pengajuan as $data)
                                                                                            @if ($datapengajuan->user_id == Auth::user()->id)
                                                                                                <input type="hidden"
                                                                                                    name="pengajuan_id"
                                                                                                    value={{ $data->id }}>
                                                                                                <input type="hidden"
                                                                                                    name="user_id"
                                                                                                    value={{ Auth::user()->id }}>
                                                                                                <?php date_default_timezone_set('Asia/Jakarta'); ?>
                                                                                                <input
                                                                                                    name="created_at"
                                                                                                    id="created_at"
                                                                                                    type="hidden"
                                                                                                    value="{{ date('Y-m-d H:i:s') }}">
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
                                            <?php }} ?>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin/layoutsAdmin/footer')


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
<script>
    $(document).ready(function() {
        $('#applyFilterButton').click(function() {
            var selectedStatus = $('#modalFilterStatus').val();
            if (selectedStatus) {
                $('#datatable tbody tr').hide();
                $('#datatable tbody tr').each(function() {
                    var statusColumn = $(this).find('td:nth-child(7)').text().trim();
                    if (statusColumn === selectedStatus) {
                        $(this).show();
                    }
                });
            } else {
                $('#datatable tbody tr').show();
            }
        });
    });
</script>
