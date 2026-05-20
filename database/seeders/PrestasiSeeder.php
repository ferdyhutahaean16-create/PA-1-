<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prestasi::create([
        'nama_prestasi' => 'Juara 1 Karya Tulis Ilmiah Nasional',
        'tanggal_perolehan' => '2026-05-20',
        'deskripsi' => 'Prestasi tingkat nasional mahasiswa Bioteknologi.',
    ]);
    }
}
