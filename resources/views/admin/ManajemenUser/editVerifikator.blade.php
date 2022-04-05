@include('layouts/header')

@include('layouts/sidebar')

@include('layouts/navbar')



<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Form Account Reviewer</h4>
        <form action="/updateakun/{{ $data->id }}" method="POST" enctype="multipart/form-data" class="forms-sample">
            @csrf

            <br />
            
            <div class="form-group">
                <label for="exampleInputUsername">Username</label>
                <input type="text" name="name" class="form-control @error('email') is-invalid @enderror" id="name" placeholder="Input Username" name="name" required autocomplete="name" autofocus
                value="{{ $data->name }}"> 
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
               @enderror

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="@error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" placeholder="Input Email" name="email" required autocomplete="email"
                value="{{ $data->email }}"> 
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
               @enderror
              </div>

              {{-- <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="exampleInputPassword" placeholder="Input Password" name="password" required autocomplete="password">
              </div>
              <div class="form-group">
                <label>Repeat Password</label>
                <input type="password" class="form-control" id="exampleInputPasswordRepeat"
                  placeholder=" Input Repeat Password" name="password_confirmation" required autocomplete="new-password">
              </div> --}}

              {{-- Input Role --}}
              <input name="role" type="hidden" value="2">
              
              <button type="submit" class="btn btn-primary">Submit</button>
              {{-- <a href="/kategori" class="btn btn-light">Cancel</a> --}}
            </form>
          </div>
        </div>
      </div>
