<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'nama_lengkap' => 'Administrator',
                'role' => 'admin',
                'is_active' => true,
            ],
            [
                'username' => 'manager@gmail.com',
                'password' => Hash::make('manager123'),
                'nama_lengkap' => 'Manager',
                'role' => 'manager',
                'is_active' => true,
            ],
            [
                'username' => 'kasir@gmail.com',
                'password' => Hash::make('kasir123'),
                'nama_lengkap' => 'Siti Kasir',
                'role' => 'kasir',
                'is_active' => true,
            ],
            [
                'username' => 'gudang@gmail.com',
                'password' => Hash::make('gudang123'),
                'nama_lengkap' => 'Budi Gudang',
                'role' => 'gudang',
                'is_active' => true,
            ],
        ];

        foreach ($users as $user) {
            // 🔥 cegah duplicate (kalau seeder dijalankan ulang)
            User::updateOrCreate(
                ['username' => $user['username']],
                $user
            );
        }

        $this->command->info('✅ UserSeeder berhasil dijalankan!');
    }
}