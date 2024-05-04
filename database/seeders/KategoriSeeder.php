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
     [
     'namakategori' => 'PKS Turunan dari PKS Induk',
     ],
     [
     'namakategori' => 'Addendum PKS',
     ],
     [
     'namakategori' => 'PKS (perpanjangan)',
     ],
     [
     'namakategori' => 'MoU (perpanjangan)',
     ],


     ];

     DB::table('kategori')->insert($posts);
     }


}
