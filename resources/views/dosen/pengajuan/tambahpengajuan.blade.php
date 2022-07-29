@include('dosen/layoutsDosen/header')
@include('dosen/layoutsDosen/sidebar')
@include('dosen/layoutsDosen/navbar')
@include('sweetalert::alert')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<div class="conatiner-fluid content-inner mt-n5 py-0">


    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Pengajuan Kerjasama</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form id="form-wizard1" class="text-center mt-3" action="/insertpengajuan" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <ul id="top-tab-list" class="p-0 row list-inline">
                            <li class="col-lg-4 col-md-6 text-start mb-2 active" id="account">
                                <a href="javascript:void();">
                                    <div class="iq-icon me-3">
                                        <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                            fill="none" viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <span>Mitra</span>
                                </a>
                            </li>
                            <li id="personal" class="col-lg-4 col-md-6 mb-2 text-start">
                                <a href="javascript:void();">
                                    <div class="iq-icon me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <span>Informasi Perjanjian</span>
                                </a>
                            </li>

                            <li id="confirm" class="col-lg-4 col-md-6 mb-2 text-start">
                                <a href="javascript:void();">
                                    <div class="iq-icon me-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none"
                                            viewbox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                    <span>Finish</span>
                                </a>
                            </li>
                        </ul>
                        <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card text-start">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4">Mitra</h3>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="choices-single-default">Kategori
                                                Pengajuan *</label>
                                            <select class="form-select" data-trigger="data-trigger" name="kategori_id"
                                                id="choices-single-default">
                                                <option value="">--Pilih--</option>
                                                @foreach ($kategori as $item)
                                                <option value="{{ $item->id }}">{{ $item->namakategori }}
                                                </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label class="form-label">Nama Mitra *</label>
                                            <select class="form-select" name="" id="mitraSelect" style="display: block">

                                            </select>
                                            <input type="text" class="form-control" name="namamitra" id="namamitra"
                                                placeholder="Masukan Nama Mitra" style="display: none" />
                                            <input name="id" hidden>
                                            {{-- @error('namamitra')
                                            <div class="invalid-feedback">Nama Dagang Harus Diisi</div>
                                            @enderror --}}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Nama Dagang Mitra
                                            </label>
                                            <input type="text" class="form-control" name="namadagangmitra">
                                            {{-- @error('namadagangmitra')
                                            <div class="invalid-feedback">Nama Dagang Mitra Harus Diisi</div>
                                            @enderror --}}
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Logo Resmi Mitra *</label>
                                            <input type="file" class="form-control" name="logo"
                                                placeholder="Logo dengan format jpg,png,jpeg" />
                                            <div id="logoM"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="choices-single-default">Kategori
                                                Mitra *</label>
                                            <select class="form-select" name="kategorimitra_id" id="kategorimitra_id">
                                                {{-- <option value="">--Pilih--</option> --}}
                                                @foreach ($kategorimitra as $item)
                                                <option value="{{ $item->id }}">{{ $item->kategorimitra }}
                                                </option>
                                                @endforeach
                                                {{-- @error('kategori_id')
                                                <div class="invalid-feedback">Example invalid form file feedback</div>
                                                @enderror --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Alamat Lengkap Mitra *</label>
                                            <input type="text" class="form-control" name="alamat" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Email Mitra *</label>
                                            <input type="email" class="form-control" name="email" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Nama Lengkap Penadatanganan
                                                Mitra *</label>
                                            <input type="text" class="form-control" name="namapenandatangan"
                                                placeholder="Contoh: Drs. Santoso Tri Hananto, M,Acc., Ak" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Jabatan Penandatangan Mitra *</label>
                                            <input type="text" class="form-control" name="jabatanpenandatangan"
                                                placeholder="Contoh: Dekan Sekolah Vokasi UNS" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Nama Narahubung Mitra</label>
                                            <input type="text" class="form-control" name="narahubung" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Nomor HP Narahubung Mitra *</label>
                                            <input type="text" class="form-control" name="no_hp"
                                                placeholder="Contoh: 0856789876211" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" name="next" class="btn btn-primary next action-button float-end"
                                value="Next">Next</button>
                        </fieldset>
                        <fieldset>
                            <div class="form-card text-start">
                                <div class="row">
                                    <div class="col-7">
                                        <h3 class="mb-4">Informasi Perjanjian:</h3>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="MultipleSelect">Ruang Lingkup Perjanjian</label>
                                            {{-- <select class="js-example-basic-multiple" name="states[]"
                                                multiple="multiple"> --}}
                                                <select class="select2-multiple form-control" name="ruanglingkup_id[]"
                                                    multiple="multiple" id="select2Multiple">
                                                    {{-- <option value="">--Pilih--</option> --}}
                                                    @foreach ($ruanglingkup as $item)
                                                    <option value="{{ $item->id }}">{{ $item->ruanglingkup }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="MultipleSelect">Prodi Yang Terlibat</label>
                                            {{-- <select class="form-control" name="proditerlibat_id" required> --}}
                                                <select class="select2-multiple form-control" name="proditerlibat_id[]"
                                                    multiple="multiple" id="select2Multiple2">
                                                    {{-- <option value="">--Pilih--</option> --}}
                                                    @foreach ($prodi as $item)
                                                    <option value="{{ $item->id }}">{{ $item->namaprodi }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputdate">Tanggal Mulai
                                                Kerjasama</label>
                                            <input name="tanggalmulai" type="date" class="form-control"
                                                id="tanggalmulai" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="exampleInputdate">Tanggal Berakhir
                                                Kerjasama</label>
                                            <input name="tanggalakhir" type="date" class="form-control"
                                                id="tanggalakhir" value="">
                                        </div>
                                    </div>
                                    <input type="hidden" name="prodiid" value="{{ Auth::user()->prodi_id }}">

                                </div>
                            </div>


                            <button type="submit" name="submit" class="btn btn-primary next action-button float-end"
                                value="Submit">Next</button>
                            {{-- <button type="button" name="next" class="btn btn-primary next action-button float-end"
                                value="Next">Next</button> --}}
                            <button type="button" name="previous"
                                class="btn btn-dark previous action-button-previous float-end me-1"
                                value="Previous">Previous</button>
                        </fieldset>
                        <fieldset>
                            <div class="form-card">

                                <br>
                                <div id="dataTableHover_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <a href="/pengajuan" type="button" class="btn btn-secondary">Kembali Ke Halaman
                                        Pengajuan
                                    </a>
                                </div>
                                <br />

                                <h2 class="text-success text-center">
                                    <strong>SUCCESS !</strong>
                                </h2>
                                <br>
                                <div class="row justify-content-center">
                                    <div class="col-3">
                                        <img src="{{ asset('HOPE/assets/images/pages/img-success.png') }}"
                                            class="img-fluid" alt="fit-image">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h5 class="purple-text text-center">Data berhasil Ditambahkan</h5>
                                    </div>
                                </div>
                            </div>
                        </fieldset>


                </div>
            </div>
        </div>
    </div>
</div>
@include('dosen/layoutsDosen/footer')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        // Select2 Multiple
        $('#select2Multiple').select2({
            theme: 'bootstrap-5',
            placeholder: "Select",
            allowClear: true
        });

        $('#select2Multiple2').select2({
        theme: 'bootstrap-5',
        placeholder: "Select",
        allowClear: true
        });

        $('#kategorimitra_id').select2({
        theme: 'bootstrap-5',
        placeholder: "Pilih Kategori Mitra",
        });

        $('#mitraSelect').select2({
            theme: 'bootstrap-5',
            placeholder: "Pilih Mitra",
            allowClear: true,
            ajax: {
                url: '{!! route("select.mitra") !!}',
                dataType: 'json',
                delay: 400,
                data: function(params) {
                    return {
                        q: $.trim(params.term),
                    };
                },
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.namamitra,
                                id: item.id
                                }
                        })
                    };
                },
            },
            language: {
                noResults: function(){
                    return "Data Tidak Ditemukan. <button type='button' class='btn btn-xs btn-danger manual'>Klik Untuk Tambah Secara Manual</button>";
                }
            },
            escapeMarkup: function (markup) {
                return markup;
            }
        });

        $('#mitraSelect').on('change',function () {
            var id_mitra = $(this).val()

            $.ajax({
                url:'{!! route("get.mitra") !!}',
                data:{
                    id : id_mitra
                },
                success:function (data) {
                    $('input[name=id]').val(data.id)
                    $('input[name=namamitra]').val(data.namamitra)
                    $('input[name=namadagangmitra]').val(data.namadagangmitra)
                    $('input[name=alamat]').val(data.alamat)
                    $('input[name=email]').val(data.email)
                    $('input[name=namapenandatangan]').val(data.namapenandatangan)
                    $('input[name=jabatanpenandatangan]').val(data.jabatanpenandatangan)
                    $('input[name=no_hp]').val(data.no_hp)
                    $('input[name=narahubung]').val(data.narahubung)
                    $('input[name=logo]').val(data.logo)
                    $('#logoM').html('Logo: '+data.logo)
                    $("#kategorimitra_id").val(data.kategorimitra_id)
                    $("#kategorimitra_id").select2().trigger('change')
                }
            })
        })

        $(document).on('click','.manual',function () {
            $('#namamitra').show()
            $("#mitraSelect").select2("close");
            $('#mitraSelect').select2("destroy")
            $('#mitraSelect').hide()

        })

    });
</script>



<script>
    $('#tanggalmulai').on('input', function() {
        $('#tanggalakhir').attr('min', this.value);
    });
    $('#tanggalakhir').on('input', function() {
        $('#tanggalmulai').attr('max', this.value);
    });


    $('.cari-mitra').on('click',function () {
        alert('sat')
    })
</script>