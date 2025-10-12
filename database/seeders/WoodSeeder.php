<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wood;

class WoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $woods = [
            [
                'name' => 'Teak',
                'origin' => 'Indonesia',
                'price' => 'Rp 5.000.000/m³',
                'usage' => 'Furniture, Flooring',
                'description' => 'Strong, durable, and termite-resistant wood.',
                'image_url' => 'https://images.unsplash.com/photo-1603190287605-e6ade32fa852'
            ],
            [
                'name' => 'Merbau',
                'origin' => 'Indonesia',
                'price' => 'Rp 4.800.000/m³',
                'usage' => 'Decking, Frames',
                'description' => 'Dense with rich reddish tones.',
                'image_url' => 'https://images.unsplash.com/photo-1616628182502-47e4ec7a0e03'
            ],
            [
                'name' => 'Oak',
                'origin' => 'Imported',
                'price' => 'Rp 6.500.000/m³',
                'usage' => 'Luxury Furniture',
                'description' => 'Dense wood with fine grain pattern.',
                'image_url' => 'https://images.unsplash.com/photo-1565538810643-b5bdb714032a'
            ],
            [
                'name' => 'Walnut',
                'origin' => 'Imported',
                'price' => 'Rp 7.200.000/m³',
                'usage' => 'Interior Panels',
                'description' => 'Dark tone, elegant, premium wood.',
                'image_url' => 'https://images.unsplash.com/photo-1616628182077-915d4793055b'
            ],
        ];

        foreach ($woods as $wood) {
            Wood::create($wood);
        }
    }
}
