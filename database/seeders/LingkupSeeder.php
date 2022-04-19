<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LingkupSeeder extends Seeder
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
              'ruanglingkup' => 'Penyelenggara Pengajaran',
            ],
            [
              'ruanglingkup' => 'Penyelenggara Penelitian',
            ],
            [
            'ruanglingkup' => 'Penyelenggara Pengabdian kepada Masyarakat',
            ],
      
        ];
    
        DB::table('ruanglingkup')->insert($posts);
    }
}
