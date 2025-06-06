<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call(UserSeeder::class);

        // You can add more seeders here if needed
        // $this->call(AnotherSeeder::class);
        // $this->call(YetAnotherSeeder::class);
    }
}
