@include('dosen/layoutsDosen/header')
@include('dosen/layoutsDosen/sidebar')
@include('dosen/layoutsDosen/navbar')
@include('sweetalert::alert')
<!-- DataTable with Hover -->

<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Laporan</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <a href="/tambahpengajuan" type="button" class="btn btn-success">Tambah
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-4">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr class="odd text-center">
                                    <th>No</th>
                                    <th>MITRA</th>
                                    <th>TAHUN KERJASAMA</th>
                                    <th>PENGUSUL</th>
                                    <th>JENIS KERJASAMA</th>
                                    <th>NARA HUBUNG MITRA</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($pengajuan as $item)
                                    @if ($item->prodiid == Auth::user()->prodi_id)
                                        <tr role="row ">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->mitra->namamitra }}</td>
                                            <td> {{ date('Y', strtotime($item->tanggalmulai)) }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>
                                                <?php
                                                foreach ($kategori as $sort) {
                                                    if ($sort->id == $item->kategori_id) {
                                                        echo $sort->namakategori;
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td>{{ $item->mitra->narahubung }} -
                                                {{ $item->mitra->no_hp }}</td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-open-modal"
                                                    data-bs-toggle="modal" data-bs-target="#btnFormPDF"
                                                    data-pengajuanid="{{ $item->id }}">
                                                    {{-- <i class="fa-regular fa-file"></i> --}}
                                                    <i class="fa-regular fa-file-pdf"></i>
                                                </button>
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

{{--
<div class="modal fade" id="btnSelect">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Export Laporan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <button type="button" class="btn btn-primary btn-open-modal" data-bs-toggle="modal"
                    data-bs-target="#btnFormPDF" data-pengajuanid="{{ $item->id }}">
                    <i class="fa-regular fa-file-pdf"></i> Export PDF
                </button>
                <button type="button" class="btn btn-primary btn-open-modal" data-bs-toggle="modal"
                    data-bs-target="#btnFormWORD" data-pengajuanid="{{ $item->id }}" alt="Export Word">
                    <i class="bi bi-filetype-docx"></i> Export WORD
                </button>
            </div>
        </div>
    </div>
</div> --}}


{{-- <div class="modal fade" id="btnFormWORD">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Laporan WORD</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('post.laporanword') }}" method="POST">
                    @csrf
                    <input type="hidden" name="pengajuan_id" value="{{ $item->id ?? '' }}" id="pengajuanIdInput"
                        readonly>
                    @foreach ($pengajuan as $item)
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="judulKerjasama" value="{{ $item->tentang }}">
                        <input type="hidden" name="mitraKerjasama" value="{{ $item->mitra->namamitra }}">
                        <input type="hidden" name="ruangLingkup" value="{{ $item->ruanglingkup_id }}">
                    @endforeach
                    <div class="form-group">
                        <label class="form-label" for="link">Link Dokumentasi Kegiatan</label>
                        <input type="text" class="form-control" name="linkDokumen" id="link">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="link">Hasil Pelaksanaan (OUTPUT & OUTCOME)</label>
                        <textarea name="hasilPelaksanaan" class="form-control" cols="51" rows="5"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Download WORD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}


<div class="modal fade" id="btnFormPDF" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Laporan PDF</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('post.laporan') }}" method="POST">
                    @csrf
                    <input type="hidden" name="pengajuan_id" value="{{ $item->id ?? '' }}" id="pengajuanIdInput"
                        readonly>
                    @foreach ($pengajuan as $item)
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="judulKerjasama" value="{{ $item->tentang }}">
                        <input type="hidden" name="refrensiKerjasama" value="{{ $item->kategori->namakategori }}">
                        <input type="hidden" name="mitraKerjasama" value="{{ $item->mitra->namamitra }}">
                        <input type="hidden" name="ruangLingkup" value="{{ $item->ruanglingkup_id }}">
                    @endforeach
                    <div class="form-group">
                        <label class="form-label" for="link">Link Dokumentasi Kegiatan</label>
                        <input type="text" class="form-control" name="linkDokumen" id="link">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="link">Hasil Pelaksanaan (OUTPUT & OUTCOME)</label>
                        <textarea name="hasilPelaksanaan" class="form-control" cols="51" rows="5"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Download PDF</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>


@include('dosen/layoutsDosen/footer')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalTriggerButtons = document.querySelectorAll('.btn-open-modal');

        modalTriggerButtons.forEach(button => {
            button.addEventListener('click', function() {
                const pengajuanId = this.getAttribute('data-pengajuanid');
                console.log('ID Pengajuan:', pengajuanId);

                document.getElementById('pengajuanIdInput').value = pengajuanId;
            });
        });
    });
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
