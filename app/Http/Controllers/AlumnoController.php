<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    
       public function index(){
        
        return view('inicio');
       } 
   
   
   
       public function CompraView(){

       return view('Compra');

       }


       public function VentaView(){
        
        return view('Venta');
     
       }
}
