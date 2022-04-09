@include('dosen/layoutsDosen/header')
@include('dosen/layoutsDosen/sidebar')
@include('dosen/layoutsDosen/navbar') 

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 font-weight-bold text-gray-700">Pengajuan Kerjasama Sekolah Vokasi</h1>
    </div>

<div class="row">
    <div class="col-lg-12">
        <!-- Select2 -->
        <div class="card mb-4">
            
            <div class="card-body"><livewire:pengajuan></div>
        </div>
    </div>
</div>
</div>

    @include('dosen/layoutsDosen/footer')