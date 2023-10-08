<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'surname' => 'admin',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('00000000'),
        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'surname' => 'user',
            'role' => 'client',
            'email' => 'client@gmail.com',
            'password' => bcrypt('00000000'),
        ]);
    }
}