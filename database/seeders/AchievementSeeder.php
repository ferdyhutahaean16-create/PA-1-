<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Achievement;
use Carbon\Carbon;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat data dummy yang sesuai dengan kolom internasional
        Achievement::create([
            'category'          => 'Mahasiswa',
            'achievement_name'  => 'Juara 1 Kompetisi Web Development IT Nasional',
            'achiever_name'     => 'Ferdy Roberto Hutahaean',
            'level'             => 'National',
            'date_earned'       => Carbon::now()->subMonths(2)->format('Y-m-d'),
            'organizer'         => 'Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi',
            'description'       => 'Meraih medali emas dalam kompetisi perancangan sistem informasi akademik berbasis Laravel.',
        ]);
        
        $this->command->info('Data Achievement dummy berhasil ditambahkan!');
    }
}