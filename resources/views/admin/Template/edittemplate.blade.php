
@include('layouts/header')

@include('layouts/sidebar')

@include('layouts/navbar')
    
      
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Template Draf Kerjasama</h4>
        <form action="{{ url('template/'.$template->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
          @csrf

            <br />
            
            {{-- <div class="form-group">
                <label for="exampleInputUsername1">Nama Draf</label>
                <input type="text" name="namadraf" class="form-control" id="drafKerjasama" placeholder="Nama Draf"
                value="{{ $draf->namadraf }}"
                > 
              </div> --}}

              <div class="form-group">
                <label>Kategori</label>
                <select name="kategori_id" class="form-control">
                    <option value="">--Pilih--</option>
                    @foreach ($category as $item )
                    <option value= "{{ $item->id }}"{{ old('kategori_id', $template->kategori_id) == $item->id ? 'selected' : null}}>{{ $item->namakategori }}</option>  
                    @endforeach
                    
                </select>
            </div>

              <div class="form-group">
                <div class="custom-file">
                  <input type="file" name="filedraf" id="customFile" class="custom-file-input @error('filedraf') is-invalid @enderror" value="{{ old('filedraf') }}" autofocus> 
                <label class="custom-file-label" for="customFile">Choose file</label>
                @error('filedraf')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>
              </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi</label>
                <input type="text" name="deskripsi" id="Deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"  
                value="{{ old('deskripsi', $template->deskripsi)}}" autofocus>
               @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
               @enderror
              </div>
              
              <button type="submit" class="btn btn-primary">Submit</button>
              <a href="/template" class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
      </div>

      @include('layouts/footer')