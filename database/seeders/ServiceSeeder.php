<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Cutting',
                'description' => 'The process of cutting wood to match the desired length, ensuring each piece meets production requirements. This step guarantees precise and clean dimensions for further processing.',
                'price' => 350000.00,
                'image' => 'images/services/cutting.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Splitting',
                'description' => 'The process of splitting wood to adjust its width according to design or order specifications. It produces uniform and proportional pieces for consistent assembly.',
                'price' => 450000.00,
                'image' => 'images/services/splitting.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Moulding',
                'description' => 'This stage flattens and smooths the wood surface while adjusting its thickness. Planing prepares the wood for joining or finishing with an even and refined texture.',
                'price' => 250000.00,
                'image' => 'images/services/moulding.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sanding',
                'description' => 'The final smoothing process using a sanding machine or sandpaper to remove rough fibers and imperfections. It results in a smooth, even surface ready for finishing.',
                'price' => 400000.00,
                'image' => 'images/services/sanding.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Finger Joint',
                'description' => 'A technique used to connect wood pieces using interlocking “finger” patterns to match desired length or width. This method creates strong, neat joints while optimizing material usage.',
                'price' => 500000.00,
                'image' => 'images/services/finger-joint.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
