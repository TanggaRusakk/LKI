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

        $users = \App\Models\User::where('role', '!=', 'admin')->get();
        if ($users->isEmpty()) {
            \App\Models\User::factory(5)->create(['role' => 'user']);
            $users = \App\Models\User::where('role', '!=', 'admin')->get();
        }

        $services = \App\Models\Service::all();
        if ($services->isEmpty()) {
            \App\Models\Service::factory(6)->create();
            $services = \App\Models\Service::all();
        }

        foreach ($services as $service) {
            $reviewCount = rand(1, 4);
            for ($i = 0; $i < $reviewCount; $i++) {
                $user = $users->random();
                \App\Models\Review::create([
                    'user_id' => $user->id,
                    'service_id' => $service->id,
                    'title' => fake()->sentence(4),
                    'rating' => rand(1, 5),
                    'comment' => fake()->paragraph(2),
                ]);
            }
        }
        \App\Models\Review::factory(10)->create();
    }
}
