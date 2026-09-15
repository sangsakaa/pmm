<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        $dataGuru = [
            [
                'nuptk' => '1234567890123456',
                'nama_guru' => 'M Izul Ula',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Kediri',
                'tanggal_lahir' => '1990-01-01',
            ],
            [
                'nuptk' => '1234567890123457',
                'nama_guru' => 'Ahmad Fauzi',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Kediri',
                'tanggal_lahir' => '1988-05-12',
            ],
            [
                'nuptk' => '1234567890123458',
                'nama_guru' => 'Siti Aminah',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Kediri',
                'tanggal_lahir' => '1991-08-20',
            ],
            [
                'nuptk' => '1234567890123459',
                'nama_guru' => 'Budi Santoso',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Kediri',
                'tanggal_lahir' => '1987-11-10',
            ],
            [
                'nuptk' => '1234567890123460',
                'nama_guru' => 'Dewi Lestari',
                'jenis_kelamin' => 'P',
                'tempat_lahir' => 'Kediri',
                'tanggal_lahir' => '1992-03-15',
            ],
        ];

        foreach ($dataGuru as $guru) {
            Guru::updateOrCreate(
                ['nuptk' => $guru['nuptk']],
                $guru
            );
        }

        $this->command->info('Data Guru berhasil dibuat.');
        $this->command->info('Total Guru: ' . count($dataGuru));
    }
}
