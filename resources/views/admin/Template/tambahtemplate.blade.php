@include('layouts/header') @include('layouts/sidebar')
@include('layouts/navbar')

<!-- Form Basic -->
<div class="card mb-4">
    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Form Template Draf Kerjasama</h6>
    </div>
    <div class="card-body">
        <form
            action="{{ url('template') }}"
            method="POST"
            enctype="multipart/form-data"
            class="forms-sample">
            @csrf
            {{-- <div class="form-group">
          <label for="namaDraf">Kategori</label>
          <input type="text" name="namadraf" class="form-control" id="draf">
            @error('namadraf')
             <div style= "color:red">{{ $message }}</div>
        @enderror
    </div>
    --}}

    <div class="form-group">
        <label>Kategori</label>
        <select name="kategori_id" class="form-control">
            <option value="">--Pilih--</option>
            @foreach ($category as $item )
            <option value="{{ $item->id }}">{{ $item->namakategori }}</option>
            @endforeach @error('kategori_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </select>
    </div>

    {{-- <div class="form-group">
          <label for="file template">File Template Kerjasama</label>
          <div class="custom-file">
            <input type="file" name="filedraf" id="customFile" 
            class="custom-file-input @error('filedraf') is-invalid @enderror" value="{{ old('filedraf') }}" autofocus> 
            @error('filedraf')
            <div class="invalid-feedback">{{ $message }}</div>
@enderror
<label class="custom-file-label" for="customFile">Choose file</label>
</div>
</div>
--}}

<div class="form-group">
<div class="custom-file">
<input type="file" name="filedraf" class="custom-file-input" id="customFile">
<label class="custom-file-label" for="customFile">Choose file</label>
</div>

@error('filedraf')
<div style="color:red">{{ $message }}</div>
@enderror

</div>

<div class="form-group">
<label for="deskripsi">Deskripsi</label>
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

<button type="submit" class="btn btn-primary">Submit</button>
<a href="/template" class="btn btn-light">Cancel</a>
</form>
</div>
</div>

@include('layouts/footer')