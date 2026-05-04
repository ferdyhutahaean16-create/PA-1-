<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   public function run(): void
{
    // Akun untuk Semua Akses (Super Admin)
    \App\Models\User::create([
        'name' => 'Super Admin Biotek',
        'email' => 'admin@del.ac.id',
        'password' => bcrypt('admin123'),
        'role' => 'super_admin',
    ]);

    // Akun Khusus Laboratorium
    \App\Models\User::create([
        'name' => 'Admin Laboratorium',
        'email' => 'lab@del.ac.id',
        'password' => bcrypt('lab123'),
        'role' => 'admin_lab',
    ]);
}
}
