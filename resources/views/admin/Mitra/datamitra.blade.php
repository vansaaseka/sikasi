@include('admin/layoutsAdmin/header')

@include('admin/layoutsAdmin/sidebar')

@include('admin/layoutsAdmin/navbar')


<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="m-0 font-weight-bold">Daftar Mitra</h4>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped" data-toggle="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Mitra</th>
                                    <th>Kategori Mitra</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Nama - Jabatan Penandatanganan</th>
                                    <th>Narahubung</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Mitra</th>
                                    <th>Kategori Mitra</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Nama - Jabatan Penandatanganan</th>
                                    <th>Narahubung</th>
                            </tfoot>

                            <tbody>

                                @php $no = 1; @endphp
                                @foreach ($mitra as $data)
                                    <tr role="row" class="odd">
                                        <th scope="row">{{ $no++ }}</th>

                                        <td>{{ $data->namamitra }}</td>

                                        <td>
                                            <?php
                                                        foreach($kategorimitra as $km){
                                                            if($km->id == $data->kategorimitra_id){?>
                                            {{ $km->kategorimitra }} <?php }
                                                        }
                                                    ?>
                                        </td>

                                        <td>{{ $data->alamat }}</td>

                                        <td>{{ $data->email }}</td>

                                        <td>{{ $data->namapenandatangan }} - {{ $data->jabatanpenandatangan }}</td>

                                        <td>{{ $data->narahubung }} - {{ $data->no_hp }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin/layoutsAdmin/footer')
