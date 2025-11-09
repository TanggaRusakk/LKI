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
        // Create Admin User
        User::factory()->create([
            'name' => 'Admin LKI',
            'email' => 'admin@lki.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Create Regular Users
        User::factory()->create([
            'name' => 'User Test',
            'email' => 'user@lki.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        User::factory(5)->create(); // Create 5 more random users

        // Seed other tables
        $this->call([
            WoodSeeder::class,
            ServiceSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
