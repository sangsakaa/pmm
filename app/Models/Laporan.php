<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $fillable = [
        'guru_id',
        'topik_id',
        'status_pemeriksaan',
        'catatan_pemeriksaan',
        'diperiksa_oleh',
        'diperiksa_at',
    ];

    protected $casts = [
        'diperiksa_at' => 'datetime',
    ];

    /**
     * Guru pemilik laporan
     */
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    /**
     * Topik laporan
     */
    public function topik()
    {
        return $this->belongsTo(Topik::class, 'topik_id');
    }

    /**
     * Detail modul laporan
     */
    public function daftarLaporan()
    {
        return $this->hasMany(Daftar_Laporan::class, 'laporan_id');
    }

    /**
     * User yang memeriksa laporan
     */
    public function pemeriksa()
    {
        return $this->belongsTo(User::class, 'diperiksa_oleh');
    }
}
