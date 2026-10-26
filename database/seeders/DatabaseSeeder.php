<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seeder Akun Awal
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@perpus.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Petugas Perpustakaan',
            'email' => 'petugas@perpus.com',
            'password' => Hash::make('password123'),
            'role' => 'petugas',
        ]);

        // Seeder Kategori Default
        Category::create(['name' => 'Teknologi & Ilmu Komputer']);
        Category::create(['name' => 'Novel & Sastra']);
        Category::create(['name' => 'Sejarah & Biografi']);
    }
}