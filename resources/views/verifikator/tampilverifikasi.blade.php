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
                                    <td>{{  $datapengajuan->user->prodi_id}} </td>
                                    <td>{{ date('Y', strtotime($datapengajuan->tanggalmulai)) }}</td>
                                    
                                    <td>{{ $datapengajuan->mitra->namamitra}}</td>
                                    {{-- <td>{{ $datapengajuan->status->namastatus}}</td>
                                 --}}
                                    <td></td>
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
