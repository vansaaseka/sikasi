@include('dosen/layoutsDosen/header') 
@include('dosen/layoutsDosen/sidebar')
@include('dosen/layoutsDosen/navbar')

<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Unduh Template Kerjasama</h4>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive mt-4">
                        <table id="basic-table" class="table table-striped mb-0" role="grid">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kerjasama</th>
                                    <th>File Draf Kerjasama</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                {{-- @foreach (-diambil dari isi comapct di controller- as -namanya bebas-)  --}}
                                @foreach ($template as $data)

                                <tr role="row" class="odd">
                                    <th scope="row">{{ $no++ }}</th>
                                    {{--  diambil dari as $ -> nama di database  line 46--}}
                                    <td>{{ $data->kategori->namakategori }}</td>
                                    <td>{{ $data->filedraf}}</td>
                                    <td>{{ $data->deskripsi }}</td>

                                    <td>
                                        <a href="filedrafkerjasama/{{$data->filedraf}}" class="btn btn-primary">
                                            <i class="fa fa-download"></i>
                                            Unduh</a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
    </div>
</div>  

        <!--Row-->

        @include('dosen/layoutsDosen/footer')