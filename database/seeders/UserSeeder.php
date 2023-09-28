<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'ryo',
            'email' => 'ryoutakuromaru@icloud.com',
            'email_verified_at' => null,
            'password' => Hash::make('ryo'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
         
    }
}