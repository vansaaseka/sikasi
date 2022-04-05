
       @include('layouts/header')

       @include('layouts/sidebar')
       
       @include('layouts/navbar')


       <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Kategori Kerjasama</h6>
            </div>

            <div class="table-responsive p-3">
              <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <a href="/tambahkategori" type="button" class="btn btn-success">Tambah <i class="fa fa-plus"></i> </a>
              </div>
            </div>
            

             <div class="table-responsive p-3">
              <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>Kerjasama</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Kerjasama</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tfoot>

                <tbody>
                  @php
                  $no = 1;  
                  @endphp
                   {{-- @foreach (-diambil dari isi comapct di controller- as -namanya bebas-)  --}}
                  @foreach ($kategori as $category) 

                <tr role="row" class="odd">
                  <th scope="row">{{ $no++ }}</th>
                  {{--  diambil dari as $ -> nama di database  line 46--}}
                  <td>{{ $category->namakategori }}</td>
                  <td>{{ $category->deskripsi }}</td>

                  <td>
                    <a href="/editkategori/{{ $category->id}}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                    {{-- a href=/hapuskategori/{{ $kategori->id}} --}}
                    <a href="#"  class="btn btn-danger delete" data-id="{{ $category->id }}" data-nama="{{ $category->namakategori }}"><i class="fa fa-trash"></i></a>
               
                  </td>
                </tr>
              @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@include('layouts/footer')

{{-- alert Delete Kategori --}}

<script>
  $('.delete').click(function(){
    var kategoriid= $(this).attr('data-id');
    var namakategori = $(this).attr('data-nama');
    swal({
  title: "Apakah kamu yakin??",
  text: "Menghapus data kategori "+namakategori+" ",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    window.location = "/hapuskategori/"+kategoriid+""
    swal("Data berhasil Dihapus!", {
      icon: "success",
    });
  } else {
    swal("Data tidak berhasil dihapus");
  }
});
  });
  
</script>