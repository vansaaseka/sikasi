<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DrafSeeder extends Seeder
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
            'namadraf' => 'Mou',
            'filedraf' => '0',
            'deskripsi' => 'Momerandum Of Understanding',
            ],
        ];
        DB::table('draf')->insert($posts);
    }

    
}
