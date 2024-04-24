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
                  'kategorimitra' => '01 - Perusahaan multinasinal',
                ],
                [
                  'kategorimitra' => '02 - Perusahaan nasional berstandar tinggi',
                ],
                [
                    'kategorimitra' => '03 - Perusahaan teknologi global',
                ],
                [
                    'kategorimitra' => '04 - Perusahaan rintisan (startup company) teknologi',
                ],
                [
                    'kategorimitra' => '05 - Organisasi nirlaba kelas dunia',
                ],
                [
                    'kategorimitra' => '06 - Institusi/organisasi multilateral',
                ],
                [
                    'kategorimitra' => '07 - Perguruan tinggi yang masuk dalam daftar QS100 berdasarkan ilmu (QS100 by subject)',
                ],
                [
                    'kategorimitra' => '08 - Perguruan tinggi, fakultas, atau program studi dalam bidang yang relevan (univ vokasi)',
                ],
                [
                    'kategorimitra' => '09 - Instansi pemerintah, BUMN dan/atau BUMD',
                ],
                [
                    'kategorimitra' => '10 - Rumah sakit',
                ],
                [
                    'kategorimitra' => '11 - UMKM',
                ],
            ];

            DB::table('kategorimitra')->insert($posts);
        }

    }

