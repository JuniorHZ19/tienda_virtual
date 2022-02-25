<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Provedor; 

class Controllercliente extends Controller
{

    public function index(){
        
        
    
    
       $producto=Provedor::find(1)->productos;

       echo  $producto;
      
       } 
      
      

      
 
}
