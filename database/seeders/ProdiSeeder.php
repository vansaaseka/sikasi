<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            [
            'namaprodi' => 'D3 Teknik Informatika',
            ],
            [
             'namaprodi' => 'D3 Teknik Kimia',
            ],
            [
                'namaprodi' => 'D3 Teknik Mesin',
            ],
            [
                'namaprodi' => 'D3 Teknik Sipil',
            ],
            [
                'namaprodi' => 'PSDKU D3 Teknik Informatika',
            ],
            [
                'namaprodi' => 'D3 Farmasi',
            ],
            [
                'namaprodi' => 'D3 Kebidanan',
            ],
            [
                'namaprodi' => 'D4 Kebidanan',
            ],
            [
                'namaprodi' => 'D4 Keselamatan dan Kesehatan Kerja',
            ],
            [
                'namaprodi' => 'D3 Budidaya Ternak',
            ],
            [
                'namaprodi' => 'D3 Agribisnis',
            ],
            [
                'namaprodi' => 'D3 Teknologi Hasil Pertanian',
            ],
            [
                'namaprodi' => 'PSDKU D3 Teknologi Hasil Pertanian',
            ],
            [
                'namaprodi' => 'D3 Manajemen Bisnis',
            ],
            [
                'namaprodi' => 'D3 Manajemen Pemasaran',
            ],

            [
                'namaprodi' => 'D3 Manajemen Perdagangan',
            ],

            [
                'namaprodi' => 'D3 Perpajakan',
            ],

            [
                'namaprodi' => 'D3 Keuangan dan Perbankan',
            ],

            [
                'namaprodi' => 'D3 Akuntansi',
            ],

            [
                'namaprodi' => 'PSDKU D3 Akuntansi',
            ],

            [
                'namaprodi' => 'D3 Bahasa Inggris',
            ],
            [
                'namaprodi' => 'D3 Bahasa Mandarin',
            ],
            [
                'namaprodi' => 'D3 Desain Komunikasi Visual',
            ],
            [
                'namaprodi' => 'D3 Komunikasi Terapan',
            ],
            [
                'namaprodi' => 'D3 Usaha Perjalanan Wisata',
            ],
            [
                'namaprodi' => 'D3 Manajemen Administrasi',
            ],
            [
                'namaprodi' => 'D3 Perpustakaan',
            ],
            [
                'namaprodi' => 'D4 Studi Demografi dan Pencatatan Sipil',
            ],
        ];

        DB::table('prodis')->insert($posts);
    }
}
