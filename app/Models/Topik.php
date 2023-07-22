<?php

namespace App\Models;

use App\Models\Laporan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topik extends Model
{
    use HasFactory;
    protected $table = "topik";
    public function Topik()
    {
        return $this->hasMany(Laporan::class,  'topik_id', 'id');
    }
}
