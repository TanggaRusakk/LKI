<?php

namespace Database\Seeders;

use App\Models\Wood;
use Illuminate\Container\Attributes\DB;
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
                'name' => 'Teak',
                'origin' => 'Indonesia',
                'description' => 'A premium hardwood known for its strength, natural oils, and resistance to termites and weather.',
                'characteristics' => 'Golden-brown color, fine and straight grain, high natural oil content, durable and water-resistant.',
                'uses' => 'Outdoor furniture, shipbuilding, flooring, and luxury construction.',
                'image' => 'images/wood/teak.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Meranti',
                'origin' => 'Indonesia',
                'description' => 'A medium to hardwood with reddish-brown tones and straight grain, easy to work and widely available.',
                'characteristics' => 'Medium hardness, straight grain, stable, reddish tone, lightweight compared to teak.',
                'uses' => 'Doors, windows, plywood, interior furniture.',
                'image' => 'images/wood/meranti.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Merbau',
                'origin' => 'Indonesia',
                'description' => 'A dark golden-brown hardwood with interlocked grain and exceptional durability.',
                'characteristics' => 'Dense and strong, interlocked grain, moisture-resistant, termite-resistant.',
                'uses' => 'Flooring, decking, and high-end furniture.',
                'image' => 'images/wood/merbau.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kruing',
                'origin' => 'Indonesia',
                'description' => 'Reddish-brown wood with coarse texture and good mechanical strength.',
                'characteristics' => 'Coarse texture, slightly oily, medium durability, reddish-brown color.',
                'uses' => 'Heavy construction, flooring, and plywood manufacturing.',
                'image' => 'images/wood/kruing.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sengon',
                'origin' => 'Indonesia',
                'description' => 'A lightweight, fast-growing wood used for affordable and lightweight structures.',
                'characteristics' => 'Soft texture, pale color, low density, easy to process.',
                'uses' => 'Packaging boxes, light furniture, and plywood core.',
                'image' => 'images/wood/sengon.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pine',
                'origin' => 'Indonesia',
                'description' => 'A softwood with a pleasant aroma and bright color, commonly used in furniture and décor.',
                'characteristics' => 'Lightweight, aromatic, straight grain, easy to sand and paint.',
                'uses' => 'Furniture, wall panels, interior décor, and pallets.',
                'image' => 'images/wood/pine.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // International Woods
            [
                'name' => 'Oak',
                'origin' => 'USA',
                'description' => 'A strong, durable hardwood with distinct grain patterns.',
                'characteristics' => 'Coarse texture, heavy and strong, highly durable, light to medium brown.',
                'uses' => 'Flooring, cabinetry, wine barrels, and classic furniture.',
                'image' => 'images/wood/oak.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Maple',
                'origin' => 'USA',
                'description' => 'A light-colored hardwood known for its hardness and smooth texture.',
                'characteristics' => 'Light cream color, fine grain, high density, smooth surface.',
                'uses' => 'Cabinetry, flooring, musical instruments, and butcher blocks.',
                'image' => 'images/wood/maple.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Birch',
                'origin' => 'International',
                'description' => 'A pale, fine-grained wood that is both durable and versatile.',
                'characteristics' => 'Smooth texture, pale color, takes stains well, strong and flexible.',
                'uses' => 'Furniture, plywood, and modern interior design.',
                'image' => 'images/wood/birch.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Walnut',
                'origin' => 'Europe',
                'description' => 'A luxurious dark-brown wood prized for its rich color and smooth finish.',
                'characteristics' => 'Dark chocolate tone, smooth texture, stable, and easy to polish.',
                'uses' => 'High-end furniture, carvings, gunstocks, and decorative panels.',
                'image' => 'images/wood/walnut.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cherry',
                'origin' => 'International',
                'description' => 'A reddish-brown hardwood that darkens beautifully with age.',
                'characteristics' => 'Smooth grain, medium hardness, deepens in color over time.',
                'uses' => 'Fine furniture, cabinets, and interior trim.',
                'image' => 'images/wood/cherry.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ash',
                'origin' => 'International',
                'description' => 'A light-colored, strong, and flexible hardwood with straight grain.',
                'characteristics' => 'Light color, tough and elastic, open grain.',
                'uses' => 'Tool handles, sports equipment, and contemporary furniture.',
                'image' => 'images/wood/ash.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];
        foreach ($woods as $wood) {
            Wood::create($wood);
        }
    }
}
