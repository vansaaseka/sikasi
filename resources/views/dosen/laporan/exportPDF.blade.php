<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan PDF - {{ $dataPengaju->mitra->namamitra }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<style>
    * {
        padding: 0%;
        margin: 0%;
    }

    body {
        font-family: Arial, sans-serif;
        font-weight: 400;
        padding: 0%;
        margin: 0%;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        table-layout: fixed !important;
    }

    table,
    th,
    td {
        border: 1px solid black;
        padding: 2px;
        word-wrap: break-word;
    }

    .formatted-text {
        font-family: Arial, sans-serif;
        font-size: 14px;
        line-height: 1.5;
        white-space: pre-wrap;
        /* Mengatasi wrapping teks */
        word-break: break-word;
        /* Memastikan kata-kata tidak terputus */
        margin: 0;
        padding: 0;
    }
</style>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <h1 style="text-align:center">LAPORAN PELAKSANAAN KERJA SAMA</h1>
                <table border="1">
                    <tr>
                        <th width="3%">1.</th>
                        <th width="30%">JUDUL KERJASAMA</th>
                        <th width="2%">:</th>
                        <td width="65%">{{ $dataPengaju->tentang }}</td>
                    </tr>
                    <tr>
                        <th>2.</th>
                        <th>REFRENSI KERJA SAMA (MoA/IA)</th>
                        <th>:</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>3.</th>
                        <th>MITRA KERJASAMA</th>
                        <th>:</th>
                        <td>{{ $dataPengaju->mitra->namamitra }}</td>
                    </tr>
                    <tr>
                        <th>4.</th>
                        <th>RUANGLINGKUP</th>
                        <th>:</th>
                        <td>
                            @foreach ($ruanglingkups as $index => $ruanglingkup)
                                <div>{{ $index + 1 }}. {{ $ruanglingkup }}</div>
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <th>5.</th>
                        <th>HASIL PELAKSANAAN<br>(OUTPUT & OUTCOME)</th>
                        <th>:</th>
                        <td>{{ $hasilPelaksanaan }}</td>
                    </tr>
                    <tr>
                        <th>6.</th>
                        <th>TAUTAN/LINK<br>DOKUMENTASI KEGIATAN</th>
                        <th>:</th>
                        <td style="font-size: 13">{{ $linkDokumen }}</td>

                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4">
        <pre class="formatted-text text-justify ms-5">
<span>PENANGGUNG JAWAB KEGIATAN</span>
{{ $dataPengaju->tanggalmulai }}
<span>PIC Kegiatan,</span>                                                   {{ $dataPengaju->mitra->jabatanpenandatangan }}                        <span>Mengetahui,</span>
                                                                          {{ $dataPengaju->mitra->namamitra }},                         <span> Dekan Fakultas Sekolah Vokasi UNS,</span>

{{ $dataPengaju->user->name }}                                                               {{ $dataPengaju->mitra->namapenandatangan }}                          <span> Drs. Santoso Tri Hananto, M.Acc., Ak</span>
{{ 'NIP.' . $dataPengaju->user->nip }}                                                                               <span> NIP.196909241994021001</span>
        </pre>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
