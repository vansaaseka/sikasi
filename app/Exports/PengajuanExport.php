<?php

namespace App\Exports;

use App\Models\Pengajuan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class PengajuanExport implements FromCollection,WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function map($pengajuan): array
    // {
    //     $pengajuan = Pengajuan::all();

    //     return [
    //         $pengajuan->user->name,
    //         $pengajuan->kategori->namakategori,
    //         $pengajuan->mitra->namamitra,
    //     ];
    // }
    public function headings(): array
    {
        return [
            'User',
            'Kategori',
            'Mitra',
            // 'Ruang Lingkup',
            // 'Prodi Terlibat',
            'Tanggal Mulai',
            'Tanggal Akhir'
        ];
    }
    public function collection()
    {
        return Pengajuan::all();
    }

    public function map($row): array
    {
        return [
            $row->user->name,
            $row->kategori->namakategori,
            $row->mitra->namamitra,
            // $row->ruanglingkup->ruanglingkup,
            // $row->prodi->namaprodi,
            $row->tanggalmulai,
            $row->tanggalakhir,
        ];
    }
}
