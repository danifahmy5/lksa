<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Admin User',
            'username' => 'admin',
            'password' => bcrypt('password'), // Use a secure password in production
        ]);

        \App\Models\User::create([
            'name' => 'Regular User',
            'username' => 'user',
            'password' => bcrypt('password'), // Use a secure password in production
        ]);
    }
}
