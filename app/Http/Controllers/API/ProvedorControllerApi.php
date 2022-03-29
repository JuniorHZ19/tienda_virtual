<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Provedor;
class ProvedorControllerApi extends Controller
{
    public function index(){
      
        $provedores=Provedor::with(['productos'=> function($query){$query->withPivot('cantidad','fecha_suministro');}])->get();
   

        return response()->json([
         'sucess'=>true,
         'message'=>'Lista de provedores obtenida correctamente',
         'data'=>$provedores

  
        ]);
  
      }
  
}
