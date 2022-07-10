@include('admin/layoutsAdmin/header')

@include('admin/layoutsAdmin/sidebar')

@include('admin/layoutsAdmin/navbar')

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="m-0 font-weight-bold text-primary">Daftar Akun Verifikator</h4>
                    </div>
                    <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <a href="/tambahverifikator" type="button" class="btn btn-success">Tambah
                            <i class="fa fa-plus"></i>
                        </a>
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
                                @foreach ($verifikator as $account)
                                    @if ($account->role == 2)
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
