<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat Akun Admin
        User::create([
            'name' => 'Admin Toko Roti',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), // ganti sesuai keinginan
            'role' => 'admin',
        ]);

        // Membuat Akun User Biasa (untuk testing)
        User::create([
            'name' => 'Pembeli Roti',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
    }
}