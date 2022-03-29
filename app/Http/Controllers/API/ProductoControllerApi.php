<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
class ProductoControllerApi extends Controller
{
    //

    public function index(){
      
      $productos=Producto::all();


      return response()->json([
       'sucess'=>true,
       'message'=>'Lista de productos obtenida correctamente',
       'data'=>$productos

      ]);

    }

    
public function show($id){

    try{

      $producto=Producto::findOrFail($id);
      return response()->json([
       'sucess'=>true,
       'message'=>'Producto espesifico',
       'data'=>$producto

      ]);

  } catch (ModelNotFoundException $exception) {

    return response()->json(['error' => 'Elemento no encontrado'], 404);
}
    }




 public function store(Request $request){

 $validador=Validator::make($request->all(),[
  "precio"=>"required",
  "stock"=>"required",
  "nombre"=>"required",
  "categoria_id"=>"required",
  "descripcion"=>"required",

 ],
 [
  'precio.required' => 'El campo precio es requerido.',
  'stock.required' => 'El campo stock es requerido.',
  'nombre.required' => 'El campo nombre es requerido.',
  'categoria_id.required' => 'El campo categoria id es requerido.',
  'descripcion.required' => 'El campo descripcion es requerido',
]);


 if($validador->fails())

 {
  return response()->json(['error' => $validador->errors()], 404);
 }
 else{

  $producto=new Producto();

  $producto->precio=$request->input("precio");
  $producto->stock=$request->input("stock");
  $producto->nombre=$request->input("nombre");
  $producto->categoria_id=$request->input("categoria_id");
  $producto->descripcion=$request->input("descripcion");
 
  $producto->save();

  return response()->json(['message'=>'Ah sido guardado correctamente',
                            'nuevo_producto'=>$producto],201);
 }

    }


    
 public function update(Request $request,$id){
      
      try{


       $producto=Producto::findOrFail($id);

       if ($request->filled("precio")) {
        $producto->precio=$request->input("precio");
      }

      if ($request->filled("stock")) {
        $producto->stock=$request->input("stock");
      }

      if ($request->filled("nombre")) {
        $producto->nombre=$request->input("nombre");
      }
      if ($request->filled("categoria_id")) {
        $producto->categoria_id=$request->input("categoria_id");
      }
      
      if ($request->filled("descripcion")) {

        $producto->descripcion=$request->input("descripcion");
      }
        $producto->save();
      
        return response()->json(['message'=>'Ah sido modificado correctamente',
                                  'producto'=>$producto],201);
       
       }
       catch  (ModelNotFoundException $exception) {
      
    
        return response()->json(['error' => "No se pudo"], 404);
        
       }

    }

    
    public function destroy($id){

      try{

        $producto=Producto::findOrFail($id);

        $producto->delete();

        return response()->json([
         'sucess'=>true,
         'message'=>'Producto eliminado correcamtente',
  
        ]);
  
    } catch (ModelNotFoundException $exception) {
  
      return response()->json(['error' => 'No se pudo encontrar el producto a eliminar'], 404);
  }

    }

  
}
