<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Provedor;
use  App\Models\Categoria;
use  App\Models\Venta;
use  App\Models\Imagen_producto;
use  App\Models\Caracteristica;
class producto extends Model
{
    use HasFactory;

    public function provedores(){

        return $this->belongsToMany(Provedor::class,'suministros','provedor_id','producto_id')
                                   ->withTimestamps()
                                   ->withPivot(['fecha_suministro','cantidad','precio_unitario','estado','created_at','updated_at']);
     
    }

    public function categoria(){

        return $this->belongsTo(Categoria::class,'categoria_id');
                                
    }

    public function ventas(){

        return $this->belongsToMany(Venta::class,'detalles_venta','venta_cod','producto_id')
        ->withTimestamps()
        ->withPivot(['id','cantidad','precio_unitario','impuestos']);

    }

    public function caracteristicas(){

        return $this->belongsToMany(Caracteristica::class,'productos_caracteristicas','producto_id','caracteristicas_id')
        ->withTimestamps()
        ->withPivot(['id','info','producto_id','caracteristicas_id']);

    }


    public function imagenes(){

        return $this->hasMany(Imagen_producto::class);
    }

    
}
