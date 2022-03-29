<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\cliente;
use  App\Models\Producto;
use  App\Models\Envio;
class Venta extends Model
{
    use HasFactory;

    protected $primaryKey = 'cod';

    public function envios(){
         
        return $this->hasMany(Envio::class);

    }

    public function productos(){

        return $this->belongsToMany(Producto::class,'detalles_venta','venta_cod','producto_id')
                                 ->withTimestamps()
                                 ->withPivot(['id','cantidad','precio_unitario','impuestos']);
      }
  

    public function cliente()
    {

       return $this->belongsTo(cliente::class,"cliente_id");
    }


}
