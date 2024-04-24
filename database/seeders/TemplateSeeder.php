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
        ];
        
        DB::table('template')->insert($posts);
    }
}
