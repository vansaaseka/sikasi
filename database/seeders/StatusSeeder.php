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
                    'namastatus' => 'Ajuan Diterima',
                  ],
                [
                  'namastatus' => 'Dokumen direview BPU',
                ],
                [
                  'namastatus' => 'Dokumen Selesai direview BPU',
                ],
                
                [
                    'namastatus' => 'Tanda tangan Dekan',
                ],
                [
                    'namastatus' => 'Dokumen telah ditandatangani Dekan',
                ],
                [
                    'namastatus' => 'Tanda tangan Mitra',
                ],
                [
                    'namastatus' => 'Dokumen telah ditandatangani Mitra',
                ],
                [
                    'namastatus' => 'Pengajuan tanda tangan WR 4',
                ],
                [
                    'namastatus' => 'Dokumen direview DKPI',
                ],
                [
                    'namastatus' => 'Tanda tangan WR 4',
                ],
                [
                    'namastatus' => 'Selesai',
                ],
                
                
            ];
    
            DB::table('status')->insert($posts);
        }
    
}
