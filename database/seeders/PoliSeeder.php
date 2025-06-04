<?php

namespace Database\Seeders;

use App\Models\Poli;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $polis = [
            [
                'nama_poli' => 'Poli Umum',
                'keterangan' => 'Pelayanan umum untuk semua pasien',
            ],
            [
                'nama_poli' => 'Poli Anak',
                'keterangan' => 'Pelayanan khusus untuk anak-anak',
            ],
            [
                'nama_poli' => 'Poli Gigi',
                'keterangan' => 'Pelayanan kesehatan gigi dan mulut',
            ],
            [
                'nama_poli' => 'Poli Kandungan',
                'keterangan' => 'Pelayanan kesehatan ibu dan anak',
            ],
            [
                'nama_poli' => 'Poli THT',
                'keterangan' => 'Pelayanan kesehatan telinga, hidung, dan tenggorokan',
            ],
        ];

        foreach ($polis as $poli) {
            Poli::create($poli);
        }
    }
}
