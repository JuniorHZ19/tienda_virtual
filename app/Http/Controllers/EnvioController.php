<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Producto;
use App\models\Venta;
use App\models\Categoria;
use App\Models\Envio;
use Illuminate\Support\Facades\Storage;

class EnvioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cliente_id,$venta_cod){

        $envios=Venta::find($venta_cod)->envios;

        return view('envios.index',compact('envios','venta_cod','cliente_id'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cliente_id,$venta_cod)
    {   

    
        return view('envios.create',compact('cliente_id','venta_cod'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$cliente_id,$venta_cod)
    { 
          
            $envio=new Envio();

            $envio->estado_envio=$request->estado_envio;
            $envio->fecha_envio=$request->fecha_envio;
            
            if($request->fecha_entrega!= null)
            {
            $envio->fecha_entrega=$request->fecha_entrega;
            }
             $envio->venta_cod=$venta_cod;
            
            $envio->save();
    

         return redirect()->route("envios.index",["cliente_id"=>$cliente_id,"venta_cod"=>$venta_cod]);

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
    public function edit($cliente_id,$venta_cod,$cod_envio)
    {
       
        $envio=Envio::find($cod_envio);
       
        return view('envios.edit',compact('envio','cliente_id','venta_cod','cod_envio'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cliente_id,$venta_cod,$cod_envio)
    {


        $envio=Envio::find($cod_envio);

        $envio->estado_envio=$request->estado_envio;
        $envio->fecha_envio=$request->fecha_envio;
        
        if($request->fecha_entrega!= null)
        {
        $envio->fecha_entrega=$request->fecha_entrega;
        }
         $envio->venta_cod=$venta_cod;
        
        $envio->save();  
    

        return redirect(route("envios.index",['cliente_id'=> $cliente_id,'venta_cod'=>$venta_cod]));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cliente_id,$venta_cod,$cod_envio)
    {

        $envio=Envio::destroy($cod_envio);

  
        return redirect(route("envios.index",['cliente_id'=> $cliente_id,'venta_cod'=>$venta_cod]));
    }

}
