@include('dosen/layoutsDosen/header') 
@include('dosen/layoutsDosen/sidebar')
@include('dosen/layoutsDosen/navbar')

<div class="conatiner-fluid content-inner mt-n5 py-0">

    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Pengajuan Kerjasama</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form id="form-wizard1" class="text-center mt-3"
                    action="/insertpengajuan"
                    method="POST"
                    enctype="multipart/form-data"
                    >
                    @csrf
                        <ul id="top-tab-list" class="p-0 row list-inline">
                            <li class="col-lg-3 col-md-6 text-start mb-2 active" id="account">
                                <a href="javascript:void();">
                                    <div class="iq-icon me-3">
                                        <svg
                                            class="svg-icon"
                                            xmlns="http://www.w3.org/2000/svg"
                                            height="20"
                                            width="20"
                                            fill="none"
                                            viewbox="0 0 24 24"
                                            stroke="currentColor">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <span>Mitra</span>
                                </a>
                            </li>
                            <li id="personal" class="col-lg-3 col-md-6 mb-2 text-start">
                                <a href="javascript:void();">
                                    <div class="iq-icon me-3">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            height="20"
                                            width="20"
                                            fill="none"
                                            viewbox="0 0 24 24"
                                            stroke="currentColor">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    <span>Informasi</span>
                                </a>
                            </li>
                            <li id="payment" class="col-lg-3 col-md-6 mb-2 text-start">
                                <a href="javascript:void();">
                                    <div class="iq-icon me-3">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            height="20"
                                            width="20"
                                            fill="none"
                                            viewbox="0 0 24 24"
                                            stroke="currentColor">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <span>Dokumen</span>
                                </a>
                            </li>
                            <li id="confirm" class="col-lg-3 col-md-6 mb-2 text-start">
                                <a href="javascript:void();">
                                    <div class="iq-icon me-3">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            height="20"
                                            width="20"
                                            fill="none"
                                            viewbox="0 0 24 24"
                                            stroke="currentColor">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <span>Finish</span>
                                </a>
                            </li>
                        </ul>
                        <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card text-start">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4">Mitra</h3>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 1 - 4</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Nama Dagang Mitra
                                            </label>
                                            <input type="text" class="form-control" name="namadagangmitra" placeholder=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Nama Mitra *</label>
                                            <input type="text" class="form-control" name="namamitra" placeholder=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Logo Resmi Mitra *</label>
                                            <input type="file" class="form-control" name="logo" placeholder=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="choices-single-default">Kategori Mitra</label>
                                            <select
                                                class="form-select"
                                                data-trigger="data-trigger"
                                                name="kategori_id"
                                                id="choices-single-default">
                                                <option value="">--Pilih--</option>
                                                @foreach ($kategorimitra as $item )
                                                <option value="{{ $item->id }}">{{ $item->kategorimitra }}</option>
                                                @endforeach 
                                                {{-- @error('kategori_id')
                                                <div class="invalid-feedback">Example invalid form file feedback</div>
                                                @enderror --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Alamat Lengkap Mitra *</label>
                                            <input type="text" class="form-control" name="alamat" placeholder=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Email Mitra *</label>
                                            <input type="email" class="form-control" name="email" placeholder=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Nama Lengkap Penadatanganan Mitra *</label>
                                            <input type="text" class="form-control" name="namapenandatangan" placeholder=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Jabatan Penandatangan Mitra *</label>
                                            <input type="text" class="form-control" name="jabatanpenandatangan" placeholder=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Nama Narahubung Mitra</label>
                                            <input type="text" class="form-control" name="narahubung" placeholder=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Nomor HP Narahubung Mitra *</label>
                                            <input type="text" class="form-control" name="no_hp" placeholder=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button
                                type="button"
                                name="next"
                                class="btn btn-primary next action-button float-end"
                                value="Next">Next</button>
                        </fieldset>
                        <fieldset>
                            <div class="form-card text-start">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4">Informasi Perjanjian:</h3>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 2 - 4</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="MultipleSelect">Ruang Lingkup Perjanjian</label>
                                            {{-- <select class="js-example-basic-multiple" name="states[]" multiple="multiple"> --}}
                                            <select
                                                class="multipleselect form-control"
                                                name="ruanglingkup_id"
                                                id="MultipleSelect">
                                                <option value="">--Pilih--</option>
                                                @foreach ($ruanglingkup as $item )
                                                <option value="{{ $item->id }}">{{ $item->ruanglingkup }}</option>
                                                @endforeach 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="MultipleSelect">Prodi Yang Terlibat</label>
                                            <select
                                                class="select2-multiple form-control"
                                                name="prodi_id"
                                                id="MultipleSelect">
                                                <option value="">--Pilih--</option>
                                                @foreach ($prodi as $item )
                                                <option value="{{ $item->id }}">{{ $item->namaprodi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputdate">Tanggal Mulai Kerjasama</label>
                                            <input
                                                name="tanggalmulai"
                                                type="date"
                                                class="form-control"
                                                id="exampleInputdate"
                                                value="2019-12-18"></div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputdate">Tanggal Berakhir Kerjasama</label>
                                            <input
                                                name="tanggalakhir"
                                                type="date"
                                                class="form-control"
                                                id="exampleInputdate"
                                                value="2019-12-18"></div>
                                    </div>

                                </div>
                            </div>
                            <button
                                type="button"
                                name="next"
                                class="btn btn-primary next action-button float-end"
                                value="Next">Next</button>
                            <button
                                type="button"
                                name="previous"
                                class="btn btn-dark previous action-button-previous float-end me-1"
                                value="Previous">Previous</button>
                        </fieldset>
                        <fieldset>
                            <div class="form-card text-start">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4">Dokumen Kerjama:</h3>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 3 - 4</h2>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Dokumen Kerjasama:</label>
                                    <input type="file" class="form-control" name="dokumen" ></div>
                            </div>
                            <button
                                type="submit"
                                name="next"
                                class="btn btn-primary next action-button float-end"
                                value="Submit">Submit</button>
                            <button
                                type="button"
                                name="previous"
                                class="btn btn-dark previous action-button-previous float-end me-1"
                                value="Previous">Previous</button>
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4 text-left">Finish:</h3>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 4 - 4</h2>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <h2 class="text-success text-center">
                                    <strong>SUCCESS !</strong>
                                </h2>
                                <br>
                                <div class="row justify-content-center">
                                    <div class="col-3">
                                        <img
                                       
                                            src= "{{asset('HOPE/assets/images/pages/img-success.png')}}"
                                            class="img-fluid"
                                            alt="fit-image"></div>
                                </div>
                                <br>
                                <br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('dosen/layoutsDosen/footer')