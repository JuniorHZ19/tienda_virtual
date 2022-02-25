<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Producto;

class provedor extends Model
{
    use HasFactory;

    protected $table="provedores";

    public function productos(){

      return $this->belongsToMany(Producto::class,'suministros','provedor_id','producto_id')
                               ->withTimestamps()
                               ->withPivot(['fecha_suministro','cantidad','precio_unitario','estado','created_at','updated_at']);
    }

}
