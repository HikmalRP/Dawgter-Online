<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pasiens = [
            [
                'nama' => 'Andriana',
                'alamat' => 'Jl. Barber No. 123',
                'no_hp' => '081234567890',
                'email' => 'andriana@gmail.com',
                'password' => Hash::make('andriana@gmail.com'),
                'role' => 'pasien',
            ],
            [
                'nama' => 'Rusdiansyah',
                'alamat' => 'Jl. Bogel No. 456',
                'no_hp' => '081234567891',
                'email' => 'rusdiansyah@gmail.com',
                'password' => Hash::make('rusdiansyah@gmail.com'),
                'role' => 'pasien',
            ],
        ];

        foreach ($pasiens as $pasien) {
            $existingPasien = User::where('email', $pasien['email'])->first();

            if (!$existingPasien) {
                User::create($pasien);
                $this->command->info('Akun pasien ' . $pasien['nama'] . ' berhasil dibuat!');
            } else {
                $this->command->info('Akun pasien ' . $pasien['nama'] . ' sudah ada.');
            }
        }
    }
}
