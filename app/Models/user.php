<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\rol;
use  App\Models\cliente;
use  App\Models\Perfil;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasFactory,HasApiTokens;

    protected $table="users";
    protected $fillable = [
      
      'correo',
      'password',
  ];


  protected $hidden = [
   'password',

];



    public function rol()
     {

        return $this->belongsTo(rol::class,"rol_id");
     }

     public function cliente()
     {

        return $this->belongsTo(cliente::class,"cliente_id");
     }
}
