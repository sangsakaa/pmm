<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('laporan', function (Blueprint $table) {
            $table->string('status_pemeriksaan')
                ->default('belum diperiksa')
                ->after('topik_id');

            $table->text('catatan_pemeriksaan')
                ->nullable()
                ->after('status_pemeriksaan');

            $table->unsignedBigInteger('diperiksa_oleh')
                ->nullable()
                ->after('catatan_pemeriksaan');

            $table->timestamp('diperiksa_at')
                ->nullable()
                ->after('diperiksa_oleh');
        });
    }

    public function down(): void
    {
        Schema::table('laporan', function (Blueprint $table) {
            $table->dropColumn([
                'status_pemeriksaan',
                'catatan_pemeriksaan',
                'diperiksa_oleh',
                'diperiksa_at',
            ]);
        });
    }
};
