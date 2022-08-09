@include('admin/layoutsAdmin/header')

@include('admin/layoutsAdmin/sidebar')

@include('admin/layoutsAdmin/navbar')

@include('sweetalert::alert')

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Template Kerjasama</h4>
                    </div>
                    {{-- <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modaltambahprodi"
                            id="#modaltambahprodi">Tambah <i class="fa fa-plus"></i>
                        </a>
                    </div> --}}
                    {{-- Modal Tambah --}}
                    <div class="modal fade" id="modaltambahprodi" tabindex="-1" role="dialog"
                        aria-labelledby="staticBackdropLiveLabel" aria-hidden="true" style="text-align: left">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLiveLabel">
                                        Tambah
                                        Data Template</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body">
                                        <div class="row d-flex justify-content">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form action="inserttemplate" method="POST"
                                                            enctype="multipart/form-data" class="forms-sample">
                                                            @csrf

                                                            <div class="form-group">

                                                                <div class="form-group">
                                                                    <label for="prodi">Nama Kerjasama</label>

                                                                    <input type="text" name="namatemplate"
                                                                        id="prodi" class="form-control"
                                                                        autofocus="autofocus">
                                                                    @error('naamatemplate')
                                                                        <div class="invalid-feedback">Example invalid form
                                                                            file feedback</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <p style="text-align:center"> Dokumen hanya dalam
                                                                        format .docx</p>

                                                                    <div class="custom-file">
                                                                        <input type="file" name="template"
                                                                            id="customFile" class="form-control"
                                                                            value="{{ old('template') }}" autofocus>
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
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-4">
                        <table id="basic-table" class="table table-striped mb-0" role="grid">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori Kerjasama</th>
                                    <th>File Template</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp

                                @foreach ($template as $data)
                                    <tr role="row" class="odd">
                                        <th scope="row">{{ $no++ }}</th>
                                        {{-- diambil dari as $ -> nama di database  line 46 --}}
                                        <td>{{ $data->namatemplate }}</td>

                                        <td>
                                            <a href="template/{{ $data->template }}">{{ $data->template }}</a>
                                        </td>

                                        <td class="text-center">
                                            <div class="flex align-items-center list-user-action">
                                                <a class="btn btn-sm btn-icon btn-primary">
                                                    <i class="fa fa-edit" data-bs-toggle="modal"
                                                        data-bs-target="#modaledittemplate{{ $data->id }}"
                                                        id="#modaledittemplate{{ $data->id }}">
                                                    </i>
                                                </a>
                                                {{-- Modal --}}
                                                <div class="modal fade" id="modaledittemplate{{ $data->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="staticBackdropLiveLabel" aria-hidden="true"
                                                    style="text-align: left">
                                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLiveLabel">
                                                                    Edit
                                                                    Data Template</h5>
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
                                                                                        action="/updatetemplate/{{ $data->id }}"
                                                                                        method="POST"
                                                                                        enctype="multipart/form-data"
                                                                                        class="forms-sample">
                                                                                        @csrf

                                                                                        <div class="form-group">
                                                                                            <div class="form-group">
                                                                                                <p
                                                                                                    style="text-align:center">
                                                                                                    Dokumen hanya dalam
                                                                                                    format .docx</p>
                                                                                                <div
                                                                                                    class="custom-file">
                                                                                                    <input
                                                                                                        type="file"
                                                                                                        name="template"
                                                                                                        id="customFile"
                                                                                                        class="form-control @error('template') is-invalid @enderror"
                                                                                                        value="{{ old('template', $data->template) }}"
                                                                                                        autofocus>
                                                                                                    @error('template')
                                                                                                        <div
                                                                                                            class="invalid-feedback">
                                                                                                            {{ $message }}
                                                                                                        </div>
                                                                                                    @enderror
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

<!--Row-->

@include('admin/layoutsAdmin/footer')

{{-- alert Delete Template --}}
<script>
    $('.delete').click(function() {
        var idtemplate = $(this).attr('id-data');
        var namatemplate = $(this).attr('nama-data');
        swal({
            title: "Apakah kamu yakin??",
            text: "Menghapus file draf " + namatemplate + " ",
            icon: "warning",
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                window.location = "/hapustemplate/" + idtemplate + ""
                swal("Data berhasil Dihapus!", {
                    icon: "success"
                });
            } else {
                swal("Data tidak berhasil dihapus");
            }
        });
    });
</script>
