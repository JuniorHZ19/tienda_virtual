<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Producto;
use App\models\Venta;
use App\models\Categoria;
use App\models\Caracteristica;
use Illuminate\Support\Facades\Storage;

class Caractersiticas_producto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($producto_id){

        $caracteristicas_producto=Producto::find($producto_id)->caracteristicas;
  
        return view('caracteristicas_producto.index',compact('producto_id','caracteristicas_producto'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($producto_id)
    {   
        $caracteristicas_producto=Caracteristica::all();
    
        return view('caracteristicas_producto.create',compact('producto_id','caracteristicas_producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$producto_id)
    { 
          
    
         $producto =Producto::find($producto_id);
       
         $producto->caracteristicas()->attach($request->input('caracteristica_id'),["info"=>$request->input('info')]);
                          

         return redirect()->route("caracteristicas_producto.index",["producto_id"=>$producto_id]);

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
    public function edit($producto_id,$caracteristica_producto_id)
    {
       
        $caracteristica_producto=Producto::find($producto_id)->caracteristicas()->wherePivot('id',$caracteristica_producto_id)->first();
        $caracteristicas=Caracteristica::all();
       
        return view('caracteristicas_producto.edit',compact('producto_id','caracteristica_producto','caracteristicas','caracteristica_producto_id'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $producto_id,$caracteristica_producto_id)
    {


        $producto=Producto::find($producto_id);

        $producto->caracteristicas()->wherePivot('id', $caracteristica_producto_id)->update([
            'info' => $request->info,
             'caracteristicas_id'  =>$request->caracteristicas_id
        ]);

    

        return redirect(route("caracteristicas_producto.index",['producto_id'=> $producto_id]));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($producto_id,$caracteristica_producto_id)
    {


        Producto::find($producto_id)->caracteristicas()->wherePivot('id',$caracteristica_producto_id)->detach();

  
        return redirect(route("caracteristicas.index",['producto_id'=> $producto_id]));
    }

}
