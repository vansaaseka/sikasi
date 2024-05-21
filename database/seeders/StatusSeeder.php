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
                  'namastatus' => 'Dokumen selesai direview BPU',
                ],
                [
                    'namastatus' => 'Proses tanda tangan Dekan',
                ],
                [
                    'namastatus' => 'Dokumen telah ditandatangani Dekan',
                ],
                [
                    'namastatus' => 'Proses tanda tangan Mitra',
                ],
                [
                    'namastatus' => 'Dokumen telah ditandatangani Mitra',
                ],
                [
                    'namastatus' => 'Pengajuan DKPI',
                ],
                [
                    'namastatus' => 'Dokumen direview DKPI',
                ],
                [
                    'namastatus' => 'Proses tanda tangan WR 4',
                ],
                [
                    'namastatus' => 'Selesai',
                ],  [
                    'namastatus' => 'Ajuan Diterima',
                 ],
                 [
                    'namastatus' => 'Pengajuan DKPI',
                 ],
                 [
                    'namastatus' => 'Dokumen direview DKPI',
                 ],
                 [
                   'namastatus' => ' Proses tanda tangan WR 4',
                 ],
                 [
                   'namastatus' => 'Selesai',
                 ],

            ];

            DB::table('status')->insert($posts);
        }

}
