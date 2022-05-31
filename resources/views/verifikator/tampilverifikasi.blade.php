@include('verifikator/layoutsVerifikator/header')
@include('verifikator/layoutsVerifikator/sidebar')
@include('verifikator/layoutsVerifikator/navbar')
<!-- DataTable with Hover -->

<div class = "conatiner-fluid content-inner mt-n5 py-0" > <div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Pengajuan Kerjasama</h4>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive mt-4">
                    <table id="datatable" class="table table-striped" data-toggle="data-table">
                        <thead >
                            <tr class="odd text-center">
                                <th>No</th>
                                <th>Pengusul</th>
                                <th>Prodi</th>
                                <th>Tahun Kerjasama</th>
                                <th>Mitra</th>
                                <th>Status</th>
                                <th>Catatan</th>
                                <th>Dokumen Final</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr class="odd text-center">
                                <th>No</th>
                                <th>Pengusul</th>
                                <th>Prodi</th>
                                <th>Tahun Kerjasama</th>
                                <th>Mitra</th>
                                <th>Status</th>
                                <th>Catatan</th>
                                <th>Dokumen Kerjasama</th>
                                <th>Aksi</th>
                            </tfoot>

                            <tbody>
                                @php 
                                $no = 1; 
                                @endphp 
                                {{-- @foreach (-diambil dari isi comapct di controller- as -namanya bebas-)  --}}
                               
                                @foreach ($pengajuan as $datapengajuan) 
                                <tr role="row" class="odd text-center">
                                    <td scope="row">{{ $no++ }}</td>
                                    
                                    <td>{{  $datapengajuan->user->name }}</td>
                                    <?php
                                    foreach($prodi as $p){
                                        if($p->id == $datapengajuan->user->prodi_id){?>
                                            <td>{{  $p->namaprodi}} </td>
                                       <?php }
                                    }
                                    ?>
                                    <td>{{ date('Y', strtotime($datapengajuan->tanggalmulai)) }}</td>
                                    
                                    <td>{{ $datapengajuan->mitra->namamitra}}</td>
                                   <td>
                                        <button
                                            type="button"
                                            class="btn btn-outline-secondary"
                                            data-bs-toggle="modal"
                                            data-bs-target="#modalstatus{{ $datapengajuan->id }}"
                                            id="#modalstatus{{ $datapengajuan->id }}">
                                            Status
                                        </button>
                                   </td>
                                    <td>-</td>
                                    <td>
                                        <a href="dokumenkerjasama/{{$datapengajuan->dokumen}}">{{$datapengajuan->dokumen}}</a>
                                    </td>

                                    <td>
                                        <a href= "/upgradepengajuan" class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="editpengajuan/{{$datapengajuan->id}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger delete btn-sm hapus" id-data="{{ $datapengajuan->id }}" nama-data="{{ $datapengajuan->mitra->namamitra }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#">
                                        {{-- <a href="#" class="btn btn-danger delete btn-sm"> --}}
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>

        {{-- Modal Status --}}
        <div
                class="modal fade"
                id="modalstatus{{ $datapengajuan->id }}"
                tabindex="-1"
                role="dialog"
                aria-labelledby="staticBackdropLiveLabel"
                aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLiveLabel">Verifikasi Pengajuan</h5>
                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form
                                                        action="/insertnewstatus"
                                                        method="POST"
                                                        enctype="multipart/form-data"
                                                        class="forms-sample">
                                                        @csrf
                                                       
                                                        <div class="form-group">
                                                            <label class="form-label" for="exampleInputText1">Verifikasi </label>
                                                            <div class="form-check">
                                                                <input type="radio" name="status_id" class="form-check-input" id="status_id" value="1">
                                                                <label class="form-check-label" for="exampleRadio1">Ajuan Diterima</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="status_id" class="form-check-input" id="status_id" value="2">
                                                                <label class="form-check-label" for="exampleRadio1">Dokumen Review BPU</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="status_id" class="form-check-input" id="status_id" value="3">
                                                                <label class="form-check-label" for="exampleRadio1">Default Selesai di Review BPU</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="status_id" class="form-check-input" id="status_id" value="4">
                                                                <label class="form-check-label" for="exampleRadio1">Tanda Tangan Dekan</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="status_id" class="form-check-input" id="status_id" value="5">
                                                                <label class="form-check-label" for="exampleRadio1">Dokumen Telah ditandatangani Dekan</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="status_id" class="form-check-input" id="status_id" value="6">
                                                                <label class="form-check-label" for="exampleRadio1">Tanda Tangan Mitra</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="status_id" class="form-check-input" id="status_id" value="7">
                                                                <label class="form-check-label" for="exampleRadio1">Dokumen Telah ditandatangani Mitra</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="status_id" class="form-check-input" id="status_id" value="8">
                                                                <label class="form-check-label" for="exampleRadio1">Pengajuan Tanda Tangan WR 4</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="status_id" class="form-check-input" id="status_id" value="9">
                                                                <label class="form-check-label" for="exampleRadio1">Dokumen Direview DKPI</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="status_id" class="form-check-input" id="status_id" value="10">
                                                                <label class="form-check-label" for="exampleRadio1">Tanda Tangan WR 4</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" name="status_id" class="form-check-input" id="status_id" value="11">
                                                                <label class="form-check-label" for="exampleRadio1">Selesai</label>
                                                            </div>

                                                            <br/>
                                                            <div class="form-group">
                                                                <label class="form-label" for="exampleInputText1">Catatan </label>
                                                                <input type="text" class="form-control" id="exampleInputText1" name="catatan">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="exampleInputText1">Status Dokumen </label>
                                                                <input type="text" class="form-control" id="exampleInputText1" name="status_dokumen">
                                                            </div>
                                                            {{-- <div class="custom-file">
                                                                <input type="file" name="dokumen" placeholder="Choose file" id="file">
                                                            </div> --}}
                                                        </div>
                                                           
                                                            <input  type="hidden"
                                                                name="pengajuan_id"
                                                                value={{
                                                                    $datapengajuan->id
                                                                }}>
                                                                <input  type="hidden"
                                                                name="created_by"
                                                                value={{
                                                                    Auth::user()->id
                                                                }}>
                                                                <input  type="hidden"
                                                                name="created_by"
                                                                value={{
                                                                    Auth::user()->id
                                                                }}>
                                                                
                                                                <button
                                                                    type="submit"
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
                        </div>
        </div> 
                                </tr>
                                @endforeach
                             
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


          

         

            

{{-- alert Delete Pengajuan --}}
            <script>
                $('.hapus').click(function () {
                    var pengajuanid = $(this).attr('data-id');
                    var namapengajuan = $(this).attr('data-nama');
                    swal({
                        title: "Apakah kamu yakin??",
                        text: "Menghapus data pengajuan dengan mitra " + namapengajuan + " ",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true
                    }).then((willDelete) => {
                        if (willDelete) {
                            window.location = "/hapuspengajuan/" + pengajuanid + ""
                            swal("Data berhasil Dihapus!", {icon: "success"});
                        } else {
                            swal("Data tidak berhasil dihapus");
                        }
                    });
                });
            </script>

@include('verifikator/layoutsVerifikator/footer') 
