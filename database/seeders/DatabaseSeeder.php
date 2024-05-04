<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            StatusSeeder::class,
            // DrafSeeder::class,
            KategoriMitraSeeder::class,
            KategoriSeeder::class,
            MitraKategoriSeeder::class,
            LingkupSeeder::class,
            ProdiSeeder::class,
            TemplateSeeder::class,
        ]);
    }
}
