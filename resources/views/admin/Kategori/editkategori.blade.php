@include('admin/layoutsAdmin/header')

@include('admin/layoutsAdmin/sidebar')

@include('admin/layoutsAdmin/navbar')

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
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
                            action="/updatekategori/{{ $kategori->id }}"
                            method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="namakategori">Nama Kategori</label>
                                <input
                                    type="text"
                                    name="namakategori"
                                    class="form-control"
                                    id="kategoriKerjasama"
                                    placeholder="Nama Kategori"
                                    value="{{ $kategori->namakategori }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Deskripsi</label>
                                <input
                                    type="text"
                                    name="deskripsi"
                                    class="form-control"
                                    id="Deskripsi"
                                    placeholder="Deskrispi"
                                    value="{{ $kategori->deskripsi}}">
                            </div>

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