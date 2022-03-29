<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Producto;
use App\models\Categoria;
use App\models\Provedor;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       

        $productos=Producto::all();

        return view('productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categorias=Categoria::all();


        return view('productos.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         


        $producto=new Producto();
       
        $producto->precio=$request->input("precio");
        $producto->stock=$request->input("stock");
        $producto->nombre=$request->input("nombre");
        $producto->descripcion=$request->input("descripcion");
        $producto->categoria_id=$request->input("categoria_id");
        $producto->save();
        return redirect(route("productos.index"));
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
        $producto=Producto::find($id);
        $categorias=Categoria::all();
        return view('productos.edit',compact('producto','categorias'));
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
        $producto=Producto::find($id);

        $producto->precio=$request->input("precio");
        $producto->stock=$request->input("stock");
        $producto->nombre=$request->input("nombre");
        $producto->descripcion=$request->input("descripcion");
        $producto->categoria_id=$request->input("categoria_id");
        $producto->save();
        return redirect(route("productos.index"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::destroy($id);

        return redirect(route("productos.index"));
    }
}
