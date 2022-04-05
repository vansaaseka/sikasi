@include('layouts/header')

@include('layouts/sidebar')

@include('layouts/navbar')

<div class="row">
    <div class="col-lg-12 mb-4">
      <!-- Simple Tables -->
      <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Template Draf Kerjasama</h6>
        </div>

        <div class="table-responsive p-3">
            <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4">
              <a href="template/create" type="button" class="btn btn-success float-right">Tambah <i class="fa fa-plus"></i> </a>
            </div>
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
    
               <td><a href="filedrafkerjasama/{{$data->filedraf}}">{{$data->filedraf}}</a></td>

                <td>{{ $data->deskripsi }}</td>
               
                <td>
                  <a href="{{ url('template/'.$data->id.'/edit') }}" class="btn btn-info"><i class="fa fa-edit"></i></a>

                  <a href="#"  class="btn btn-danger delete" id-data="{{ $data->id }}" nama-data="{{ $data->kategori->namakategori }}"><i class="fa fa-trash"></i></a>
                  
                    {{-- Delete --}}
                  {{-- <form action="{{ url('template/'.$data->id) }}"  method="post" class="d-inline" onsubmit="return confirm ('Yakin Hapus Data ??')" >
                    @method('delete')
                    @csrf
                   <button class="btn btn-danger delete">
                    <i class="fa fa-trash"></i>
                   </button>
                  </form> --}}
                   
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

  @include('layouts/footer')

 {{-- alert Delete Template --}}
 <script>
  $('.delete').click(function(){
    var idtemplate= $(this).attr('id-data');
    var namatemplate = $(this).attr('nama-data');
    swal({
  title: "Apakah kamu yakin??",
  text: "Menghapus file draf "+namatemplate+" ",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    window.location = "/hapustemplate/"+idtemplate+""
    swal("Data berhasil Dihapus!", {
      icon: "success",
    });
  } else {
    swal("Data tidak berhasil dihapus");
  }
});
  });
  
</script>