@include('verifikator/layoutsVerifikator/header')

@include('verifikator/layoutsVerifikator/sidebar')

@include('verifikator/layoutsVerifikator/navbar')
@include('sweetalert::alert')

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="conatiner-fluid content-inner mt-n5 py-0">
        <div>
            <div class="row">
                <div class="col-lg-12 mb-4">

                    <div class="card">

                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Edit Profil</h4>
                            </div>

                            <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalimport" id="#modalimport">
                                    Ubah Password
                                </button>
                            </div>

                        </div>
                        {{-- Modal Import Data User --}}
                        <div class="modal fade" id="modalimport" tabindex="-1" role="dialog"
                            aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLiveLabel">
                                            Ubah Password
                                        </h5>

                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="row d-flex justify-content">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form action="/ubahpassword" method="POST"
                                                            enctype="multipart/form-data" class="forms-sample">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Password Saat Ini</label>
                                                                <input type="password"
                                                                    class="form-control @error('current_password') is-invalid @enderror"
                                                                    id="exampleInputPassword" name="current_password"
                                                                    required="required" autocomplete="password">
                                                                @error('current_password')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="password"
                                                                    class="form-control @error('password') is-invalid @enderror"
                                                                    id="exampleInputPassword" name="password"
                                                                    required="required" autocomplete="password">
                                                                @error('password')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Repeat Password</label>
                                                                <input type="password"
                                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                                    id="exampleInputPasswordRepeat"
                                                                    name="password_confirmation" required="required"
                                                                    autocomplete="new-password">
                                                                @error('password_confirmation')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <button type="submit"
                                                                class="btn btn-primary next action-button float-end"
                                                                value="Submit">Submit</button>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">

                            <form action="/insertprofile" method="POST" enctype="multipart/form-data"
                                class="forms-sample">
                                @csrf
                                <div class="form-group">
                                    @foreach ($profil as $data)
                                        @if ($data->id == Auth::user()->id)
                                            <div class="form-group">
                                                <div class="profile-img-edit position-relative">
                                                    @if ($data->photo == null)
                                                        <img class="profile-pic rounded avatar-100"
                                                            src="HOPE/assets/images/avatars/01.png">
                                                    @else
                                                        <img class="profile-pic rounded avatar-100"
                                                            src="{{ asset($data->photo) }}">
                                                    @endif
                                                    <div class="upload-icone bg-primary">
                                                        <svg class="upload-button" name="photo" width="14"
                                                            height="14" viewBox="0 0 24 24">
                                                            <path fill="#ffffff"
                                                                d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                                                        </svg>
                                                        <input class="file-upload" type="file" name="photo"
                                                            accept="image/*">
                                                    </div>
                                                </div>
                                                <div class="img-extension mt-3">
                                                    <div class="d-inline-block align-items-center">
                                                        <span>Only</span>
                                                        <a href="javascript:void();">.jpg</a>
                                                        <a href="javascript:void();">.png</a>
                                                        <a href="javascript:void();">.jpeg</a>
                                                        <span>allowed</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Nama Lengkap</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    name="name" required autocomplete="name" autofocus
                                                    value=<?= Auth::user()->name ?>>
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label class="form-label" for="turl">Email:</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="email" name="email" required autocomplete="email"
                                                    autofocus value=<?= Auth::user()->email ?>>
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="instaurl">Nomor HP</label>
                                                <input type="text"
                                                    class="form-control @error('nomorhp') is-invalid @enderror"
                                                    id="nomorhp" name="nomorhp" required autocomplete="nomorhp"
                                                    value=<?= Auth::user()->nomorhp ?>>
                                                @error('nomorhp')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group mb-0">
                                                <label class="form-label" for="lurl">Alamat</label>
                                                <input type="text"
                                                    class="form-control @error('alamat') is-invalid @enderror"
                                                    id="alamat" name="alamat" required autocomplete="alamat"
                                                    value=<?= Auth::user()->alamat ?>>
                                                @error('alamat')
                                                    <div class="invalid-feedback"></div>
                                                @enderror
                                            </div>
                                            {{-- <div class="form-group">
                                                <label class="form-label">Asal Prodi</label>
                                                <select name="prodi_id" class="selectpicker form-control"
                                                    data-style="py-0">
                                                    <option value="">--Pilih--</option>
                                                    @foreach ($prodi as $item)
                                                        <option value="{{ $item->id }}" selected>
                                                            {{ $item->namaprodi }}
                                                        </option>
                                                    @endforeach

                                                    @error('prodi_id')
                                                        <div class="invalid-feedback"></div>
                                                    @enderror
                                                </select>
                                            </div> --}}

                                            <br />
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        @endif
                                    @endforeach
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@include('verifikator/layoutsVerifikator/footer')
