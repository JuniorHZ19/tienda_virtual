<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Producto;
use App\models\Imagen_producto;

use Illuminate\Support\Facades\Storage;

class ImagenProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_producto){

        $imagenes_producto=Imagen_producto::where('producto_id',$id_producto)->get();

        //$producto = Producto::find($id_producto);
        //$imagenes=$producto->imagenes;

        return view('imagenes_producto.index',compact('imagenes_producto','id_producto'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_producto)
    {   
       
        return view('imagenes_producto.create',compact('id_producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id_producto)
    { 
          
        

         $imagen_producto =new Imagen_producto();

    
        $filename=time().'.'.$request->file('imagen')->extension();

        $request->file('imagen')->storeAs("/public/imagenes/".$id_producto, $filename);

        $imagen_producto->imagen="storage/imagenes/".$id_producto."/".$filename;

        $imagen_producto->producto_id=$id_producto;

        $imagen_producto->save();

        ;
         return redirect()->route("imagenes_producto.index",["id_producto"=>$id_producto]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_producto,$id_imagen_producto)
    {
       
        $imagen_producto=Imagen_producto::where('id',$id_imagen_producto)->where('producto_id',$id_producto)->first();
       
        return view('imagenes_producto.edit',compact('imagen_producto','id_producto'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_producto,$id_imagen_producto)
    {
        $imagen_producto=Imagen_producto::where('id',$id_imagen_producto)->where('producto_id',$id_producto)->first();


      if($request->hasFile('imagen'))
      {
        //eleiminar archivo :
        $fileToDelete = public_path($imagen_producto->imagen);

        unlink($fileToDelete);

        //rempelzar en la bd

        $filename=time().'.'.$request->file('imagen')->extension();

        $request->file('imagen')->storeAs("/public/imagenes/".$id_producto, $filename);

        $imagen_producto->imagen="storage/imagenes/".$id_producto."/".$filename;


        $imagen_producto->save();
    }

        return redirect(route("imagenes_producto.index",['id_producto'=> $id_producto]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_producto,$id_imagen_producto)
    {

        
        $imagen_producto=Imagen_producto::where('id',$id_imagen_producto)->where('producto_id',$id_producto)->first();
          
          //eleiminar archivo :

          $fileToDelete = public_path($imagen_producto->imagen);
  
          unlink($fileToDelete);
  
        
         //eliminar registro en la bd
            
          Imagen_producto::destroy($id_imagen_producto);
       
          
        

  
          return redirect(route("imagenes_producto.index",['id_producto'=> $id_producto]));

    }

}
