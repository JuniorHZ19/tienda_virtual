<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\provedor;

class provedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provedores=provedor::all();

        return view('provedores.index',compact('provedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
         
        "nombre_empresa"=>"required|max:30|min:5|unique:provedores",
        "correo"=>"required|email|string|unique:provedores",
        "estado"=>"required",
        "descripcion"=>"required|max:4000|min:5|",
        "RUC"=>"required|numeric|digits:7",
        "telefono"=>"nullable|numeric|digits:7"    
       ],[
        "RUC.unique"=>"Ya esta registrado el RUC",
         "RUC.required"=>"Es obligatorio el RUC",
         "RUC.size"=>"Es necesario que el RUC tenga 7 digitos",
         "nombre_empresa.required"=>"Especificar el nombre de empresa",
         "correo.required"=>"Especificar correo",
         "correo.email"=>"Debe contener email adecuado",
         "descripcion.required"=>"Necesitamos saber un descripcion",
         "descripcion.min"=>"Debe contener almenos 10 caracteres la descripcion",
     
       ]);
         
        $provedor=new provedor();

       
        $provedor->RUC=$request->input("RUC");
        $provedor->nombre_empresa=$request->input("nombre_empresa");
        $provedor->correo=$request->input("correo");
        $provedor->estado=$request->input("estado");
        $provedor->descripcion=$request->input("descripcion");
        $provedor->telefono=$request->input("telefono");
        $provedor->save();
        return redirect(route("provedores.index"));
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
    public function edit($id)
    {
        $provedor=provedor::find($id);

        return view('provedores.edit',compact('provedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
        $provedor=provedor::find($id);

        $provedor->RUC=$request->input("RUC");
        $provedor->nombre_empresa=$request->input("nombre_empresa");
        $provedor->correo=$request->input("correo");
        $provedor->estado=$request->input("estado");
        $provedor->descripcion=$request->input("descripcion");
        $provedor->telefono=$request->input("telefono");
        $provedor->save();
        return redirect(route("provedores.index"));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        provedor::destroy($id);

        return redirect(route("provedores.index"));
    }
}
