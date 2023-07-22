<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $table = "laporan";
    public function Laporan()
    {
        return $this->hasMany(Daftar_Laporan::class,  'laporan_id', 'id');
    }
    public function Topik()
    {
        return $this->hasMany(Modul::class, 'id',  'topik_id');
    }
}
