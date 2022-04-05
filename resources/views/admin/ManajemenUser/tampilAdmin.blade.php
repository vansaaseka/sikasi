
       @include('layouts/header')

       @include('layouts/sidebar')
       
       @include('layouts/navbar')
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

       <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
       <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

       <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Account Admin</h6>
            </div>

            <div class="table-responsive p-3">
              <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <a href="/tambahadmin" type="button" class="btn btn-success">Tambah <i class="fa fa-plus"></i> </a>
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
                  @foreach ($admin as $account) 
                  @if ($account->role == 1)
                <tr role="row" class="odd">
                  <th scope="row">{{ $no++ }}</th>
                  {{--  diambil dari as $ -> nama di database  line 46--}}
                  <td>{{ $account->name}}</td>
                  <td>{{ $account->email }}</td>
                  {{-- <td><span class="badge badge-success">Active</span></td> --}}
                  <td>
                    {{-- <input data-id="{{$account->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $account->status1 ? 'checked' : ''}}>
                    @if($account->status == 1)
                    <a href="{{ url('ubahstatus/'.$account->id) }}"
                      class="bbtn btn-sm btn-success">Aktif</a>
                      @else
                      <a href="{{ url('ubahstatus/'.$account->id) }}"
                          class="bbtn btn-sm btn-danger">Non-Aktif</a>
                      @endif --}}

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

{{-- <script>
  $(function() {
    $('.toggle-class').change(function() {
      var status = $(this).prop('checked') == true ? 1 : 0;
      var account_id = $(this).data('id');
      $.ajax({
        type: "GET",
        dataType: "json"
        url: '/ubahstatus',
        data:{"_token":"{{ csrf_token() }}", 'status' : status, 'account_id' : account_id},
        // data: {'status' : status, 'account_id' : account_id},
        success : function(data){
          console.log(data.success)
        }
      });
    });
  });
  
</script> --}}