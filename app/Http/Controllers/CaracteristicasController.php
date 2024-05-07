<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Producto;
use App\models\Venta;
use App\models\Categoria;
use App\models\Caracteristica;
use Illuminate\Support\Facades\Storage;

class CaracteristicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $caracteristicas=Caracteristica::all();

        return view('caracteristicas.index',compact('caracteristicas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
   
    
        return view('caracteristicas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
          
    
        $caracteristica=new Caracteristica();

        $caracteristica->nombre=$request->input("nombre");

        $caracteristica->descripcion=$request->input("descripcion");

        $caracteristica->save();
      
        return redirect(route("caracteristicas.index"));

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
    public function edit($caracteristicas_id)
    {
       
        $caracteristica=Caracteristica::find($caracteristicas_id);
       
    
       
        return view('caracteristicas.edit',compact('caracteristica'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $caracteristica_id)
    {


        $caracteristica=Caracteristica::find($caracteristica_id);

        $caracteristica->nombre=$request->input("nombre");

        $caracteristica->descripcion=$request->input("descripcion");

        $caracteristica->save();

    

        return redirect(route("caracteristicas.index"));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($caracteristica_id)
    {


        Caracteristica::destroy($caracteristica_id);

  
        return redirect(route("caracteristicas.index"));
    }

}
