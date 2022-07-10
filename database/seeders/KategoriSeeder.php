<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
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
     'namakategori' => 'Perjanjian Kerjasama (PKS)',
     ],
     [
     'namakategori' => 'Memorandum of Understanding (MoU)',
     ],
    

     ];

     DB::table('kategori')->insert($posts);
     }

    
}
