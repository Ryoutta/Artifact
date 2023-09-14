<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class ArtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('arts')->insert([
            'user_id' => 1,
            'title' => '1歳3ヶ月目',
            'body' => '初めての作品',
            'flame_id' => 1,
            'category_id' => 1,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
         
        DB::table('arts')->insert([
            'user_id' => 1,
            'title' => '2歳3ヶ月目',
            'body' => '初めての作品',
            'flame_id' => 2,
            'category_id' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('arts')->insert([
            'user_id' => 1,
            'title' => '3歳3ヶ月目',
            'body' => '初めての作品',
            'flame_id' => 1,
            'category_id' => 2,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
