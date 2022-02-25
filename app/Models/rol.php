<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\user;

class rol extends Model
{
    use HasFactory;

    protected $table = 'roles';

     public function users()
     {

        return $this->hasOne(user::class);
     }
   

}
