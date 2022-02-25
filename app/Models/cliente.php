<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\user;
use  App\Models\telefono_cliente;
use  App\Models\Venta;

class cliente extends Model
{
    use HasFactory;

    public function usuarios(){
         
        return $this->hasMany(user::class);
    }

    public function telefonos(){
         
        return $this->hasMany(telefono_cliente::class);

    }

    public function ventas(){
         
        return $this->hasMany(Venta::class);

    }
}
