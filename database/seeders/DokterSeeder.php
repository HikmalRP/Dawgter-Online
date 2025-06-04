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
                'id_poli' => 1, // Asumsi Poli Umum memiliki ID 1
                'password' => Hash::make('brando@gmail.com'),
                'role' => 'dokter',
            ],
            [
                'nama' => 'Dr. Ambadoktor',
                'alamat' => 'Jl. Goa Persembunyian OPM No. 456',
                'no_hp' => '081234567891',
                'id_poli' => 2, // Asumsi Poli Anak memiliki ID 2
                'email' => 'ambadoktor@gmail.com',
                'password' => Hash::make('ambadoktor@gmail.com'),
                'role' => 'dokter',
            ],
            [
                'nama' => 'Dr. Untu',
                'alamat' => 'Jl. Nyengir No. 789',
                'no_hp' => '081234567892',
                'id_poli' => 3, // Asumsi Poli Gigi memiliki ID 3
                'email' => 'untu@gmail.com',
                'password' => Hash::make('untu@gmail.com'),
                'role' => 'dokter',
            ],
            [
                'nama' => 'Dr. Meteng',
                'alamat' => 'Jl. Moms No. 101',
                'no_hp' => '081234567893',
                'id_poli' => 4, // Asumsi Poli Kandungan memiliki ID 4
                'email' => 'meteng@gmail.com',
                'password' => Hash::make('meteng@gmail.com'),
                'role' => 'dokter',
            ],
            [
                'nama' => 'Dr. Krungu',
                'alamat' => 'Jl. Listen No. 102',
                'no_hp' => '081234567894',
                'id_poli' => 5, // Asumsi Poli THT memiliki ID 5
                'email' => 'krungu@gmail.com',
                'password' => Hash::make('krungu@gmail.com'),
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
