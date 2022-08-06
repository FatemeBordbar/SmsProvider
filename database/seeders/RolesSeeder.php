<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['id' => 1, 'title' => 'admin',  'created_at' => new \DateTime()],
            ['id' => 2, 'title' => 'user', 'created_at' => new \DateTime()],
        ]);
    }
}
