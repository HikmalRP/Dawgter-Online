<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'nama' => 'Admin Yangyang',
                'alamat' => 'Jl. Admin No. 123',
                'no_hp' => '081234567869',
                'email' => 'adminyangyang@gmail.com',
                'password' => Hash::make('adminyangyang123'),
                'role' => 'admin',
            ],
        ];

        foreach ($admins as $admin) {
            $existingAdmin = User::where('email', $admin['email'])->first();

            if (!$existingAdmin) {
                User::create($admin);
                $this->command->info('Akun dokter ' . $admin['nama'] . ' berhasil dibuat!');
            } else {
                $this->command->info('Akun dokter ' . $admin['nama'] . ' sudah ada.');
            }
        }
    }
}
