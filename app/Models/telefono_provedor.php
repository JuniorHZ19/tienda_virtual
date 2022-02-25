<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provedor;

class telefono_provedor extends Model
{
    use HasFactory;

    public function provedor(){

        return $this->belongsTo(Provedor::class,'provedor_id');
                                
    }
}
