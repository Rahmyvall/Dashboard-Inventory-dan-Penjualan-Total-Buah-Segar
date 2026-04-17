<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username'      => 'admin@gmail.com',
            'password_hash' => Hash::make('admin123'),
            'nama_lengkap'  => 'Administrator',
            'role'          => 'admin',
            'is_active'     => true,
        ]);

        // Tambahkan user lain kalau mau
        User::create([
            'username'      => 'kasir@gmail.com',
            'password_hash' => Hash::make('kasir123'),
            'nama_lengkap'  => 'Siti Kasir',
            'role'          => 'kasir',
            'is_active'     => true,
        ]);

        $this->command->info('UserSeeder selesai dijalankan!');
    }
}