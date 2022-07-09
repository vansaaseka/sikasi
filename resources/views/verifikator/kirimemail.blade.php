@component('mail::message')
    SIKASI (SISTEM INFORMASI PENGAJUAN KERJASAMA SEKOLAH VOKASI)

    Hallo, {{ $data['user'] }}

    Peengajuan anda dengan mitra {{ $data['mitra'] }} sedang dalam status {{ $data['status'] }}


    Thanks,
    {{ config('app.name') }}
@endcomponent
