@include('admin/layoutsAdmin/header')

@include('admin/layoutsAdmin/sidebar')

@include('admin/layoutsAdmin/navbar')

<div class="conatiner-fluid content-inner mt-n5 py-0">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Kategori Kerjasama</h4>
                        </div>
                    </div>
                    <div class="card-body">

                        <form
                            action="/insertkategori"
                            method="POST"
                            enctype="multipart/form-data"
                            class="forms-sample">
                            @csrf

                            <div class="form-group">
                                <label for="inputNamaKategori">Nama Kategori</label>
                                <input
                                    type="text"
                                    name="namakategori"
                                    id="kategoriKerjasama"
                                    class="form-control @error('namakategori') is-invalid @enderror"
                                    value="{{ old('namakategori') }}"
                                    autofocus="autofocus">
                                @error('namakategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="inputDeskripsi">Deskripsi</label>
                                <input
                                    type="text"
                                    name="deskripsi"
                                    id="Deskripsi"
                                    class="form-control @error('deskripsi') is-invalid @enderror"
                                    value="{{ old('deskripsi') }}"
                                    autofocus="autofocus">
                                @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <br/>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="/kategori" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin/layoutsAdmin/footer')