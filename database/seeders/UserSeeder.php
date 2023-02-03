<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        // User
        DB::table('users')->insert([
            'nama' => 'Bapak Admin',
            'username' => 'admin',
            'password' => Hash::make('123'),
            'level' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'nama' => 'Bapak Pengguna',
            'username' => 'user',
            'password' => Hash::make('123'),
            'level' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
