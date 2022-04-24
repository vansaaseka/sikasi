@include('dosen/layoutsDosen/header')
@include('dosen/layoutsDosen/sidebar')
@include('dosen/layoutsDosen/navbar')
<!-- DataTable with Hover -->

<div class = "conatiner-fluid content-inner mt-n5 py-0" > <div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Pengajuan Kerjasama</h4>
                </div>
                <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <a href="/tambahpengajuan" type="button" class="btn btn-success">Tambah
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive mt-4">
                    <table id="datatable" class="table table-striped" data-toggle="data-table">
                        <thead >
                            <tr class="odd text-center">
                                <th>No</th>
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
                                @if ($datapengajuan->user_id == Auth::user()->id)
                                <tr role="row" class="odd text-center">
                                    <td scope="row">{{ $no++ }}</td>
                                    <td>{{ date('Y', strtotime($datapengajuan->tanggalmulai)) }}</td>
                                    
                                    <td>{{ $datapengajuan->mitra->namamitra}}</td>
                                
                                    <td>
                                        <button
                                            type="button"
                                            class="btn btn-primary dropdown-toggle"
                                            data-bs-toggle="modal"
                                            data-bs-target="#status"
                                            id="#modalCenter">
                                            Tanda Tangan Mitra
                                        </button>
                                    </td>
                                    <td>-</td>
                                    <td>
                                        <a href="dokumenkerjasama/{{$datapengajuan->dokumen}}">{{$datapengajuan->dokumen}}</a>
                                    </td>

                                    <td>
                                        <button
                                            type="button"
                                            class="btn btn-info btn-sm"
                                            data-bs-toggle="modal"
                                            data-bs-target="#pengajuan"
                                            id="#modalCenter">
                                            <i class="fa fa-info-circle"></i>
                                        </button>

                                        <a href="editpengajuan/{{$datapengajuan->id}}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger delete btn-sm hapus" id-data="{{ $datapengajuan->id }}" nama-data="{{ $datapengajuan->mitra->namamitra }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#">
                                        {{-- <a href="#" class="btn btn-danger delete btn-sm"> --}}
                                            <i class="fa fa-trash"></i>
                                        </a>

                                    </td>
                                   
                                </tr>
                                @endif
                                @endforeach
                             
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!-- Modal Scrollable -->
            <div
                class="modal fade"
                id="pengajuan"
                data-bs-backdrop="static" 
                data-bs-keyboard="false"
                tabindex="-1"
                role="dialog"
                aria-labelledby="staticBackdropLiveLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLiveLabel">Detail Pengajuan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table
                                    class="table align-items-center table-flush table-hover"
                                    id="dataTableHover">
                                    <thead></thead>
                                    <tbody>
                                        <tr>
                                            <td class="font-size:3">
                                                Nomor Dokumen
                                            </td>
                                            <td>:</td>
                                            <td>52/UN27/KS/2021</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Tanggal Ajuan
                                            </td>
                                            <td>:</td>
                                            <td>28 Maret 2022</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Tanggal Mulai Kerjasama
                                            </td>
                                            <td>:</td>
                                            <td>28 Agustus 2022</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Tanggal Berakhir Kerjasama
                                            </td>
                                            <td>:</td>
                                            <td>31 Desember 2022</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Masa Berlaku Kerjasama :
                                            </td>
                                            <td>:</td>
                                            <td style="color: red">
                                                Aktif (4 Bulan 3 Hari )</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Status Dokumen
                                            </td>
                                            <td>:</td>
                                            <td>Dibawa Prodi</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

         

            {{-- Modal Status --}}
            <div
                class="modal fade"
                id="status"
                tabindex="-1"
                role="dialog"
                aria-labelledby="staticBackdropLiveLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLiveLabel">Status Pengajuan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-12">
                                        <div class="card">
                                           <div class="card-body">
                                              <div class="iq-timeline0 m-0 d-flex align-items-center justify-content-between position-relative">
                                                 <ul class="list-inline p-0 m-0">
                                                    <li>
                                                       <div class="timeline-dots timeline-dot1 border-primary text-primary"></div>
                                                       <h6 class="float-left mb-1">Client Login</h6>
                                                       <small class="float-right mt-1">24 November 2019</small>
                                                       <div class="d-inline-block w-100">
                                                          <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                                       </div>
                                                    </li>
                                                    <li>
                                                       <div class="timeline-dots timeline-dot1 border-success text-success"></div>
                                                       <h6 class="float-left mb-1">Scheduled Maintenance</h6>
                                                       <small class="float-right mt-1">23 November 2019</small>
                                                       <div class="d-inline-block w-100">
                                                          <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                                       </div>
                                                    </li>
                                                    <li>
                                                       <div class="timeline-dots timeline-dot1 border-danger text-danger"></div>
                                                       <h6 class="float-left mb-1">Dev Meetup</h6>
                                                       <small class="float-right mt-1">20 November 2019</small>
                                                       <div class="d-inline-block w-100">
                                                          <p>Bonbon macaroon jelly beans <a href="#">gummi bears</a>gummi bears jelly lollipop apple</p>
                                                          <div class="iq-media-group iq-media-group-1">
                                                             <a href="#" class="iq-media-1">
                                                                <div class="icon iq-icon-box-3 rounded-pill">SP</div>
                                                             </a>
                                                             <a href="#" class="iq-media-1">
                                                                <div class="icon iq-icon-box-3 rounded-pill">PP</div>
                                                             </a>
                                                             <a href="#" class="iq-media-1">
                                                                <div class="icon iq-icon-box-3 rounded-pill">MM</div>
                                                             </a>
                                                             <a href="#" class="iq-media-1">
                                                                <div class="icon iq-icon-box-3 rounded-pill">SP</div>
                                                             </a>
                                                             <a href="#" class="iq-media-1">
                                                                <div class="icon iq-icon-box-3 rounded-pill">PP</div>
                                                             </a>
                                                             <a href="#" class="iq-media-1">
                                                                <div class="icon iq-icon-box-3 rounded-pill">MM</div>
                                                             </a>
                                                          </div>
                                                       </div>
                                                    </li>
                                                    <li>
                                                       <div class="timeline-dots timeline-dot1 border-primary text-primary"></div>
                                                       <h6 class="float-left mb-1">Client Call</h6>
                                                       <small class="float-right mt-1">19 November 2019</small>
                                                       <div class="d-inline-block w-100">
                                                          <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                                       </div>
                                                    </li>
                                                    <li>
                                                       <div class="timeline-dots timeline-dot1 border-warning text-warning"></div>
                                                       <h6 class="float-left mb-1">Mega event</h6>
                                                       <small class="float-right mt-1">15 November 2019</small>
                                                       <div class="d-inline-block w-100">
                                                          <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                                       </div>
                                                    </li>
                                                 </ul>
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                        </div>
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

@include('dosen/layoutsDosen/footer') 
