@component('mail::message')
    SIKASI (SISTEM INFORMASI PENGAJUAN KERJASAMA SEKOLAH VOKASI)

    Hallo, {{ $data['user'] }}

    Pengajuan anda dengan mitra {{ $data['mitra'] }} sedang dalam status {{ $data['aksi'] }}


    Thanks,
    {{ config('app.name') }}
@endcomponent
