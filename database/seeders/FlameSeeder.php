<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class FlameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flames')->insert([
            'name' => '金',
            'color' => 1,
            'style' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
         
        DB::table('flames')->insert([
            'name' => '銀',
            'color' => 2,
            'style' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
