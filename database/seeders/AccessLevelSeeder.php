<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('access_levels')->insert([
            'name' => 'ADMINISTRATOR',
        ]);
        DB::table('access_levels')->insert([
            'name' => 'VENDOR',
        ]);
        DB::table('access_levels')->insert([
            'name' => 'CUSTOMER',
        ]);
    }
}
