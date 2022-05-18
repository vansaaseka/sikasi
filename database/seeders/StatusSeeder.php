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
                    'namastatus' => 'Draft Diajukan',
                  ],
                [
                  'namastatus' => 'Ajuan Diterima',
                ],
                [
                  'namastatus' => 'Draft direview DKPI UNS',
                ],
                [
                    'namastatus' => 'Draft selesai direview',
                ],
                [
                    'namastatus' => 'Tanda tangan mitra',
                ],
                [
                    'namastatus' => 'Dokumen telah ditandatangani mitra',
                ],
                [
                    'namastatus' => 'Tanda tangan WR4',
                ],
                [
                    'namastatus' => 'Selesai',
                ],
                
                
            ];
    
            DB::table('status')->insert($posts);
        }
    
}
