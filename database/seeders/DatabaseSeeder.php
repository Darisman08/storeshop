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
            ['name' => ('Manager')],
            ['name' => ('Admin')],
            ['name' => ('Staff')],
            ['name' => ('User')]
        ]);
        DB::table('categories')->insert([
            ['name' => ('Software')],
            ['name' => ('Souvenir')],
            ['name' => ('Makanan')]
        ]);
        DB::table('status')->insert([
            ['name' => ('Accepted')],
            ['name' => ('Rejected')],
            ['name' => ('Waiting')]
        ]);
        User::create([
            'name' => 'Master',
            'email' => 'master@master.com',
            'password' => bcrypt('master'),
            'role_id' => 1,
            'address' => 'Jakarta'
        ]);
        

    }
}
