<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopikSeeder extends Seeder
{
    public function run(): void
    {
        $topiks = [
            [
                'nama_topik' => 'Kurikulum Merdeka',
                'judul_topik' => 'Implementasi Kurikulum Merdeka',
            ],
            [
                'nama_topik' => 'Perencanaan Pembelajaran',
                'judul_topik' => 'Perencanaan Pembelajaran yang Efektif',
            ],
            [
                'nama_topik' => 'Pembelajaran Berdiferensiasi',
                'judul_topik' => 'Pembelajaran Berdiferensiasi',
            ],
            [
                'nama_topik' => 'Asesmen Pembelajaran',
                'judul_topik' => 'Asesmen dalam Pembelajaran',
            ],
            [
                'nama_topik' => 'Media Pembelajaran',
                'judul_topik' => 'Pemanfaatan Media dan Teknologi Pembelajaran',
            ],
            [
                'nama_topik' => 'Pengembangan Kompetensi Guru',
                'judul_topik' => 'Pengembangan Profesional Guru',
            ],
            [
                'nama_topik' => 'Refleksi Pembelajaran',
                'judul_topik' => 'Refleksi dan Evaluasi Pembelajaran',
            ],
            [
                'nama_topik' => 'Projek dan Praktik Baik',
                'judul_topik' => 'Praktik Baik dalam Pembelajaran',
            ],
        ];

        foreach ($topiks as $topik) {
            DB::table('topik')->updateOrInsert(
                [
                    'nama_topik' => $topik['nama_topik'],
                ],
                [
                    'judul_topik' => $topik['judul_topik'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        $this->command->info('Topik berhasil dibuat.');
    }
}
