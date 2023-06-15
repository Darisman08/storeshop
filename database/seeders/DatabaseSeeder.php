<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('roles')->insert([
            ['name' => ('Admin'),'description' => ('User Full Akses')],
            ['name' => ('Staff'),'description' => ('User Staff Akses')],
            ['name' => ('User'),'description' => ('User')]
        ]);
        DB::table('categories')->insert([
            ['name' => ('Console'),'description' => ('Console game: PS,Nintendo,XBOX, dll')],
            ['name' => ('Game'),'description' => ('Koleksi Game')],
            ['name' => ('Accessories'),'description' => ('Pelengkapan Game: Fan Cooling, Stik/gamepad, Steering Wheel, dll')]
        ]);
        DB::table('status')->insert([
            ['name' => ('Accepted')],
            ['name' => ('Rejected')],
            ['name' => ('Waiting')]
        ]);
        User::create([
            'name' => 'Aris Darisman',
            'email' => 'master@master.com',
            'password' => bcrypt('master'),
            'role_id' => 1,
            'address' => 'Jakarta',
            'position' => 'Manager'
        ]);
        

    }
}
