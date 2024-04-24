@component('mail::message')
    SIKASI (SISTEM INFORMASI PENGAJUAN KERJASAMA SEKOLAH VOKASI)

    Hallo, {{ $data['user'] }}

    Pengajuan anda dengan mitra {{ $data['mitra'] }}

    Akan Berakhir Pada : {{ $data['deadline'] }}

    Terimaksih,
    {{ config('app.name') }}
@endcomponent
