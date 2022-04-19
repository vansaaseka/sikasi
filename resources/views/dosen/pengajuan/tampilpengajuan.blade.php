

                                @include('dosen/layoutsDosen/footer')
                                @include('dosen/layoutsDosen/header') 
                                @include('dosen/layoutsDosen/sidebar')
                                @include('dosen/layoutsDosen/navbar')
                                
                                <!-- Container Fluid-->
                                <div class="container-fluid" id="container-wrapper">
                                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                        <h1 class="h3 mb-0 font-weight-bold text-gray-700">Pengajuan Kerjasama Sekolah Vokasi</h1>
                                    </div>
                                        <form
                                            action="insertpengajuan"
                                            method="POST"
                                            enctype="multipart/form-data"
                                            class="forms-sample">
                                            @csrf
                                
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
                                                                <label for="select2SinglePlaceholder">Nama Progam Studi</label>
                                                                <select class="placeholder form-control">
                                                                    <option value="">Select</option>
                                                                    <option value="Aceh">Aceh</option>
                                                                    <option value="Sumatra Utara">Sumatra Utara</option>
                                                                    <option value="Sumatra Barat">Sumatra Barat</option>
                                                                    <option value="Riau">Riau</option>
                                                                </select>
                                                            </div>
                                
                                                            <div class="form-group">
                                                                <label for="">Nama Lengkap</label>
                                                                <input
                                                                    type="text"
                                                                    name=""
                                                                    id=""
                                                                    class="form-control @error('') is-invalid @enderror"
                                                                    value=""
                                                                    autofocus="autofocus">
                                                                @error('')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                
                                                            <div class="form-group">
                                                                <label for="">Email</label>
                                                                <input
                                                                    type="text"
                                                                    name=""
                                                                    id=""
                                                                    class="form-control @error('') is-invalid @enderror"
                                                                    value=""
                                                                    autofocus="autofocus">
                                                                @error('')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                
                                                            <div class="form-group">
                                                                <label for="">Nomor HP</label>
                                                                <input
                                                                    type="text"
                                                                    name=""
                                                                    id=""
                                                                    class="form-control @error('') is-invalid @enderror"
                                                                    value=""
                                                                    autofocus="autofocus">
                                                                @error('')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                
                                                            <div class="form-group">
                                                                <label for="select2Multiple">Jenis Dokumen Yang Diajukan</label>
                                                                <select
                                                                    class="select2-multiple form-control"
                                                                    name="states[]"
                                                                    multiple="multiple"
                                                                    id="select2Multiple">
                                                                    <option value="">Select</option>
                                                                    <option value="Aceh">Aceh</option>
                                                                    <option value="Riau">Riau</option>
                                                                    <option value="Kepulauan Riau">Kepulauan Riau</option>
                                                                    <option value="Jawa Barat">Jawa Barat</option>
                                                                </select>
                                                            </div>
                                
                                                        </div>
                                                    </div>
                                
                                                    <div class="card mb-4">
                                                        <div
                                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                            <h6 class="m-0 font-weight-bold text-primary">Deskripsi Mitra</h6>
                                                        </div>
                                                        <div class="card-body">
                                
                                                            <div class="form-group">
                                                                <label for="">Nama Mitra</label>
                                                                <input
                                                                    type="text"
                                                                    name=""
                                                                    id=""
                                                                    class="form-control @error('') is-invalid @enderror"
                                                                    value=""
                                                                    autofocus="autofocus">
                                                                @error('')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                
                                                            <div class="form-group">
                                                                <label for="">Nama Dagang Mitra (Jika Ada)</label>
                                                                <input
                                                                    type="text"
                                                                    name=""
                                                                    id=""
                                                                    class="form-control @error('') is-invalid @enderror"
                                                                    value=""
                                                                    autofocus="autofocus">
                                                                @error('')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                
                                                            <div class="form-group">
                                                                <label for="">Logo Resmi Mitra</label>
                                                                <div class="custom-file">
                                                                    <input type="file" name="" class="custom-file-input" id="customFile">
                                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                                </div>
                                                                @error('')
                                                                <div style="color:red">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                
                                                            <div class="form-group">
                                                                <label for="select2SinglePlaceholder">Kategori Mitra</label>
                                                                <select class="placeholder form-control">
                                                                    <option value="">Select</option>
                                                                    <option value="Aceh">Aceh</option>
                                                                    <option value="Sumatra Utara">Sumatra Utara</option>
                                                                    <option value="Sumatra Barat">Sumatra Barat</option>
                                                                    <option value="Riau">Riau</option>
                                                                </select>
                                                            </div>
                                
                                                            <div class="form-group">
                                                                <label for="">Alamat Lengkap Mitra</label>
                                                                <input
                                                                    type="text"
                                                                    name=""
                                                                    id=""
                                                                    class="form-control @error('') is-invalid @enderror"
                                                                    value=""
                                                                    autofocus="autofocus">
                                                                @error('')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                
                                                            <div class="form-group">
                                                                <label for="">Email Mitra</label>
                                                                <input
                                                                    type="text"
                                                                    name=""
                                                                    id=""
                                                                    class="form-control @error('') is-invalid @enderror"
                                                                    value=""
                                                                    autofocus="autofocus">
                                                                @error('')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                
                                                            <div class="form-group">
                                                                <label for="">Nama Lengkap Penandatangan Mitra</label>
                                                                <input
                                                                    type="text"
                                                                    name=""
                                                                    id=""
                                                                    class="form-control @error('') is-invalid @enderror"
                                                                    value=""
                                                                    autofocus="autofocus">
                                                                @error('')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                
                                                            <div class="form-group">
                                                                <label for="">Jabatan Penandatangan</label>
                                                                <input
                                                                    type="text"
                                                                    name=""
                                                                    id=""
                                                                    class="form-control @error('') is-invalid @enderror"
                                                                    value=""
                                                                    autofocus="autofocus">
                                                                @error('')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                
                                                            <div class="form-group">
                                                                <label for="">Nama Narahubung Mitra</label>
                                                                <input
                                                                    type="text"
                                                                    name=""
                                                                    id=""
                                                                    class="form-control @error('') is-invalid @enderror"
                                                                    value=""
                                                                    autofocus="autofocus">
                                                                @error('')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                
                                                            <div class="form-group">
                                                                <label for="">Nomor Narahubung Mitra</label>
                                                                <input
                                                                    type="text"
                                                                    name=""
                                                                    id=""
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
                                
                                                <div class="col-lg-12">
                                                    <div class="card mb-4">
                                                        <div
                                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                            <h6 class="m-0 font-weight-bold text-primary">Ruang Lingkup dan Jangka Waktu Perjanjian</h6>
                                                        </div>
                                                        <div class="card-body">
                                
                                                            <div class="form-group">
                                                                <label for="select3Multiple">Multiple-Select Boxes (pillbox)</label>
                                                                <select
                                                                    class="select3-multiple form-control"
                                                                    name="states[]"
                                                                    multiple="multiple"
                                                                    id="select3Multiple">
                                                                    <option value="">Select</option>
                                                                    <option value="Aceh">Aceh</option>
                                                                    <option value="Sumatra Utara">Sumatra Utara</option>
                                                                    <option value="Sumatra Barat">Sumatra Barat</option>
                                                                    <option value="Riau">Riau</option>
                                                                    <option value="Kepulauan Riau" selected="selected">Kepulauan Riau</option>
                                                                    <option value="Jambi">Jambi</option>
                                                                    <option value="Papua">Papua</option>
                                                                </select>
                                                            </div>
                                
                                                            <div class="form-group" id="simple-date1">
                                                                <label for="simpleDataInput">Tanggal Mulai Kerjasama</label>
                                                                <div class="input-group date">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="fas fa-calendar"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" class="form-control" value="01/06/2020" id="simpleDataInput">
                                                                </div>
                                                            </div>
                                
                                                            <div class="form-group" id="simple-date1">
                                                                <label for="simpleDataInput">Tanggal Berakhir Kerjasama</label>
                                                                <div class="input-group date">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="fas fa-calendar"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" class="form-control" value="01/06/2020" id="simpleDataInput">
                                                                </div>
                                                            </div>
                                
                                                            <div class="form-group">
                                                                <label for="select4Multiple">Progam Studi Yang Terlibat</label>
                                                                <select
                                                                    class="select4-multiple form-control"
                                                                    name="[]"
                                                                    multiple="multiple"
                                                                    id="select4Multiple">
                                                                    <option value="">Select</option>
                                                                    <option value="Aceh">Aceh</option>
                                                                    <option value="Riau">Riau</option>
                                                                    <option value="Kepulauan Riau">Kepulauan Riau</option>
                                                                    <option value="Jawa Barat" selected="selected">Jawa Barat</option>
                                                                </select>
                                                            </div>
                                
                                                        </div>
                                                    </div>
                                                </div>
                                                &nbsp;&nbsp;&nbsp;
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href={{ url()->previous() }} class="btn btn-light">Cancel</a>
                                
                                            </form>
                                        </div>
                                    
                                
                                    <br/>
                                    <!--Row-->
                                
                                    @include('dosen/layoutsDosen/footer')