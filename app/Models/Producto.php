<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Provedor;
class producto extends Model
{
    use HasFactory;

    public function provedores(){

        return $this->belongsToMany(Provedor::class,'suministros','provedor_id','producto_id')
                                   ->withTimestamps()
                                   ->withPivot(['fecha_suministro','cantidad','precio_unitario','estado','created_at','updated_at']);
     
    }
}
