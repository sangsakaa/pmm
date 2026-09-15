<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar_Laporan extends Model
{
    use HasFactory;

    protected $table = 'daftar_laporan';

    protected $fillable = [
        'laporan_id',
        'modul_id',
        'keterangan',
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'laporan_id');
    }

    public function modul()
    {
        return $this->belongsTo(Modul::class, 'modul_id');
    }
}
