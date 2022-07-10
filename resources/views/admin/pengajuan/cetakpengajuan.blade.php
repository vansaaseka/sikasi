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
                        <a href="{{ route('export_pengajuan') }}" type="button" class="btn btn-success">Export
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-4">
                        <form action="/filter" method="post">
                            @csrf
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div div class="form-group">
                                                <label class="form-label" for="exampleInputdate"> Tanggal Awal</label>
                                                <input type="date" name="tanggalmulai" id="tanggalmulai"
                                                    value="{{ old('tanggalmulai') }}" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label" for="exampleInputdate"> Tanggal Akhir</label>
                                                <input type="date" name="tanggalakhir"
                                                    value="{{ old('tanggalakhir') }}" id="tanggalakhir"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label" for="search" style="color: white"> .</label>
                                            <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                <button class="btn btn-primary " type="submit" name="submit"
                                                    value="table">Search</button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                        </form>

                        <br />
                        {{-- <table id="datatable" class="table table-striped" data-toggle="data-table"> --}}
                        <table id="examples" class="table-border display nowrap" style="width:100%">
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
                                        <td>{{ $datapengajuan->created_at->formatLocalized('%A, %d %B %Y') }}</td>
                                        <td>{{ date('Y-m-d', strtotime($datapengajuan->tanggalmulai)) }}</td>
                                        <td>{{ date('Y-m-d', strtotime($datapengajuan->tanggalakhir)) }}</td>
                                        <td>
                                            {{ $diff = Carbon\Carbon::parse($datapengajuan->tanggalakhir)->diffForHumans() }}
                                        </td>
                                        <td>{{ $datapengajuan->mitra->namamitra }}</td>

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

<script>
    $('#tanggalmulai').on('input', function() {
        $('#tanggalakhir').attr('min', this.value);
    });
    $('#tanggalakhir').on('input', function() {
        $('#tanggalmulai').attr('max', this.value);
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
