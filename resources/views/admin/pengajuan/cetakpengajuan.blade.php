@include('admin/layoutsAdmin/header')
@include('admin/layoutsAdmin/sidebar')
@include('admin/layoutsAdmin/navbar')



<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.3/b-2.1.1/b-html5-2.1.1/datatables.min.css" />

<script type="text/javascript"
    src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.3/b-2.1.1/b-html5-2.1.1/datatables.min.js"></script>

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Pengajuan Kerjasama</h4>
                    </div>
                    {{-- <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <a href="{{ route('export_pengajuan') }}" type="button" class="btn btn-success">Export
                        </a>
                    </div> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-4">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <div div class="form-group">
                                        <label class="form-label" for="exampleInputdate"> Tanggal Awal</label>
                                        <input type="text" id="min" name="min">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="exampleInputdate"> Tanggal Akhir</label>
                                        <input type="text" id="max" name="max">
                                    </div>
                                </div>

                            </div>

                        </div>

                        <br />
                        {{-- <table id="datatable" class="table table-striped" data-toggle="data-table"> --}}
                        <table id="cetakdata" class="table-border display nowrap" style="width:100%">

                            <thead>
                                <tr class="odd text-center">
                                    <th>No</th>
                                    <th>Kategori Pengajuan</th>
                                    <th>Pengusul</th>
                                    <th>Prodi</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Tanggal Mulai Kerjasama</th>
                                    <th>Tanggal Akhir Kerjasama</th>
                                    <th>Masa Berlaku</th>
                                    <th>Mitra</th>
                                    <th>Kategori Mitra</th>
                                    <th>Dokumen Kerjasama</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="odd text-center">
                                    <th>No</th>
                                    <th>Kategori Pengajuan</th>
                                    <th>Pengusul</th>
                                    <th>Prodi</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Tanggal Mulai Kerjasama</th>
                                    <th>Tanggal Akhir Kerjasama</th>
                                    <th>Masa Berlaku</th>
                                    <th>Mitra</th>
                                    <th>Kategori Mitra</th>
                                    <th>Dokumen Kerjasama</th>
                                </tr>

                            </tfoot>

                            <tbody>
                                @php
                                    $no = 1;
                                @endphp


                                @foreach ($pengajuan as $datapengajuan)
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
                                        {{-- <td>{{ $datapengajuan->created_at->formatLocalized('%A, %d %B %Y') }}</td> --}}
                                        <td>{{ date('Y-m-d', strtotime($datapengajuan->created_at)) }}</td>
                                        <td>{{ date('Y-m-d', strtotime($datapengajuan->tanggalmulai)) }}</td>
                                        <td>{{ date('Y-m-d', strtotime($datapengajuan->tanggalakhir)) }}</td>
                                        <td>
                                            {{ $diff = Carbon\Carbon::parse($datapengajuan->tanggalakhir)->diffForHumans() }}
                                        </td>
                                        <td>{{ $datapengajuan->mitra->namamitra }}</td>
                                        {{-- <td>
                                            <?php
                                                        foreach($ruanglingkup as $rl){
                                                            if($rl->id == $datapengajuan->proditerlibat_id){?>
                                            {{ $rl->ruanglingkup }} <?php }
                                                        }
                                                    ?>
                                        </td> --}}

                                        <td>
                                            <?php
                                                        foreach($kategorimitra as $km){
                                                            if($km->id == $datapengajuan->mitra->kategorimitra_id){?>
                                            {{ $km->kategorimitra }} <?php }
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

{{-- <script>
    $('#tanggalmulai').on('input', function() {
        $('#tanggalakhir').attr('min', this.value);
    });
    $('#tanggalakhir').on('input', function() {
        $('#tanggalmulai').attr('max', this.value);
    });
</script> --}}


<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.1/js/dataTables.dateTime.min.js"></script>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/dt/dt-1.11.3/b-2.1.1/b-html5-2.1.1/date-1.1.1/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/dt/dt-1.11.3/b-2.1.1/b-html5-2.1.1/date-1.1.1/sp-1.4.0/datatables.min.js">
</script>

<script>
    $(document).ready(function() {
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = minDate.val();
                var max = maxDate.val();
                // data[1] is the date column
                var date = new Date(data[4]);

                if (
                    (min === null && max === null) ||
                    (min === null && date <= max) ||
                    (min <= date && max === null) ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );

        // Refilter the table
        $('#min, #max').on('change', function() {
            table.draw();
        });


        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });

        var table = $('#cetakdata').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excelHtml5',

                messageTop: function() {
                    return 'Pengajuan: ' + minDate.val() + ' to ' + maxDate.val()
                }
            }]
        });
    });
</script>
{{-- Cetak Data --}}
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
</script> --}}
