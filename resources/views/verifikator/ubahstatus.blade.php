@include('verifikator/layoutsVerifikator/header')

@include('verifikator/layoutsVerifikator/sidebar')

@include('verifikator/layoutsVerifikator/navbar')



<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Ubah Status</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form
                        action="/updatestatus/{{ $pengajuan->id }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="forms-sample">
                        @csrf

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status_id" class="form-control">
                                <option value="">--Pilih--</option>
                                @foreach ($status as $item )
                                <option value= "{{ $item->id }}"{{ old('status_id', $pengajuan->status_id) == $item->id ? 'selected' : null}}>{{ $item->status }}</option>  
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlTextarea1">Catatan</label>
                            <textarea class="form-control" name="catatan" id="exampleFormControlTextarea1" rows="5"></textarea>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/template" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@include('verifikator/layoutsVerifikator/footer')