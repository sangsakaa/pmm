<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModulSeeder extends Seeder
{
    public function run(): void
    {
        $moduls = [
            // KURIKULUM MERDEKA
            [
                'topik' => 'Kurikulum Merdeka',
                'nama_modul' => 'KM-01',
                'judul_modul' => 'Memahami Konsep Dasar Kurikulum Merdeka',
            ],
            [
                'topik' => 'Kurikulum Merdeka',
                'nama_modul' => 'KM-02',
                'judul_modul' => 'Prinsip Pembelajaran dalam Kurikulum Merdeka',
            ],
            [
                'topik' => 'Kurikulum Merdeka',
                'nama_modul' => 'KM-03',
                'judul_modul' => 'Implementasi Kurikulum Merdeka di Satuan Pendidikan',
            ],

            // PERENCANAAN PEMBELAJARAN
            [
                'topik' => 'Perencanaan Pembelajaran',
                'nama_modul' => 'PP-01',
                'judul_modul' => 'Menyusun Tujuan Pembelajaran',
            ],
            [
                'topik' => 'Perencanaan Pembelajaran',
                'nama_modul' => 'PP-02',
                'judul_modul' => 'Menyusun Alur Tujuan Pembelajaran',
            ],
            [
                'topik' => 'Perencanaan Pembelajaran',
                'nama_modul' => 'PP-03',
                'judul_modul' => 'Menyusun Modul Ajar',
            ],

            // PEMBELAJARAN BERDIFERENSIASI
            [
                'topik' => 'Pembelajaran Berdiferensiasi',
                'nama_modul' => 'PD-01',
                'judul_modul' => 'Konsep Pembelajaran Berdiferensiasi',
            ],
            [
                'topik' => 'Pembelajaran Berdiferensiasi',
                'nama_modul' => 'PD-02',
                'judul_modul' => 'Identifikasi Kebutuhan Belajar Peserta Didik',
            ],
            [
                'topik' => 'Pembelajaran Berdiferensiasi',
                'nama_modul' => 'PD-03',
                'judul_modul' => 'Strategi Pembelajaran Berdiferensiasi',
            ],

            // ASESMEN
            [
                'topik' => 'Asesmen Pembelajaran',
                'nama_modul' => 'AP-01',
                'judul_modul' => 'Konsep Dasar Asesmen Pembelajaran',
            ],
            [
                'topik' => 'Asesmen Pembelajaran',
                'nama_modul' => 'AP-02',
                'judul_modul' => 'Asesmen Diagnostik',
            ],
            [
                'topik' => 'Asesmen Pembelajaran',
                'nama_modul' => 'AP-03',
                'judul_modul' => 'Asesmen Formatif dan Sumatif',
            ],

            // MEDIA PEMBELAJARAN
            [
                'topik' => 'Media Pembelajaran',
                'nama_modul' => 'MP-01',
                'judul_modul' => 'Pemanfaatan Media Pembelajaran',
            ],
            [
                'topik' => 'Media Pembelajaran',
                'nama_modul' => 'MP-02',
                'judul_modul' => 'Pemanfaatan Teknologi Digital dalam Pembelajaran',
            ],
            [
                'topik' => 'Media Pembelajaran',
                'nama_modul' => 'MP-03',
                'judul_modul' => 'Membuat Media Pembelajaran Interaktif',
            ],

            // KOMPETENSI GURU
            [
                'topik' => 'Pengembangan Kompetensi Guru',
                'nama_modul' => 'PKG-01',
                'judul_modul' => 'Pengembangan Kompetensi Profesional Guru',
            ],
            [
                'topik' => 'Pengembangan Kompetensi Guru',
                'nama_modul' => 'PKG-02',
                'judul_modul' => 'Pengembangan Kompetensi Pedagogik',
            ],
            [
                'topik' => 'Pengembangan Kompetensi Guru',
                'nama_modul' => 'PKG-03',
                'judul_modul' => 'Komunitas Belajar Guru',
            ],

            // REFLEKSI
            [
                'topik' => 'Refleksi Pembelajaran',
                'nama_modul' => 'RP-01',
                'judul_modul' => 'Konsep Refleksi Pembelajaran',
            ],
            [
                'topik' => 'Refleksi Pembelajaran',
                'nama_modul' => 'RP-02',
                'judul_modul' => 'Melakukan Refleksi Praktik Mengajar',
            ],

            // PRAKTIK BAIK
            [
                'topik' => 'Projek dan Praktik Baik',
                'nama_modul' => 'PPB-01',
                'judul_modul' => 'Identifikasi Praktik Baik Pembelajaran',
            ],
            [
                'topik' => 'Projek dan Praktik Baik',
                'nama_modul' => 'PPB-02',
                'judul_modul' => 'Dokumentasi Praktik Baik',
            ],
            [
                'topik' => 'Projek dan Praktik Baik',
                'nama_modul' => 'PPB-03',
                'judul_modul' => 'Berbagi Praktik Baik',
            ],
        ];

        foreach ($moduls as $modul) {

            $topik = DB::table('topik')
                ->where('nama_topik', $modul['topik'])
                ->first();

            if (!$topik) {
                $this->command->warn(
                    "Topik '{$modul['topik']}' tidak ditemukan."
                );

                continue;
            }

            DB::table('modul')->updateOrInsert(
                [
                    'topik_id' => $topik->id,
                    'nama_modul' => $modul['nama_modul'],
                ],
                [
                    'judul_modul' => $modul['judul_modul'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        $this->command->info('Modul berhasil dibuat.');
    }
}
