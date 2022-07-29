@component('mail::message')
    SIKASI (SISTEM INFORMASI PENGAJUAN KERJASAMA SEKOLAH VOKASI)

    Hallo, {{ $data['user'] }}

    Pengajuan anda dengan mitra {{ $data['mitra'] }} tentang {{ $data['tentang'] }} dalam status {{ $data['aksi'] }}

    {{-- Catatan : {{ $data['catatan'] }} --}}

    Terimaksih,
    {{ config('app.name') }}
@endcomponent
