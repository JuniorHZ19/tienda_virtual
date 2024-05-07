<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Producto;

class Caracteristica extends Model
{
    use HasFactory;

    public function productos(){

        return $this->belongsToMany(Producto::class,'productos_caracteristicas','producto_id','caracteristicas_id')
                                 ->withTimestamps()
                                 ->withPivot(['id','info','producto_id','caracteristicas_id']);
      }
}
