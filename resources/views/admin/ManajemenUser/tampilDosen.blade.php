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
                        <h4 class="m-0 font-weight-bold text">Daftar Akun Dosen</h4>
                    </div>
                    <div class="d-flex justify-content-between flex-wrap">

                        <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4" data-bs-toggle="modal">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#modalimport" id="#modalimport">
                                Import
                            </button>
                        </div>
                        &nbsp;
                        &nbsp;
                        <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <a href="/tambahdosen" type="button" class="btn btn-success">Tambah
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- Modal Import Data User --}}
                <div class="modal fade" id="modalimport" tabindex="-1" role="dialog"
                    aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLiveLabel">
                                    Import User Dosen

                                </h5>

                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="row d-flex justify-content">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="/import_dosen" method="POST"
                                                    enctype="multipart/form-data" class="forms-sample">
                                                    @csrf

                                                    <div class="form-group">
                                                        <div class="form-group">

                                                            <div class="form-group">
                                                                <div class="custom-file">
                                                                    <input type="file" name="file" id="customFile"
                                                                        class="form-control" value="{{ old('') }}"
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
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped" data-toggle="data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Ubah Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Ubah Status</th>
                                <th>Aksi</th>
                        </tfoot>

                        <tbody>

                            @php $no = 1; @endphp
                            @foreach ($dosen as $account)
                                @if ($account->role == 0)
                                    <tr role="row" class="odd">
                                        <th scope="row">{{ $no++ }}</th>
                                        {{-- diambil dari as $ -> nama di database  line 46 --}}
                                        <td>{{ $account->name }}</td>
                                        <td>{{ $account->email }}</td>
                                        <td>
                                            @if ($account->status == 1)
                                                <a href="{{ url('/ubahstatus/' . $account->id) }}"
                                                    class="bbtn btn-sm btn-success">Aktif</a>
                                            @else
                                                <a href="{{ url('/ubahstatus/' . $account->id) }}"
                                                    class="bbtn btn-sm btn-danger">Non-Aktif</a>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- a href=/hapuskategori/{{ $kategori->id}} --}}
                                            <a href="/editakun/{{ $account->id }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger delete btn-sm"
                                                data-id="{{ $account->id }}" data-nama="{{ $account->name }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
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


@include('admin/layoutsAdmin/footer')

<script>
    $('.delete').click(function() {
        var akunid = $(this).attr('data-id');
        var namaakun = $(this).attr('data-nama');
        swal({
            title: "Apakah kamu yakin??",
            text: "Menghapus data " + namaakun + " ",
            icon: "warning",
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if (willDelete) {
                window.location = "/hapusakun/" + akunid + ""
                swal("Data berhasil Dihapus!", {
                    icon: "success"
                });
            } else {
                swal("Data tidak berhasil dihapus");
            }
        });
    });
</script>
