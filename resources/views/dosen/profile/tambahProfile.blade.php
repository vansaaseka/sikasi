  @include('dosen/layoutsDosen/header')

  @include('dosen/layoutsDosen/sidebar')

  @include('dosen/layoutsDosen/navbar')

 
  <div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    </div>
  <form action="/insertprofile" method="POST" enctype="multipart/form-data" class="forms-sample"> @csrf

            <div class="row">
                <div class="col-lg-12">
                    <!-- Select2 -->
                    <div class="card mb-4">
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Identitas</h6>
                        </div>
                        <div class="card-body">

                          <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" id="nama" 
                            value=<?= Auth::user()->name ?>> 
                          </div>
            
                          <div class="form-group">
                            <label for="exampleInputUsername1">Email</label>
                            <input readonly type="text" name="email"
                             class="form-control" id="drafKerjasama" 
                            value=<?= Auth::user()->email ?>> 
                          </div>
            
                          <div class="form-group">
                            <label for="no_hp">No HP</label>
                            <input type="text" name="nomorhp" class="form-control" id="nomorhp"
                            value=<?= Auth::user()->nomorhp ?>>  
                          </div>
                            

                        </div>
                    </div>

                    <div class="card mb-4">
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Detail Profil</h6>
                        </div>
                        <div class="card-body">

                          <div class="form-group">
                            <label for="photodosen">Photo</label>
                            <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            @error('')
                            <div style="color:red">{{ $message }}</div>
                            @enderror
                        </div>

                          <div class="form-group">
                            <label for="select2SinglePlaceholder">Asal Prodi</label>
                            <select name="prodi_id" class="placeholder form-control">
                                <option value="">--Pilih--</option>
                                @foreach ($prodi as $item )
                                <option value="{{ $item->id }}">{{ $item->namaprodi }}</option>  
                                @endforeach
                                
                              @error('prodi_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                                </select>
                          </div>

                            <div class="form-group">
                                <label for="">Alamat </label>
                                <input
                                    type="text"
                                    name="alamat"
                                    id="alamatdosen"
                                    class="form-control @error('') is-invalid @enderror"
                                    value=""
                                    autofocus="autofocus">
                                @error('')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        

                        </div>
                    </div>
                </div>

                &nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary">Submit</button>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a href={{ url()->previous() }} class="btn btn-light">Cancel</a>

            </div>
            </form>
        </div>
        
        <br/>
  @include('dosen/layoutsDosen/footer')