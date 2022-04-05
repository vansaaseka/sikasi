
       @include('layouts/header')

       @include('layouts/sidebar')
       
       @include('layouts/navbar')


       <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Account Dosen</h6>
            </div>

            <div class="table-responsive p-3">
              <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <a href="/tambahdosen" type="button" class="btn btn-success">Tambah <i class="fa fa-plus"></i> </a>
              </div>
            </div>
            

             <div class="table-responsive p-3">
              <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Ubah Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Ubah Status</th>
                        <th>Aksi</th>
                  </tfoot>

                <tbody>

                  @php
                  $no = 1;  
                  @endphp
                   {{-- @foreach (-diambil dari isi comapct di controller- as -namanya bebas-)  --}}
                  @foreach ($dosen as $account) 
                  @if ($account->role == 0)
                <tr role="row" class="odd">
                  <th scope="row">{{ $no++ }}</th>
                  {{--  diambil dari as $ -> nama di database  line 46--}}
                  <td>{{ $account->name}}</td>
                  <td>{{ $account->email }}</td>
                  <td>
                    @if($account->status == 1)
                      <a href="{{ url('/ubahstatus/'.$account->id) }}"
                        class="bbtn btn-sm btn-success">Aktif</a>
                        @else
                        <a href="{{ url('/ubahstatus/'.$account->id) }}"
                            class="bbtn btn-sm btn-danger">Non-Aktif</a>
                        @endif
              </td>
                  <td>
                    {{-- a href=/hapuskategori/{{ $kategori->id}} --}}
                      <a href="#"  class="btn btn-danger delete" data-id="{{ $account->id }}" data-nama="{{ $account->name }}"><i class="fa fa-trash"></i></a>
                      <a href="/editakun/{{ $account->id}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                  </td>
                </tr>
                @endif
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@include('layouts/footer')

<script>
    $('.delete').click(function(){
      var akunid= $(this).attr('data-id');
      var namaakun = $(this).attr('data-nama');
      swal({
    title: "Apakah kamu yakin??",
    text: "Menghapus data "+namaakun+" ",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      window.location = "/hapusakun/"+akunid+""
      swal("Data berhasil Dihapus!", {
        icon: "success",
      });
    } else {
      swal("Data tidak berhasil dihapus");
    }
  });
    });
    
  </script>
    

