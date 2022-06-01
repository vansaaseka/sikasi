@include('reviewer/layoutsReviewer/header')

@include('reviewer/layoutsReviewer/sidebar')

@include('reviewer/layoutsReviewer/navbar')

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Review Pengajuan</h4>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive mt-4">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr class="odd text-center">
                                    <th>No</th>
                                    <th>Pengusul</th>
                                    <th>Prodi</th>
                                    <th>Tahun Kerjasama</th>
                                    <th>Mitra</th>
                                    <th>Status</th>
                                    <th>Catatan</th>
                                    <th>Dokumen Kerjasama</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="odd text-center">
                                    <th>No</th>
                                    <th>Pengusul</th>
                                    <th>Prodi</th>
                                    <th>Tahun Kerjasama</th>
                                    <th>Mitra</th>
                                    <th>Status</th>
                                    <th>Catatan</th>
                                    <th>Dokumen Kerjasama</th>
                            </tfoot>

                            <tbody>
                                @php
                                    $no = 1;
                                @endphp


                                @foreach ($pengajuan as $datapengajuan)
                                    <tr role="row" class="odd text-center">
                                        <td scope="row">{{ $no++ }}</td>

                                        <td>{{ $datapengajuan->user->name }}</td>
                                        <td>
                                            <?php
                                    foreach($prodi as $p){
                                        if($p->id == $datapengajuan->user->prodi_id){?>
                                        <td>{{ $p->namaprodi }} </td>
                                        <?php }
                                    }
                                    ?>
                                        </td>
                                        <td>{{ date('Y', strtotime($datapengajuan->tanggalmulai)) }}</td>

                                        <td>{{ $datapengajuan->mitra->namamitra }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-info dropdown-toggle"
                                                data-bs-toggle="modal"
                                                data-bs-target="#status{{ $datapengajuan->id }}"
                                                id="#status{{ $datapengajuan->id }}">
                                                Status

                                            </button>
                                            <i class="fa fa-edit" data-bs-toggle="modal"
                                                data-bs-target="#modalstatus{{ $datapengajuan->id }}"
                                                id="#modalstatus{{ $datapengajuan->id }}">
                                            </i>
                                        </td>

                                        <td>
                                            {{-- {{  $datapengajuan->trxstatus->catatan}} --}}
                                            <?php
                                      foreach($trxstatus as $p){
                                          if($p->pengajuan_id == $datapengajuan->id){?>
                                            {{ $p->catatan }}
                                            <?php }
                                      }
                                      ?>
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


                                        <?php foreach($dokumen as $item){
                                            if($item->pengajuan_id == $datapengajuan->id){?>



                                        {{-- Modal Edit Status --}}
                                        <div class="modal fade" id="modalstatus{{ $datapengajuan->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="staticBackdropLiveLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLiveLabel">
                                                            Validasi Pengajuan</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="col-md-12">
                                                                <div class="bd-example">
                                                                    <nav>
                                                                        <div class="nav nav-tabs mb-6" id="nav-tab"
                                                                            role="tablist">
                                                                            <button class="nav-link active"
                                                                                id="nav-home-tab" data-bs-toggle="tab"
                                                                                data-bs-target="#nav-home" type="button"
                                                                                role="tab" aria-controls="nav-home"
                                                                                aria-selected="true">Validasi</button>
                                                                            <button class="nav-link"
                                                                                id="nav-profile-tab"
                                                                                data-bs-toggle="tab"
                                                                                data-bs-target="#nav-profile"
                                                                                type="button" role="tab"
                                                                                aria-controls="nav-profile"
                                                                                aria-selected="false">Edit
                                                                                Dokumen</button>
                                                                        </div>
                                                                    </nav>
                                                                    <div class="tab-content" id="nav-tabContent">
                                                                        <div class="tab-pane fade show active"
                                                                            id="nav-home" role="tabpanel"
                                                                            aria-labelledby="nav-home-tab">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <form action="/insertnewstatus"
                                                                                        method="POST"
                                                                                        enctype="multipart/form-data"
                                                                                        class="forms-sample">
                                                                                        @csrf

                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="form-label"
                                                                                                for="exampleInputText1">Validasi
                                                                                            </label>
                                                                                            <div class="form-check">
                                                                                                <input type="radio"
                                                                                                    name="status_id"
                                                                                                    value="3">
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="exampleRadio1">Dokumen
                                                                                                    Direview BPU</label>
                                                                                            </div>
                                                                                            <br />
                                                                                            <div class="form-group">
                                                                                                <label
                                                                                                    class="form-label"
                                                                                                    for="exampleInputText1">Catatan
                                                                                                </label>
                                                                                                <input type="text"
                                                                                                    class="form-control"
                                                                                                    id="exampleInputText1"
                                                                                                    name="catatan">
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
                                                                        <div class="tab-pane fade" id="nav-profile"
                                                                            role="tabpanel"
                                                                            aria-labelledby="nav-home-tab">
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
                                                                                                <div
                                                                                                    class="form-group">
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
                                        </div>
                    </div>
                </div>


            </div>
        </div>
        <?php }} ?>



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
        </tr>
        @endforeach


        </tbody>
        </table>
    </div>
</div>


{{-- alert Delete Pengajuan --}}
<script>
    $('.hapus').click(function() {
        var pengajuanid = $(this).attr('data-id');
        var namapengajuan = $(this).attr('data-nama');
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



@include('reviewer/layoutsReviewer/footer')
