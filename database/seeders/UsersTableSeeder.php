<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'), // Ganti dengan password yang aman
            'role' => 'admin',
        ]);

        // Menambahkan petugas
        User::create([
            'name' => 'Petugas User',
            'email' => 'petugas@example.com',
            'password' => bcrypt('password123'),
            'role' => 'petugas',
        ]);

        // Menambahkan pemilik
        User::create([
            'name' => 'Pemilik User',
            'email' => 'pemilik@example.com',
            'password' => bcrypt('password123'),
            'role' => 'pemilik',
        ]);
    }
}
