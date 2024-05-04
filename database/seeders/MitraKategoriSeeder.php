<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MitraKategoriSeeder extends Seeder
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
                'mitrakategori' => 'Internasional',
            ],
            [
                'mitrakategori' => 'Nasional',
            ],
            [
                'mitrakategori' => 'Regional',
            ],
        ];

        DB::table('mitra_kategori')->insert($posts);
    }
}
