<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Venta;

class Envio extends Model
{
    use HasFactory;
    protected $primaryKey="cod_envio";
   
     public function venta()
     {
        
        return $this->belongsTo(Venta::class,"Venta_cod");
     }
}
