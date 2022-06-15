@include('admin/layoutsAdmin/header')

@include('admin/layoutsAdmin/sidebar')

@include('admin/layoutsAdmin/navbar')

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Tambah Prodi</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/insertprodi" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf

                        <div class="form-group">
                            <label for="prodi">Nama Prodi</label>
                            <input type="text" name="namaprodi" id="prodi" class="form-control" autofocus="autofocus">
                            @error('namaprodi')
                                <div class="invalid-feedback">Example invalid form file feedback</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/prodi" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin/layoutsAdmin/footer')
