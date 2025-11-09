<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = \App\Models\User::all();

        // Create some general reviews
        $services = \App\Models\Service::all();
        foreach ($users as $user) {
            \App\Models\Review::create([
                'user_id' => $user->id,
                'service_id' => $services->random()->id,
                'title' => fake()->sentence(4),
                'rating' => rand(3, 5),
                'comment' => fake()->paragraph(2),
            ]);
        }

        // Create some additional reviews
        \App\Models\Review::factory(10)->create();
    }
}
