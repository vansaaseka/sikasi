@include('admin/layoutsAdmin/header')

@include('admin/layoutsAdmin/sidebar')

@include('admin/layoutsAdmin/navbar')

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Status Verifikasi</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form
                        action="/insertstatus"
                        method="POST"
                        enctype="multipart/form-data"
                        class="forms-sample">
                        @csrf

                        <div class="form-group">
                            <label for="status">Nama Status</label>
                            <input
                                type="text"
                                name="namastatus"
                                id="status"
                                class="form-control"
                                autofocus="autofocus">
                            @error('status')
                            <div class="invalid-feedback">Example invalid form file feedback</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/status" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin/layoutsAdmin/footer')