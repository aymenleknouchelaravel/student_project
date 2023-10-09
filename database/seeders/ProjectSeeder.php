<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'user_id' => '1',
            'name' => 'chams eddin',
            'status' => 'active',
            'sf_adresse' => 'cite chaaba mila n02',
            'sf_name' => 'Bouhouhou',
        ]);
    }
}
