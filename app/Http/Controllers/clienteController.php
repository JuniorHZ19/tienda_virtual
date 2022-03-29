<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\cliente;
class clienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=cliente::all();
     
        return view('clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente=new cliente();

       
        $cliente->documento=$request->input("documento");
        $cliente->nombres=$request->input("nombres");
        $cliente->apellidos=$request->input("apellidos");
        $cliente->direccion=$request->input("direccion");
        $cliente->fecha_nacimiento=$request->input("fecha_nacimiento");

        $cliente->save();
        return redirect(route("clientes.index"));
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
        $cliente=cliente::find($id);

        return view('clientes.edit',compact('cliente'));
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
        $cliente=cliente::find($id);

        $cliente->documento=$request->input("documento");
        $cliente->nombres=$request->input("nombres");
        $cliente->apellidos=$request->input("apellidos");
        $cliente->direccion=$request->input("direccion");
        $cliente->fecha_nacimiento=$request->input("fecha_nacimiento");

        $cliente->save();
        return redirect(route("clientes.index"));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        cliente::destroy($id);

        return redirect(route("clientes.index"));
    }
}
