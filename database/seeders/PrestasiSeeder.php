<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prestasi;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_prestasi'    => 'Juara 1 Karya Tulis Ilmiah Nasional',
                'nama_mahasiswa'   => 'Andi Firmansyah',
                'penyelenggara'    => 'Kemendikbud',
                'tingkat'          => 'Nasional',
                'tanggal_perolehan'=> '2026-05-20',
                'bukti_sertifikat' => null,
            ],
            [
                'nama_prestasi'    => 'Juara 2 Olimpiade Sains Regional',
                'nama_mahasiswa'   => 'Siti Rahayu',
                'penyelenggara'    => 'Universitas Gadjah Mada',
                'tingkat'          => 'Regional',
                'tanggal_perolehan'=> '2026-04-10',
                'bukti_sertifikat' => null,
            ],
            [
                'nama_prestasi'    => 'Best Poster International Biotechnology Conference',
                'nama_mahasiswa'   => 'Budi Santoso',
                'penyelenggara'    => 'IUBS',
                'tingkat'          => 'Internasional',
                'tanggal_perolehan'=> '2026-03-15',
                'bukti_sertifikat' => null,
            ],
        ];

        foreach ($data as $item) {
            Prestasi::create($item);
        }
    }
}