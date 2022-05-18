{{-- @include('verifikator/layoutsVerifikator/header')

@include('verifikator/layoutsVerifikator/sidebar')

@include('verifikator/layoutsVerifikator/navbar')

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
                    <form
                        action="/insertupgrade"
                        method="POST"
                        enctype="multipart/form-data"
                        class="forms-sample">
                        @csrf

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status_id" class="form-control">
                                <option value="">--Pilih--</option>
                                @foreach ($status as $item )
                                <option value="{{ $item->id }}">{{ $item->namastatus }}</option>
                                @endforeach 
                                @error('status_id')
                                <div class="invalid-feedback">Example invalid form file feedback</div>
                                @enderror
                            </select>
                        </div>
                    

                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <input
                                type="text"
                                name="catatan"
                                id="Catatan"
                                class="form-control"
                                value="{{ old('catatan') }}"
                                autofocus="autofocus">
                            @error('catatan')
                            <div class="invalid-feedback">Example invalid form file feedback</div>
                            @enderror
                        </div>

                        
                        <input type="hidden" name="created_at" id="created_at" value="<?= date('Y-m-d H:i:s') ?>">
                        <input type="hidden" name="updated_at" id="updated_at" value="<?= date('Y-m-d') ?>">

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/template" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('verifikator/layoutsVerifikator/footer') --}}