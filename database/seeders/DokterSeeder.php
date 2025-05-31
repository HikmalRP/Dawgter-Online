<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dokters = [
            [
                'nama' => 'Dr. Brando',
                'alamat' => 'Jl. Dawgtor No. 123',
                'no_hp' => '081234567890',
                'email' => 'brando@gmail.com',
                'password' => Hash::make('brando@gmail.com'),
                'role' => 'dokter',
            ],
            [
                'nama' => 'Dr. Ambadoktor',
                'alamat' => 'Jl. Goa Persembunyian OPM No. 456',
                'no_hp' => '081234567891',
                'email' => 'ambadoktor@gmail.com',
                'password' => Hash::make('ambadoktor@gmail.com'),
                'role' => 'dokter',
            ],
        ];

        foreach ($dokters as $dokter) {
            $existingDokter = User::where('email', $dokter['email'])->first();

            if (!$existingDokter) {
                User::create($dokter);
                $this->command->info('Akun dokter ' . $dokter['nama'] . ' berhasil dibuat!');
            } else {
                $this->command->info('Akun dokter ' . $dokter['nama'] . ' sudah ada.');
            }
        }
    }
}
