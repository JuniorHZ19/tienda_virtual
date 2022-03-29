<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Producto;
use App\models\Venta;
use App\models\Categoria;

use Illuminate\Support\Facades\Storage;

class DetalleVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cliente_id,$venta_cod){

        $detalles_venta=Venta::find($venta_cod)->productos;

        return view('detalles_venta.index',compact('detalles_venta','venta_cod','cliente_id'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cliente_id,$venta_cod)
    {   
        $categorias=Categoria::all();
    
        return view('detalles_venta.create',compact('categorias','cliente_id','venta_cod'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$cliente_id,$venta_cod)
    { 
          
    
         $venta =Venta::find($venta_cod);
         echo $venta;
         $venta->productos()->attach($request->input('producto_id'),["precio_unitario"=>$request->input('precio_unitario'),
                                                                     "cantidad"=>$request->input('cantidad'),
                                                                     "impuestos"=>$request->input('impuestos'),
              ]);
                          

         return redirect()->route("detalles_venta.index",["cliente_id"=>$cliente_id,"venta_cod"=>$venta_cod]);

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
    public function edit($cliente_id,$venta_cod,$detalles_venta_id)
    {
       
        $detalle_venta=Venta::find($venta_cod)->productos()->wherePivot('id',$detalles_venta_id)->first();
       
        $categorias=Categoria::all();
       
        return view('detalles_venta.edit',compact('categorias','detalle_venta','cliente_id','venta_cod','detalles_venta_id'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cliente_id,$venta_cod,$detalles_venta_id)
    {


        $venta=Venta::find($venta_cod);

        $venta->productos()->wherePivot('id', $detalles_venta_id)->update([
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $request->precio_unitario,
            'impuestos' => $request->impuestos,
        ]);

    

        return redirect(route("detalles_venta.index",['cliente_id'=> $cliente_id,'venta_cod'=>$venta_cod]));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cliente_id,$venta_cod,$detalles_venta_id)
    {


        Venta::find($venta_cod)->productos()->wherePivot('id',$detalles_venta_id)->detach();

  
        return redirect(route("detalles_venta.index",['cliente_id'=> $cliente_id,'venta_cod'=>$venta_cod]));
    }

}
