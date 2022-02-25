<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\cliente;
class telefono_cliente extends Model
{
    use HasFactory;

    public function cliente(){

        return $this->belongsTo(cliente::class,'cliente_id');
                                
    }
}
