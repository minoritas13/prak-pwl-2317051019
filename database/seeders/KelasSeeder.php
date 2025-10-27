<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;
use Illuminate\Support\Facades\Crypt;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'A',
            'B',
            'C',
            'D',
        ];

        foreach($data as $kelas) {
            Kelas::create([
                'nama_kelas' => Crypt::encryptString($kelas),
            ]);
        }
    }
}
