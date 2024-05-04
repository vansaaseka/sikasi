<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriMitraSeeder extends Seeder
{

        public function run()
        {
            $posts = [
                [
                  'kategorimitra' => '01 - Perusahaan nasional berstandar tinggi',
                ],
                [
                    'kategorimitra' => '02 - Perusahaan teknologi global',
                ],
                [
                    'kategorimitra' => '03 - Perusahaan rintisan (startup company) teknologi',
                ],
                [
                    'kategorimitra' => '04 - Organisasi nirlaba kelas dunia',
                ],
                [
                    'kategorimitra' => '05 - Institusi/organisasi multilateral',
                ],
                [
                    'kategorimitra' => '06 - Perguruan tinggi yang masuk dalam daftar QS100 berdasarkan ilmu (QS100 by subject)',
                ],
                [
                    'kategorimitra' => '07 - Perguruan tinggi, fakultas, atau program studi dalam bidang yang relevan (univ vokasi)',
                ],
                [
                    'kategorimitra' => '08 - Instansi pemerintah, BUMN dan/atau BUMD',
                ],
                [
                    'kategorimitra' => '09 - Rumah sakit',
                ],
                [
                    'kategorimitra' => '10 - UMKM',
                ],
            ];

            DB::table('kategorimitra')->insert($posts);
        }

    }

