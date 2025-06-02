<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // pastikan model User sesuai namespace kamu

class UserSeeder extends Seeder
{
    public function run()
    {
        // Akun mahasiswa
        User::create([
            'name' => 'Mahasiswa Satu',
            'email' => 'mahasiswa@student.ub.com',
            'password' => Hash::make('password'), // ganti dengan yang aman
            'role' => 'mahasiswa',
        ]);

        // Akun petugas
        User::create([
            'name' => 'Petugas Satu',
            'email' => 'petugas@ub.com',
            'password' => Hash::make('password'), // ganti dengan yang aman
            'role' => 'petugas',
        ]);
    }
}

