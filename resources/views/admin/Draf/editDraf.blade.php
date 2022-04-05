
@include('layouts/header')

@include('layouts/sidebar')

@include('layouts/navbar')
    
      
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Template Draf Kerjasama</h4>
        <form action="/updatedraf/{{ $draf->id }}" method="POST" enctype="multipart/form-data">
          @csrf

            <br />
            
            <div class="form-group">
                <label for="exampleInputUsername1">Nama Draf</label>
                <input type="text" name="namadraf" class="form-control" id="drafKerjasama" placeholder="Nama Draf"
                value="{{ $draf->namadraf }}"> 
              </div>

              <div class="form-group">
                <div class="custom-file">
                  <input type="file" name="filedraf" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
              </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" id="Deskripsi" placeholder="Deskrispi"
                value="{{ $draf->deskripsi}}">
              </div>
              
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="/draf" class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>

      @include('layouts/footer')