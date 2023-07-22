<?php

namespace App\Models;

use App\Models\Modul;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Daftar_Laporan extends Model
{
    use HasFactory;
    protected $table = "daftar_laporan";
    public function Laporan()
    {
        return $this->hasMany(Modul::class, 'id',  'modul_id',);
    }
}
