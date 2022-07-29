@include('admin/layoutsAdmin/header')

@include('admin/layoutsAdmin/sidebar')

@include('admin/layoutsAdmin/navbar')

@include('sweetalert::alert')


<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Daftar Kategori Mitra</h4>
                    </div>
                    <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modaltambahkategorimitra"
                            id="#modaltambahkategorimitra">Tambah <i class="fa fa-plus"></i>
                        </a>
                    </div>
                    {{-- Modal Tambah --}}
                    <div class="modal fade" id="modaltambahkategorimitra" tabindex="-1" role="dialog"
                        aria-labelledby="staticBackdropLiveLabel" aria-hidden="true" style="text-align: left">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLiveLabel">
                                        Tambah
                                        Data Kategori Mitra</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <div class="row d-flex justify-content">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form action="insertkategorimitra" method="POST"
                                                            enctype="multipart/form-data" class="forms-sample">
                                                            @csrf

                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <label for="kategorimitra">Kategori Mitra</label>
                                                                    <br />
                                                                    <br />
                                                                    <input type="text" name="kategorimitra"
                                                                        id="kategorimitra" class="form-control"
                                                                        autofocus="autofocus">
                                                                    @error('kategorimitra')
                                                                        <div class="invalid-feedback">Example invalid form
                                                                            file feedback</div>
                                                                    @enderror
                                                                </div>

                                                                <button type="submit"
                                                                    class="btn btn-primary next action-button float-end"
                                                                    value="Submit">Submit</button>
                                                            </div>
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
                <div class="card-body">
                    <div class="table-responsive mt-4">
                        <table id="basic-table" class="table table-striped mb-0" role="grid">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori Mitra</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp

                                @foreach ($kategorimitra as $data)
                                    <tr role="row" class="odd">
                                        <th scope="row">{{ $no++ }}</th>
                                        {{-- diambil dari as $ -> nama di database --}}
                                        <td>
                                            <div class="d-flex align-items-center">
                                                {{ $data->kategorimitra }}</div>
                                        </td>

                                        <td class="text-center">
                                            <div class="flex align-items-center list-user-action">
                                                <a class="btn btn-sm btn-icon btn-primary">
                                                    <i class="fa fa-edit" data-bs-toggle="modal"
                                                        data-bs-target="#modaleditkategorimitra{{ $data->id }}"
                                                        id="#modaleditkategorimitra{{ $data->id }}">
                                                    </i>
                                                </a>
                                                {{-- Modal Edit --}}
                                                <div class="modal fade" id="modaleditkategorimitra{{ $data->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="staticBackdropLiveLabel" aria-hidden="true"
                                                    style="text-align: left">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLiveLabel">
                                                                    Edit
                                                                    Data Kategori Mitra</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="modal-body">
                                                                    <div class="row d-flex justify-content">
                                                                        <div class="col-md-12">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <form
                                                                                        action="/updatekategorimitra/{{ $data->id }}"
                                                                                        method="POST"
                                                                                        enctype="multipart/form-data"
                                                                                        class="forms-sample">
                                                                                        @csrf

                                                                                        <div class="form-group">
                                                                                            <div class="form-group">
                                                                                                <div class="form-group">
                                                                                                    <label
                                                                                                        for="kategorimitra">Nama
                                                                                                        Kategori
                                                                                                        Mitra</label>
                                                                                                    <br />
                                                                                                    <br />
                                                                                                    <input
                                                                                                        type="text"
                                                                                                        name="kategorimitra"
                                                                                                        class="form-control"
                                                                                                        id="daftarkategorimitra"
                                                                                                        placeholder="Nama kategorimitra"
                                                                                                        value="{{ $data->kategorimitra }}">
                                                                                                </div>
                                                                                            </div>

                                                                                            <button type="submit"
                                                                                                class="btn btn-primary next action-button float-end"
                                                                                                value="Submit">Submit</button>
                                                                                        </div>
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
                                                <a href="#" class="btn btn-sm btn-icon btn-danger delete"
                                                    data-id="{{ $data->id }}"
                                                    data-nama="{{ $data->kategorimitra }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>

                                            </div>
                                        </td>
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

{{-- alert Delete kategorimitra --}}

<script>
    $('.delete').click(function() {
        var kategorimitraid = $(this).attr('data-id');
        var namakategorimitra = $(this).attr('data-nama');
        swal({
                title: "Apakah kamu yakin??",
                text: "Menghapus data kategorimitra: " + namakategorimitra + " ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/hapuskategorimitra/" + kategorimitraid + ""
                    swal("Data berhasil Dihapus!", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak berhasil dihapus");
                }
            });
    });
</script>
