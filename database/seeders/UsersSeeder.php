<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use mysqli;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $posts = [
            [
                'name' => "Dosen",
                'email' => "dosen@gmail.com",
                'status' => "1",
                'role' => "0",
                'email_verified_at' => date(now()),
                'password' => bcrypt('dosen123'),
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'name' => "Admin",
                'email' => "admin@gmail.com",
                'status' => "1",
                'role' => "1",
                'email_verified_at' => date(now()),
                'password' => bcrypt('admin123'),
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'name' => "Verifikator",
                'email' => "verifikator@gmail.com",
                'status' => "1",
                'role' => "2",
                'email_verified_at' => date(now()),
                'password' => bcrypt('verifikator123'),
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],    
            [
                'name' => "Reviewer",
                'email' => "reviewer@gmail.com",
                'status' => "1",
                'role' => "3",
                'email_verified_at' => date(now()),
                'password' => bcrypt('reviewer123'),
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],

        ];
        DB::table('users')->insert($posts);
    }
}