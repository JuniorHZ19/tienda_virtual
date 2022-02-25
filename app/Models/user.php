<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\rol;
use  App\Models\cliente;

class user extends Model
{
    use HasFactory;

    public function rol()
     {

        return $this->belongsTo(rol::class,"rol_id");
     }

     public function cliente()
     {

        return $this->belongsTo(cliente::class,"cliente_id");
     }
}
