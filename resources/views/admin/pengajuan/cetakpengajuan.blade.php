@include('admin/layoutsAdmin/header')
@include('admin/layoutsAdmin/sidebar')
@include('admin/layoutsAdmin/navbar')
<!-- DataTable with Hover -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet" />

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Pengajuan Kerjasama</h4>
                    </div>
                    <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <a href="{{route('export_pengajuan')}}" type="button" class="btn btn-success">Export
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-4">
                        {{-- <table id="datatable" class="table table-striped" data-toggle="data-table"> --}}
                        <table id="examples" class="table-border display nowrap" style="width:100%">
                            <thead>
                                <tr class="odd text-center">
                                    <th>No</th>
                                    <th>Pengusul</th>
                                    <th>Prodi</th>
                                    <th>Tahun Kerjasama</th>
                                    <th>Mitra</th>
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
                                    <th>Catatan</th>
                                    <th>Dokumen Kerjasama</th>
                                </tr>

                            </tfoot>

                            <tbody>
                                @php
                                    $no = 1;
                                @endphp


                                @foreach ($pengajuan as $datapengajuan)
                                    <tr role="row" class="">
                                        <td scope="row">{{ $no++ }}</td>

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

{{-- Cetak Data --}}
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#examples').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
