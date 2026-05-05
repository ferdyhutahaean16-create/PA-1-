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
            
            // PENTING: Jika di tabel users Anda ada kolom 'role' atau 'level', 
            // hapus tanda miring ganda (//) di bawah ini agar hak aksesnya terpisah:
            // 'role'  => 'superadmin', 
        ]);

        // 2. Akun Admin Laboratorium (Khusus Lab & Peminjaman)
        User::create([
            'name'     => 'Admin Laboratorium',
            'email'    => 'adminlab@del.ac.id',
            'password' => Hash::make('admin123'),
            
            // PENTING: Sama seperti di atas, buka komentar ini jika ada kolom 'role':
            // 'role'  => 'adminlab', 
        ]);
        
        $this->command->info('Dua akun Admin (Super Admin & Admin Lab) berhasil dibuat dengan sempurna!');
    }
}