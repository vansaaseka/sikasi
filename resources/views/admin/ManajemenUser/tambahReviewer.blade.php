@include('admin/layoutsAdmin/header')
@include('admin/layoutsAdmin/sidebar')
@include('admin/layoutsAdmin/navbar')
@include('sweetalert::alert')

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Tambah Akun Reviewer</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/insertakun" method="POST" enctype="multipart/form-data" class="forms-sample">
                        @csrf

                        <br />

                        <div class="form-group">
                            <label for="exampleInputUsername">Username</label>
                            <input type="text" name="name"
                                class="form-control @error('namakategori') is-invalid @enderror"
                                value="{{ old('name') }}" id="name" required="required" autocomplete="name"
                                autofocus="autofocus">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                id="email" aria-describedby="emailHelp" required="required" autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                value="{{ old('password') }}" id="exampleInputPassword" name="password"
                                required="required" autocomplete="password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Repeat Password</label>
                            <input type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                value="{{ old('password_confirmation') }}" id="exampleInputPasswordRepeat"
                                name="password_confirmation" required="required" autocomplete="new-password">
                            @error('namakategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Role --}}
                        <input name="role" type="hidden" value="3">

                        <button type="submit" class="btn btn-primary">Submit</button>
                        {{-- <a href="/kategori" class="btn btn-light">Cancel</a> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@include('admin/layoutsAdmin/footer')
