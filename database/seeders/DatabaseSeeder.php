<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Super Admin (Akses Penuh)
        User::create([
            'name'     => 'Super Admin Bioteknologi',
            'email'    => 'admin@del.ac.id',
            'password' => Hash::make('admin123'),
            'role'     => 'super_admin', // Sesuai dengan enum di tabel users
        ]);

        // 2. Akun Admin Laboratorium (Khusus Lab & Peminjaman)
        User::create([
            'name'     => 'Admin Laboratorium',
            'email'    => 'adminlab@del.ac.id',
            'password' => Hash::make('admin123'),
            'role'     => 'admin_lab', // Sesuai dengan enum di tabel users
        ]);
        
        $this->command->info('Dua akun Admin (Super Admin & Admin Lab) berhasil dibuat dengan sempurna!');

        $this->call([
            AchievementSeeder::class,
        ]);
    }
}