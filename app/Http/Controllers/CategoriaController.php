<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\Categoria;

use App\Models\producto;
use Illuminate\Support\Facades\Session;
class CategoriaController extends Controller
{
    public function index(){

        $categorias=Categoria::all();
        $user=Session::get('user');
      
        return view('categorias.index',compact('categorias'));
    }


    public function create(){
     
     return view('categorias.create');

    }

    public function store(Request $request){

        $categoria=new Categoria();

        $categoria->nombre=$request->input("nombre");

        $categoria->descripcion=$request->input("descripcion");

        $categoria->save();
      
        return redirect(route("categorias.index"));

    }

    public function edit($id){
      
     $categoria=Categoria::find($id);
     
     return view('categorias.edit',compact('categoria'));

    }


    public function update(Request $request,$id){


        
     
        $categoria=Categoria::find($id);

        $categoria->nombre=$request->input("nombre");

        $categoria->descripcion=$request->input("descripcion");

        $categoria->save();

        return redirect(route("categorias.index"));
    }

    public function destroy($id){

        Categoria::destroy($id);

        return redirect(route("categorias.index"));
    }



    public function getProductos($id_categoria){
      
        $productos=Categoria::find($id_categoria)->productos;

        return  response()->json($productos);
        
    }

}
