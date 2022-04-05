@include('layouts/header')

@include('layouts/sidebar')

@include('layouts/navbar')



<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Form Account Verifikator</h4>
        <form action="/insertakun" method="POST" enctype="multipart/form-data" class="forms-sample">
            @csrf

            <br />
            
            <div class="form-group">
                <label for="exampleInputUsername">Username</label>
                <input type="text" name="name" class="form-control @error('namakategori') is-invalid @enderror" value="{{ old('name') }}" id="name"  name="name" required autocomplete="name" autofocus>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
               @enderror
            </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" aria-describedby="emailHelp"  name="email" required autocomplete="email">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
               @enderror
              </div>
              
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" id="exampleInputPassword"  name="password" required autocomplete="password">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
               @enderror
              </div>

              <div class="form-group">
                <label>Repeat Password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" id="exampleInputPasswordRepeat"
                 name="password_confirmation" required autocomplete="new-password">
                 @error('namakategori')
                 <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              {{-- Input Role --}}
              <input name="role" type="hidden" value="2">
              
              <button type="submit" class="btn btn-primary">Submit</button>
              {{-- <a href="/kategori" class="btn btn-light">Cancel</a> --}}
            </form>
          </div>
        </div>
      </div>

@include('layouts/footer')