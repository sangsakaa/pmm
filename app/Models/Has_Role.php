<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Has_Role extends Model
{
    use HasFactory;
    protected $table = "model_has_roles";
    public $timestamps = false;
}
