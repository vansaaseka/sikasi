@include('layouts/header')

@include('layouts/sidebar')

@include('layouts/navbar')



<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Kategori Kerjasama</h4>
        <form action="/insertkategori" method="POST" enctype="multipart/form-data" class="forms-sample">
            @csrf

            <br />
            
            <div class="form-group">
                <label for="inputNamaKategori">Nama Kategori</label>
                <input type="text" name="namakategori"  id="kategoriKerjasama" class="form-control @error('namakategori') is-invalid @enderror" value="{{ old('namakategori') }}" autofocus>
                @error('namakategori')
                <div class="invalid-feedback">{{ $message }}</div>
               @enderror
            </div>

              <div class="form-group">
                <label for="inputDeskripsi">Deskripsi</label>
                <input type="text" name="deskripsi" id="Deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ old('deskripsi') }}" autofocus>
                @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
               @enderror
              </div>
              
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="/kategori" class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>

@include('layouts/footer')