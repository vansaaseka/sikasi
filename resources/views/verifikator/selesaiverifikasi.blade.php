@include('verifikator/layoutsVerifikator/header')
@include('verifikator/layoutsVerifikator/sidebar')
@include('verifikator/layoutsVerifikator/navbar')
@include('sweetalert::alert')

<!-- DataTable with Hover -->

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Pengajuan Kerjasama</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-4">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr class="odd text-center">
                                    <th>No</th>
                                    <th>Jenis Kerjasama</th>
                                    <th>Pengusul</th>
                                    <th>Prodi</th>
                                    <th>Tahun Kerjasama</th>
                                    <th>Mitra</th>
                                    <th>Status</th>
                                    <th>Catatan</th>
                                    <th>Status Dokumen</th>
                                    <th>Dokumen Kerjasama</th>
                                    <th>Verifikasi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="odd text-center">
                                    <th>No</th>
                                    <th>Jenis Kerjasama</th>
                                    <th>Pengusul</th>
                                    <th>Prodi</th>
                                    <th>Tahun Kerjasama</th>
                                    <th>Mitra</th>
                                    <th>Status</th>
                                    <th>Catatan</th>
                                    <th>Status Dokumen</th>
                                    <th>Dokumen Kerjasama</th>
                                    <th>Verifikasi</th>
                            </tfoot>

                            <tbody>
                                @php
                                    $no = 1;
                                @endphp


                                @foreach ($pengajuan as $datapengajuan)

                                    @if (App\Models\Trxstatus::where('pengajuan_id', $datapengajuan->id)->where('status_id', 11)->orWhere('status_id', 16)->first())
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
                                            <td>{{ $datapengajuan->user->name }}</td>

                                            <?php
                                                    foreach($prodi as $p){
                                                        if($p->id == $datapengajuan->user->prodi_id){?>
                                            <td>{{ $p->namaprodi }} </td>
                                            <?php }
                                                    }
                                                    ?>

                                            <td>{{ date('Y', strtotime($datapengajuan->tanggalmulai)) }}</td>

                                            <td>{{ $datapengajuan->mitra->namamitra }}</td>

                                            <td>
                                                <?php $belumada_status = '<div class="btn btn-outline-warning btn-sm"></i>Belum ada Status</div>'; ?>
                                                @foreach ($trxstatus as $a)
                                                    @if ($datapengajuan->id == $a->pengajuan_id)
                                                        @foreach ($status as $b)
                                                            @if ($a->status_id == $b->id)
                                                                <?php $belumada_status = '<div class="btn btn-outline-primary btn-sm dropdown-toggle ' . $datapengajuan->id . '" data-bs-toggle="modal" data-bs-target="#status' . $datapengajuan->id . '"id="#status' . $datapengajuan->id . '"> ' . $b->namastatus . ' </div>'; ?>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                <?= $belumada_status ?>


                                                {{-- Modal Tampil Status --}}
                                                <div class="modal fade" id="status{{ $datapengajuan->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLiveLabel">
                                                                    Status Pengajuan</h5>
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
                                                                                                    <?php }}?>

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

                                            <td>

                                                <?php
                                                foreach($trxstatus as $p){
                                                    if($p->pengajuan_id == $datapengajuan->id){?>
                                                {{ $p->catatan }}
                                                <?php }
                                                }
                                                ?>
                                            </td>


                                            <td>
                                                @foreach ($trxstatus as $x)
                                                    @if ($datapengajuan->id == $x->pengajuan_id)
                                                        {{ $x->status_dokumen }}
                                                    @endif
                                                @endforeach
                                            </td>



                                            <td>
                                                <?php
                                                foreach($dokumen as $d){
                                                    if($d->pengajuan_id == $datapengajuan->id){?>
                                                <a href="dokumenkerjasama/{{ $d->dokumen }}">{{ $d->dokumen }}</a>
                                                <?php }
                                                }
                                                ?>
                                                <?php
                                                $statusDisable = '';
                                                foreach ($trxstatus as $s) {
                                                    if ($datapengajuan->id == $s->pengajuan_id) {
                                                        if ($s->status_id == 11 || $s->status_id == 16) {
                                                            $statusDisable = 'disabled';
                                                        } else {
                                                            $statusDisable = '';
                                                        }
                                                    }
                                                }
                                                
                                                ?>
                                                <?php foreach($dokumen as $item){
                                            if($item->pengajuan_id == $datapengajuan->id){?>
                                                <a class="btn btn-sm btn-icon btn-primary {{ $statusDisable }}">
                                                    <i class="fa fa-file-pen" data-bs-toggle="modal"
                                                        data-bs-target="#modaleditdokumen{{ $item->id }}"
                                                        id="#modaleditdokumen{{ $item->id }}">
                                                    </i>
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
                                                                                    <td class="font-size:3">
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
                                                                                                    <h6>Input
                                                                                                        dokumen
                                                                                                        dengan
                                                                                                        format .pdf
                                                                                                        .docx
                                                                                                        .doc</h6>
                                                                                                    <br />
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
                                                                                                    <input
                                                                                                        type="hidden"
                                                                                                        name="pengajuan_id"
                                                                                                        value={{ $data->id }}>
                                                                                                    <input
                                                                                                        type="hidden"
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

                                            <td>

                                                <?php $belumada_verif = '<div class="btn btn-primary btn-sm ' . $datapengajuan->id . '" data-bs-toggle="modal" data-bs-target="#modalstatus' . $datapengajuan->id . '"id="#modalstatus' . $datapengajuan->id . '"> Verifikasi </div>'; ?>

                                                @foreach ($trxstatus as $a)
                                                    @if ($datapengajuan->id == $a->pengajuan_id)
                                                        @foreach ($status as $b)
                                                            @if ($a->status_id == $b->id)
                                                                <?php $belumada_verif = '<div class="btn btn-primary btn-sm ' . $datapengajuan->id . '" data-bs-toggle="modal" data-bs-target="#modalstatus' . $datapengajuan->id . '"id="#modalstatus' . $datapengajuan->id . '"> Verifikasi </div>'; ?>
                                                            @endif
                                                        @endforeach

                                                        @foreach ($status as $b)
                                                            @if ($s->status_id == 11 || $s->status_id == 16)
                                                                {{-- @if ($a->status_id == $b->id) --}}
                                                                {{-- @if ($b->namastatus == 'Selesai') --}}
                                                                <?php $belumada_verif = ' <div class="btn btn-outline-primary btn-sm"> <i class="fa fa-check-circle"></i>Selesai</div>';
                                                                ?>
                                                                {{-- @endif --}}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                <?= $belumada_verif ?>

                                                {{-- Modal Edit Status --}}
                                                <div class="modal fade" id="modalstatus{{ $datapengajuan->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="staticBackdropLiveLabel" aria-hidden="true"
                                                    style="text-align: left">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLiveLabel">
                                                                    Verifikasi Pengajuan</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
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
                                                            <div class="modal-body">
                                                                <div class="row d-flex justify-content-center">
                                                                    <div class="col-md-12">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <form action="/insertnewstatus"
                                                                                    method="POST"
                                                                                    enctype="multipart/form-data"
                                                                                    class="forms-sample">
                                                                                    @csrf

                                                                                    <div class="form-group">
                                                                                        <label class="form-label"
                                                                                            for="exampleInputText1">Update
                                                                                            Status
                                                                                        </label>
                                                                                        @if ($datapengajuan->kategori_id == 1)
                                                                                            <?php $tombol = '<div class="custom-control custom-radio custom-radio-color-checked "><input type="radio" name="status_id" id="gembel" value="1"> <label for="gembel"> Ajuan Diterima</label></div>'; ?>
                                                                                            @foreach ($trxstatus as $a)
                                                                                                @if ($a->pengajuan_id == $datapengajuan->id)
                                                                                                    @for ($s = 0; $s < count($status); $s++)
                                                                                                        @if ($a->status_id == $status[$s]->id)
                                                                                                            @if ($status[$s]->namastatus === 'Ajuan Diterima')
                                                                                                                <?php $tombol = '<div class="custom-control custom-radio custom-radio-color-checked "><input type="radio" disabled name="status_id" value="2"> <label>Dokumen direview BPU</label> </div>'; ?>
                                                                                                            @elseif($status[$s]->namastatus === 'Dokumen direview BPU')
                                                                                                                <?php $tombol = '<div class="custom-control custom-radio custom-radio-color-checked "><input type="radio" disabled name="status_id" value="3"> <label>Dokumen selesai direview BPU</label> </div>'; ?>
                                                                                                            @elseif($status[$s]->namastatus === 'Dokumen selesai direview BPU')
                                                                                                                <?php $tombol = '<div class="custom-control custom-radio custom-radio-color-checked "><input type="radio" name="status_id" value="4"> <label>Proses tanda tangan Dekan</label> </div>'; ?>
                                                                                                            @elseif($status[$s]->namastatus === 'Proses tanda tangan Dekan')
                                                                                                                <?php $tombol = '<div class="custom-control custom-radio custom-radio-color-checked "><input type="radio" name="status_id" value="5"> <label>Dokumen telah ditandatangani Dekan</label> </div>'; ?>
                                                                                                            @elseif($status[$s]->namastatus === 'Dokumen telah ditandatangani Dekan')
                                                                                                                <?php $tombol = '<div class="custom-control custom-radio custom-radio-color-checked "><input type="radio" name="status_id" value="6"> <label>Proses tanda tangan Mitra</label> </div>'; ?>
                                                                                                            @elseif($status[$s]->namastatus === 'Proses tanda tangan Mitra')
                                                                                                                <?php $tombol = '<div class="custom-control custom-radio custom-radio-color-checked "><input type="radio" name="status_id" value="7"> <label>Dokumen telah ditandatangani Mitra</label> </div>'; ?>
                                                                                                            @elseif($status[$s]->namastatus === 'Dokumen telah ditandatangani Mitra')
                                                                                                                <?php $tombol = '<div class="custom-control custom-radio custom-radio-color-checked "><input type="radio" name="status_id" value="8"> <label>Pengajuan DKPI</label> </div>'; ?>
                                                                                                            @elseif($status[$s]->namastatus === 'Pengajuan DKPI')
                                                                                                                <?php $tombol = '<div class="custom-control custom-radio custom-radio-color-checked "><input type="radio" name="status_id" value="9"> <label>Dokumen direview DKPI</label> </div>'; ?>
                                                                                                            @elseif($status[$s]->namastatus === 'Dokumen direview DKPI')
                                                                                                                <?php $tombol = '<div class="custom-control custom-radio custom-radio-color-checked "><input type="radio" name="status_id" value="10"> <label>Proses tanda tangan WR 4</label> </div>'; ?>
                                                                                                            @elseif($status[$s]->namastatus === 'Proses tanda tangan WR 4')
                                                                                                                <?php $tombol = '<div class="custom-control custom-radio custom-radio-color-checked "><input type="radio" name="status_id" value="11"> <label>Selesai</label> </div>'; ?>
                                                                                                            @endif
                                                                                                        @endif
                                                                                                    @endfor
                                                                                                @endif
                                                                                            @endforeach
                                                                                            <?= $tombol ?>
                                                                                            <br />
                                                                                        @endif

                                                                                        @if ($datapengajuan->kategori_id == 2)
                                                                                            <?php $tombol = '<div class="custom-control custom-radio custom-radio-color-checked "><input type="radio" name="status_id" id="gembel" value="12"> <label for="gembel"> Ajuan Diterima</label></div>'; ?>
                                                                                            @foreach ($trxstatus as $a)
                                                                                                @if ($a->pengajuan_id == $datapengajuan->id)
                                                                                                    @for ($s = 11; $s < count($status); $s++)
                                                                                                        @if ($a->status_id == $status[$s]->id)
                                                                                                            @if ($status[$s]->namastatus === 'Ajuan Diterima')
                                                                                                                <?php $tombol = '<div class="custom-control custom-radio custom-radio-color-checked "><input type="radio"  name="status_id" value="13"> <label>Pengajuan DKPI</label> </div>'; ?>
                                                                                                            @elseif($status[$s]->namastatus === 'Pengajuan DKPI')
                                                                                                                <?php $tombol = '<div class="custom-control custom-radio custom-radio-color-checked "><input type="radio"  name="status_id" value="14"> <label></label>Dokumen direview DKPI</div>'; ?>
                                                                                                            @elseif($status[$s]->namastatus === 'Dokumen direview DKPI')
                                                                                                                <?php $tombol = '<div class="custom-control custom-radio custom-radio-color-checked "><input type="radio" name="status_id" value="15"> <label></label>Proses tanda tangan WR 4</div>'; ?>
                                                                                                            @elseif($status[$s]->namastatus === 'Proses tanda tangan WR 4')
                                                                                                                <?php $tombol = '<div class="custom-control custom-radio custom-radio-color-checked "><input type="radio" name="status_id" value="16"> <label>Selesai</label> </div>'; ?>
                                                                                                            @endif
                                                                                                        @endif
                                                                                                    @endfor
                                                                                                @endif
                                                                                            @endforeach
                                                                                            <?= $tombol ?>
                                                                                            <br />
                                                                                        @endif


                                                                                        <div class="form-group ">
                                                                                            <label class="form-label"
                                                                                                for="exampleInputText1">Catatan
                                                                                            </label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                id="exampleInputText1"
                                                                                                name="catatan">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="form-label"
                                                                                                for="exampleInputText1">Status
                                                                                                Dokumen </label>
                                                                                            <input type="text"
                                                                                                class="form-control"
                                                                                                id="exampleInputText1"
                                                                                                name="status_dokumen">
                                                                                        </div>

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
                                                                                    <?php
                                                                                    
                                                                                    $Disable = '';
                                                                                    
                                                                                    foreach ($trxstatus as $p) {
                                                                                        if ($datapengajuan->id == $p->pengajuan_id) {
                                                                                            if ($p->status_id < 3 && $p->status_id >= 1) {
                                                                                                $Disable = 'disabled';
                                                                                            } else {
                                                                                                $Disable = '';
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                    
                                                                                    ?>
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary next action-button float-end {{ $Disable }}"
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

@include('verifikator/layoutsVerifikator/footer')