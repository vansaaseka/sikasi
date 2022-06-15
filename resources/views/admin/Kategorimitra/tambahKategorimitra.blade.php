@include('admin/layoutsAdmin/header')

@include('admin/layoutsAdmin/sidebar')

@include('admin/layoutsAdmin/navbar')

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Tambah Kategori Mitra</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/insertkategorimitra" method="POST" enctype="multipart/form-data"
                        class="forms-sample">
                        @csrf

                        <div class="form-group">
                            <label for="kategorimitra">Kategori Mitra</label>
                            <input type="text" name="kategorimitra" id="kategorimitra" class="form-control"
                                autofocus="autofocus">
                            @error('kategorimitra')
                                <div class="invalid-feedback">Example invalid form file feedback</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/kategorimitra" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin/layoutsAdmin/footer')
