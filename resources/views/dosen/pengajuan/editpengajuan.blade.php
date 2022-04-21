@include('dosen/layoutsDosen/header')
@include('dosen/layoutsDosen/sidebar')
@include('dosen/layoutsDosen/navbar')
        
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
                    <form action="/updatepengajuan/{{ $pengajuan->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
             

                <div class="form-group">
                  <div class="custom-file">
                    <input type="file" name="dokumen" id="customFile" class="form-control" value="{{ old('dokumen') }}" autofocus> 
                 
                  @error('dokumen')
                  <div class="invalid-feedback">Example invalid form file feedback</div>
                  @enderror
                  </div>
                </div>
                
                
                
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/template" class="btn btn-danger">Cancel</a>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>   

@include('dosen/layoutsDosen/footer')
