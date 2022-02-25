<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\rol;

class user extends Model
{
    use HasFactory;

    public function rol()
     {

        return $this->belongsTo(rol::class,'rol_id');
     }
}
