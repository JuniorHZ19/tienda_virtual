<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Producto;
class Imagen_producto extends Model
{
    use HasFactory;
    
    protected $table="imagenes_producto";


    public function producto(){

    
        return $this->belongsTo(Producto::class,'producto_id');
                                
    }
    
}
