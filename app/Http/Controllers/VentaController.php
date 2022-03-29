<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Producto;
use App\models\Venta;

use Illuminate\Support\Facades\Storage;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cliente_id){

        $ventas=Venta::where('cliente_id',$cliente_id)->get();


        return view('ventas.index',compact('ventas','cliente_id'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cliente_id)
    {   
       
        return view('ventas.create',compact('cliente_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$cliente_id)
    { 
          
    
        $venta =new Venta();
        $venta->cliente_id=$cliente_id;
        $venta->estado_pago=$request->estado_pago;
        $venta->descuento=$request->descuento;

        $venta->save();

         return redirect()->route("ventas.index",["cliente_id"=>$cliente_id]);

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
    public function edit($cliente_id,$venta_id)
    {
       
        $venta=Venta::where('cliente_id',$cliente_id)->where('cod',$venta_id)->first();
       
        return view('ventas.edit',compact('venta','venta_id','cliente_id'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cliente_id,$venta_cod)
    {
        $venta=Venta::where('cliente_id',$cliente_id)->where('cod',$venta_cod)->first();
        echo $venta;
        $venta->estado_pago=$request->input("estado_pago");

        $venta->descuento=$request->input("descuento");

        $venta->save();

        return redirect(route("ventas.index",['cliente_id'=>$cliente_id]));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cliente_id,$venta_cod)
    {


          
        Venta::destroy($venta_cod);
       
    
          return redirect(route("ventas.index",['cliente_id'=> $cliente_id]));

    }

}
