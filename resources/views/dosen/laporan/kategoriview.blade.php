@include('dosen/layoutsDosen/header')
@include('dosen/layoutsDosen/sidebar')
@include('dosen/layoutsDosen/navbar')
@include('sweetalert::alert')


<div class="container-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Laporan</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-4">
                        <form action="{{ route('post.tampilkan-data') }}" method="POST" id="formPilihKategori">
                            @csrf
                            <div class="form-group">
                                <label for="proditerlibat_id">Pilih Kategori:</label>
                                <select name="proditerlibat_id" id="proditerlibat_id" class="form-control">
                                    <option value="">-- Pilih Prodi --</option>
                                    @foreach ($prodi as $prod)
                                        <option value="{{ $prod->id }}">{{ $prod->namaprodi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Tampilkan Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('dosen/layoutsDosen/footer')
