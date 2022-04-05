
@include('layouts/header')

@include('layouts/sidebar')

@include('layouts/navbar')
    
      
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Kategori Kerjasama</h4>
        <form action="/updatekategori/{{ $kategori->id }}" method="POST" enctype="multipart/form-data">
          @csrf

            <br />
            
            <div class="form-group">
                <label for="exampleInputUsername1">Nama Kategori</label>
                <input type="text" name="namakategori" class="form-control" id="kategoriKerjasama" placeholder="Nama Kategori"
                value="{{ $kategori->namakategori }}"> 
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" id="Deskripsi" placeholder="Deskrispi"
                value="{{ $kategori->deskripsi}}">
              </div>
              
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="/kategori" class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>

      @include('layouts/footer')