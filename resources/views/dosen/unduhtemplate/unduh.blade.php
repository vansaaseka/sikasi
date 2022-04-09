@include('dosen/layoutsDosen/header')

@include('dosen/layoutsDosen/sidebar')

@include('dosen/layoutsDosen/navbar')

<div class="row">
    <div class="col-lg-12 mb-4">
      <!-- Simple Tables -->
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Template Draf Kerjasama</h6>
        </div>

        <div class="table-responsive">
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Nama Kerjasama</th>
                <th>File Draf Kerjasama</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
                @php
                $no = 1;  
                @endphp
                 {{-- @foreach (-diambil dari isi comapct di controller- as -namanya bebas-)  --}}
                @foreach ($template as $data) 

              <tr role="row" class="odd">
                <th scope="row">{{ $no++ }}</th>
                {{--  diambil dari as $ -> nama di database  line 46--}}
                <td>{{ $data->kategori->namakategori }}</td>
                <td>{{ $data->filedraf}}</td>
                <td>{{ $data->deskripsi }}</td>
               
                <td>
                  <a href="filedrafkerjasama/{{$data->filedraf}}" class="btn btn-primary"> <i class="fa fa-download"></i>  Unduh</a>    
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

  
  <!--Row-->

  @include('dosen/layoutsDosen/footer')

