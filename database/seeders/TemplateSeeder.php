<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplateSeeder extends Seeder
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
            'namatemplate' => 'pks',
            'template' => 'pks.docx',
           ],
           [
            'namatemplate' => 'mou',
            'template' => 'mou.docx',
           ],
           [
            'namatemplate' => 'PKS Turunan dari PKS Induk',
            'template' => 'pks.docx',
           ],
           [
            'namatemplate' => 'Addendum PKS',
            'template' => 'mou.docx',
           ],
           [
            'namatemplate' => 'PKS (perpanjangan)',
            'template' => 'pks.docx',
           ],
           [
            'namatemplate' => 'MoU (perpanjangan)',
            'template' => 'mou.docx',
           ],
        ];

        DB::table('template')->insert($posts);
    }
}
