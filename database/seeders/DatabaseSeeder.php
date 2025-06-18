<?php

namespace Database\Seeders;

use App\Models\User; // Pastikan model User diimpor
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Pastikan Hash facade diimpor

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat User Biasa
        User::firstOrCreate(
            ['email' => 'user@gmail.com'], // Cari berdasarkan email
            [
                'name' => 'User Biasa',
                'password' => Hash::make('user123'),
                'role' => 'user_biasa',
            ]
        );

        // Membuat User Admin
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // Membuat Super Admin
        User::firstOrCreate(
            ['email' => 'superadmin@gmail.com'],
            [
                'name' => 'Super Admin User',
                'password' => Hash::make('password'),
                'role' => 'super_admin',
            ]
        );

        // Anda juga bisa membuat user lain menggunakan factory jika ingin data dummy lebih banyak
        // User::factory(10)->create(); // Ini akan membuat 10 user dengan role default 'user_biasa'
    }
}