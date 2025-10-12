<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();

        $woods = [
            // Indonesian Woods
            [
                'name' => 'Teak (Tectona grandis)',
                'description' => 'A premium hardwood known for its strength, natural oils, and resistance to termites and weather. It has a golden-brown color with fine grain, perfect for outdoor furniture and high-end construction.',
                'image' => 'https://images.unsplash.com/photo-1565538810643-b5bdb714032a',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Meranti (Shorea spp.)',
                'description' => 'A medium to hardwood with reddish-brown tones and straight grain. Commonly used for doors, windows, plywood, and furniture due to its stability and easy workability.',
                'image' => 'https://images.unsplash.com/photo-1578301978693-85fa9c0320e1',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Merbau (Intsia bijuga)',
                'description' => 'A dark golden-brown hardwood with interlocked grain and high durability. Resistant to moisture and insects, ideal for flooring, decking, and premium furniture.',
                'image' => 'https://images.unsplash.com/photo-1621121813613-b6d88173d02d',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Kruing (Dipterocarpus spp.)',
                'description' => 'Reddish-brown wood with coarse texture and good strength. Often used for heavy construction, flooring, and plywood manufacturing.',
                'image' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Sengon (Albizia chinensis)',
                'description' => 'A lightweight, pale-colored wood with soft texture. Frequently used for packaging boxes, lightweight structures, and budget furniture due to its fast growth and easy processing.',
                'image' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Pine (Pinus merkusii)',
                'description' => 'A softwood with a pleasant aroma and bright color, often used for furniture, wall panels, and interior décor.',
                'image' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // International Woods
            [
                'name' => 'Oak (Quercus spp.)',
                'description' => 'A strong, durable hardwood with a distinct, coarse grain pattern. Commonly used for flooring, cabinetry, and classic furniture thanks to its longevity and timeless look.',
                'image' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Maple (Acer spp.)',
                'description' => 'A light-colored hardwood with a smooth, even texture. Known for its hardness and clean appearance, often used in cabinetry, flooring, and musical instruments.',
                'image' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Birch (Betula spp.)',
                'description' => 'A pale, fine-grained wood that is both durable and versatile. It takes stains well and is used in plywood, furniture, and modern interior design.',
                'image' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Walnut (Juglans nigra)',
                'description' => 'A luxurious dark-brown wood prized for its rich color and smooth finish. Used for high-end furniture, carvings, and decorative panels.',
                'image' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Cherry (Prunus serotina)',
                'description' => 'A reddish-brown hardwood that darkens beautifully over time. Valued for fine furniture, cabinets, and interior finishes.',
                'image' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Ash (Fraxinus spp.)',
                'description' => 'A light-colored, strong, and flexible hardwood with straight grain. Commonly used for sports equipment, tool handles, and contemporary furniture.',
                'image' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Spruce (Picea spp.)',
                'description' => 'A lightweight, pale softwood known for its resonant qualities. Widely used in musical instruments, structural framing, and plywood production.',
                'image' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('wood')->insertOrIgnore($woods);
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
