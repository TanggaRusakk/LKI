<?php

namespace Database\Seeders;

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
        $now = now();

        $services = [
            [
                'name' => 'Cutting (Resize)',
                'description' => 'Proses memotong kayu sesuai panjang yang diinginkan, memastikan setiap potong memenuhi kebutuhan produksi dengan dimensi yang presisi dan rapi untuk proses selanjutnya.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Splitting',
                'description' => 'Proses membelah kayu untuk menyesuaikan lebar sesuai desain atau pesanan. Menghasilkan potongan yang seragam dan proporsional untuk perakitan yang konsisten.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Smoothing (Molding) / Planing',
                'description' => 'Tahap meratakan dan menghaluskan permukaan kayu serta menyesuaikan ketebalan. Planing mempersiapkan kayu untuk penyambungan atau finishing dengan tekstur yang rata dan halus.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sanding',
                'description' => 'Proses penghalusan akhir menggunakan mesin amplas atau amplas tangan untuk menghilangkan serat kasar dan ketidaksempurnaan, menghasilkan permukaan halus siap finishing.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Joining (Finger Joint)',
                'description' => 'Teknik menyambung potongan kayu menggunakan pola “finger” yang saling mengunci untuk menyesuaikan panjang atau lebar. Metode ini menciptakan sambungan yang kuat dan rapi sambil mengoptimalkan penggunaan bahan.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('services')->insertOrIgnore($services);
    }
}
