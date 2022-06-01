@include('layouts/header')

@include('layouts/sidebar')

@include('layouts/navbar')

<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Template Draf Kerjasama</h6>
            </div>

            <div class="table-responsive p-3">
                <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <a href="/tambahdraf" type="button" class="btn btn-success">Tambah <i class="fa fa-plus"></i> </a>
                </div>
            </div>

            <br />

            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Kerjasama</th>
                            <th>File Draf Kerjasama</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                        @foreach ($draf as $datadraf)
                            <tr role="row" class="odd">
                                <th scope="row">{{ $no++ }}</th>
                                {{-- diambil dari as $ -> nama di database  line 46 --}}
                                <td>{{ $datadraf->namadraf }}</td>

                                {{-- <td>
                      {{ $datadraf->filedraf }}
                    </td> --}}

                                {{-- <iframe src="{{ asset('filedrafkerjasama/'.$datadraf->filedraf) }}" alt=""> --}}

                                <td><a href="filedrafkerjasama/{{ $datadraf->filedraf }}">{{ $datadraf->filedraf }}</a>
                                </td>


                                <td>{{ $datadraf->deskripsi }}</td>

                                <td>

                                    <a href="#" class="btn btn-danger delete" id-data="{{ $datadraf->id }}"
                                        nama-data="{{ $datadraf->namadraf }}"><i class="fa fa-trash"></i></a>
                                    <a href="/editdraf/{{ $datadraf->id }}" class="btn btn-info"><i
                                            class="fa fa-edit"></i></a>
                                    {{-- <a href="/hapusdraf/{{ $datadraf->id}}" class="btn btn-danger"><i class="fa fa-trash"></i></a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>
<!--Row-->

@include('layouts/footer')

{{-- alert Delete Draf --}}
<script>
    $('.delete').click(function() {
        var drafid = $(this).attr('id-data');
        var namadraf = $(this).attr('nama-data');
        swal({
                title: "Apakah kamu yakin??",
                text: "Menghapus file draf " + namadraf + " ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/hapusdraf/" + drafid + ""
                    swal("Data berhasil Dihapus!", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak berhasil dihapus");
                }
            });
    });
</script>
