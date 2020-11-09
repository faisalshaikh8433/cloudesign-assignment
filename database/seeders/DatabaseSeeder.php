<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'isAdmin' => true
        ]);
        
        DB::table('users')->insert([
            'name' => 'Normal',
            'email' => 'normal@gmail.com',
            'password' => Hash::make('password')
        ]);
        
        $this->call([
            ProductSeeder::class,
        ]);
    }
}
