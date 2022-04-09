<div class="pt-2">
    @if(!empty($successMessage))
    <div class="alert alert-success">
        {{ $successMessage }}
    </div>
    @endif
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link {{ $currentStep != 1 ? '' : 'active' }}" href="#step1">Mitra</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentStep != 2 ? '' : 'active' }}" href="#step2">Ruang Lingkup & Jangka Waktu Perjanjian</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentStep != 3 ? '' : 'active' }}" href="#step3">Step 3</a>
        </li>
    </ul>

    <br/>

<div class="col-lg-12">
        {{-- Step 1 --}}
        <div id="step1" class="needs-validation" style="display: {{ $currentStep != 1 ? 'none' : '' }}">
             <div class="form-group">
                <label for="namadagang">Nama Dagang Mitra</label>
                <input type="text" wire:model="namadagang" class="form-control {{$errors->first('namadagang') ? "is-invalid" : "" }}" id="namadagang" aria-describedby="namadagang">
                @error('namadagang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="namamitra">Nama Mitra</label>
                <input type="text" wire:model="namamitra" class="form-control {{$errors->first('namamitra') ? "is-invalid" : "" }}" id="namamitra" aria-describedby="namamitra">
                @error('namamitra')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

             <div class="form-group">
                <label for="logo">Logo Resmi Mitra</label>
                <div class="custom-file">
                <input type="file" wire:model="logo" class="custom-file-input {{$errors->first('logo') ? "is-invalid" : "" }}" id="logo">
                <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                @error('logo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
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
                <label for="alamat">Alamat Lengkap Mitra</label>
                <input type="text" wire:model="alamat" class="form-control {{$errors->first('alamat') ? "is-invalid" : "" }}" id="alamat">
                @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Alamat Email Mitra</label>
                <input type="text" wire:model="email" class="form-control {{$errors->first('email') ? "is-invalid" : "" }}" id="email">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="penandatanganan">Nama Lengkap Penandatangan Mitra</label>
                <input type="text" wire:model="penandatanganan" class="form-control {{$errors->first('penandatanganan') ? "is-invalid" : "" }}" id="penandatanganan">
                @error('penandatanganan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan Penandatangan Mitra</label>
                <input type="text" wire:model="jabatan" class="form-control {{$errors->first('jabatan') ? "is-invalid" : "" }}" id="jabatan">
                @error('jabatan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="narahubung">Nama Narahubung Mitra</label>
                <input type="text" wire:model="narahubung" class="form-control {{$errors->first('narahubung') ? "is-invalid" : "" }}" id="narahubung">
                @error('narahubung')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nomornarahubung">Nomor Narahubung Mitra</label>
                <input type="text" wire:model="nomornarahubung" class="form-control {{$errors->first('nomornarahubung') ? "is-invalid" : "" }}" id="nomornarahubung">
                @error('nomornarahubung')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

             {{-- <div class="form-group">
                <label for="birth_date" >Birth Date</label>
                <input type="date" wire:model="birth_date" class="form-control {{$errors->first('birth_date') ? "is-invalid" : "" }}" id="birth_date">
                @error('birth_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

             <div class="form-group">
                <label for="status">Status</label><br>
                <label class="radio-inline me-2"><input type="radio" wire:model="status" class="me-2" value="married"
                    {{{ $status == 'married' ? "checked" : "" }}}>Married</label>
                <label class="radio-inline"><input type="radio" wire:model="status" class="me-2" value="single"
                        {{{ $status == 'single' ? "checked" : "" }}}>Single</label>
                @error('status') <span class="error">{{ $message }}</span> @enderror
            </div> --}}


            <button class="btn btn-primary" wire:click="firstStepSubmit"
                type="button">Next</button>
        </div>

        {{-- Step 2 --}}
        <div id="step2" style="display: {{ $currentStep != 2 ? 'none' : '' }}">
            
            <div class="form-group">
                <label for="select3Multiple">Ruang Lingkup Perjanjian(pillbox)</label>
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


            {{-- <div class="form-group">
                <label for="email" >Email</label>
                <input type="email" wire:model="email" class="form-control {{$errors->first('email') ? "is-invalid" : "" }}" id="email" aria-describedby="email">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
             <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="number" wire:model="phone" class="form-control {{$errors->first('phone') ? "is-invalid" : "" }}" id="phone">
                @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div> --}}

            <button class="btn btn-danger" type="button" wire:click="back(1)">Back</button>
            <button class="btn btn-primary" type="button" wire:click="secondStepSubmit">Next</button>
        </div>

        {{-- Step 3 --}}
        <div id="step3" style="display: {{ $currentStep != 3 ? 'none' : '' }}">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Name: {{$name}}</li>
                <li class="list-group-item">Username: {{ $username }}</li>
                <li class="list-group-item">Birth Place: {{ $birth_place }}</li>
                <li class="list-group-item">Birth Date: {{ $birth_date }}</li>
                <li class="list-group-item">Status: {{$status ? 'Married' : 'Single'}}</li>
                <li class="list-group-item">Email: {{ $email }}</li>
                <li class="list-group-item">Phone: {{ $phone }}</li>
            </ul>

            <br/>
            <button class="btn btn-danger" type="button" wire:click="back(2)">Back</button>
            <button class="btn btn-success" wire:click="submitForm" type="button">Finish</button>
        </div>
    </div>
</div>