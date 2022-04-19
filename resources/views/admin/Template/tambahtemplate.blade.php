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
                        action="{{ url('template') }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="forms-sample">
                        @csrf

                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori_id" class="form-control">
                                <option value="">--Pilih--</option>
                                @foreach ($category as $item )
                                <option value="{{ $item->id }}">{{ $item->namakategori }}</option>
                                @endforeach 
                                @error('kategori_id')
                                <div class="invalid-feedback">Example invalid form file feedback</div>
                                @enderror
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="filedraf" class="form-control" id="customFile">
                            </div>

                            @error('filedraf')
                            <div class="invalid-feedback">Example invalid form file feedback</div>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input
                                type="text"
                                name="deskripsi"
                                id="Deskripsi"
                                class="form-control"
                                value="{{ old('deskripsi') }}"
                                autofocus="autofocus">
                            @error('deskripsi')
                            <div class="invalid-feedback">Example invalid form file feedback</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/template" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin/layoutsAdmin/footer')