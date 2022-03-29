<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Producto;
use App\models\provedor;
use App\models\Categoria;

use Illuminate\Support\Facades\Storage;

class SuministroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($provedor_id){

        $suministros=provedor::find($provedor_id)->productos;

        //$producto = Producto::find($id_producto);
        //$imagenes=$producto->imagenes;

        return view('suministros.index',compact('suministros','provedor_id'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($provedor_id)
    {   
         $categorias=Categoria::all();

        return view('suministros.create',compact('provedor_id','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$provedor_id)
    { 
          
         $provedor =provedor::find($provedor_id);

         $provedor->productos()->attach($request->input('producto_id'),["precio_unitario"=>$request->input('precio_unitario'),
                                                                     "fecha_suministro"=>$request->input('fecha_suministro'),
                                                                     "cantidad"=>$request->input('cantidad'),
                                                                     "estado"=>$request->input('estado'),
              ]);
                          

         return redirect()->route("suministros.index",["provedor_id"=>$provedor_id]);

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
    public function edit($provedor_id,$suministro_id)
    {
       
        $suministro=provedor::find($provedor_id)->productos()->wherePivot('id',$suministro_id)->first();
     
        $categorias=Categoria::all();
       
        return view('suministros.edit',compact('suministro','suministro_id','categorias','provedor_id'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $provedor_id,$suministro_id)
    {
     
        $provedor=provedor::find($provedor_id);

           
        $provedor->productos()->wherePivot('id', $suministro_id)->update([
                      'producto_id' => $request->producto_id,
                       'fecha_suministro' => $request->fecha_suministro,
                       'cantidad' => $request->cantidad,
                       'precio_unitario' => $request->precio_unitario,
                        'estado' => $request->estado
           ]);

 
        return redirect(route("suministros.index",['provedor_id'=> $provedor_id]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($provedor_id,$suministro_id)
    {

         
         provedor::find($provedor_id)->productos()->wherePivot('id',$suministro_id)->detach();

  
          return redirect(route("suministros.index",['provedor_id'=> $provedor_id]));

    }

}
