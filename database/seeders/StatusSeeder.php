<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
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
                  'status' => 'Ajuan Diterima',
                ],
                [
                  'status' => 'Draft direview DKPI UNS',
                ],
                [
                    'status' => 'Draft selesai direview',
                ],
                [
                    'status' => 'Tanda tangan mitra',
                ],
                [
                    'status' => 'Dokumen telah ditandatangani mitra',
                ],
                [
                    'status' => 'Tanda tangan WR4',
                ],
                [
                    'status' => 'Selesai',
                ],
                
                
            ];
    
            DB::table('status')->insert($posts);
        }
    
}
