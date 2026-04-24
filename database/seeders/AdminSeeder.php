<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin Bioteknologi',
            'email' => 'admin@del.ac.id',
            'password' => Hash::make('admin123'), // Ini adalah password defaultnya
        ]);
    }
}