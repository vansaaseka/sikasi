@include('layouts/header') @include('layouts/sidebar')
@include('layouts/navbar')

<!-- Form Basic -->
<div class="card mb-4">
    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Form Basic</h6>
    </div>
    <div class="card-body">
        <form
            action="/inserprofile"
            method="POST"
            enctype="multipart/form-data"
            class="forms-sample">
            @csrf
            <div class="form-group">
                <label for="namaDraf">Nama Draf Kerjasama</label>
                <input type="text" name="namadraf" class="form-control" id="draf">
                @error('namadraf')
                <div style="color:red">{{ $message }}</div>
                @enderror
            </div>

            {{-- 
        <div class="form-group">
          <label for="namaDraf">Choose File</label>
          <input type="file" name="filedraf" class="form-control" id="draf" placeholder="Enter Nama Draf">
        </div> --}}

            <div class="form-group">
                <div class="custom-file">
                    <input type="file" name="filedraf" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>

                @error('filedraf')
                <div style="color:red">{{ $message }}</div>
                @enderror

            </div>

            {{-- <div class="form-group">
            <label>Upload Template Draf Kerjasama </label>
            <input type="file" name="filedraf" class="file-upload-default">
            <div class="input-group col-xs-12">
                  <input type="text" class="form-control file-upload-info" disabled placeholder="Upload  Template Draf Kerjasama ">
                  <span class="input-group-append">
                      <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
             </div>
          </div> --}}

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" id="deskripsi">
                @error('deskripsi')
                <div style="color:red">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/draf" class="btn btn-light">Cancel</a>
        </form>
    </div>
</div>

@include('layouts/footer')