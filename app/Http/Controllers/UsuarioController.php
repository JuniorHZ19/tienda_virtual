<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Producto;
use App\models\Venta;
use App\models\user;
use App\models\Rol;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cliente_id){

        $usuarios=user::all();

 
        return view('usuarios.index',compact('usuarios','cliente_id'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cliente_id)
    {   
        $roles=Rol::all();
        return view('usuarios.create',compact('cliente_id','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$cliente_id)
    { 
          
    
        $usuario =new user();
        $usuario->nombre_usuario=$request->nombre_usuario;
        $usuario->password=Hash::make($request->input('password'));
        $usuario->correo=$request->correo;
        $usuario->rol_id=$request->rol_id;
        $usuario->cliente_id=$cliente_id;
   

        $filename=time().'.'.$request->file('foto')->extension();
        $request->file('foto')->storeAs("/public/usuarios/".$cliente_id, $filename);
        $usuario->foto="storage/usuarios/".$cliente_id."/".$filename;

        $usuario->save();

         return redirect()->route("usuarios.index",["cliente_id"=>$cliente_id]);

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
    public function edit($cliente_id,$usuario_id)
    {
        $roles=Rol::all();
        $usuario=user::find($usuario_id);
       
       
        return view('usuarios.edit',compact('usuario','usuario_id','cliente_id','roles'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cliente_id,$usuario_id)
    {
        $usuario=user::find($usuario_id);
  
        $usuario->nombre_usuario=$request->nombre_usuario;
        $usuario->password=Hash::make($request->input('password'));
        $usuario->correo=$request->correo;
        $usuario->rol_id=$request->rol_id;

     if($request->hasFile('foto'))
        {
          //eleiminar archivo :
          
          $fileToDelete = public_path($usuario->foto);
     if(Storage::exists($fileToDelete))
         { unlink($fileToDelete);}
  
          //rempelzar en la bd
  
  
          $filename=time().'.'.$request->file('foto')->extension();
          $request->file('foto')->storeAs("/public/usuarios/".$cliente_id, $filename);
          $usuario->foto="storage/usuarios/".$cliente_id."/".$filename;
  

      }


        $usuario->save();

         return redirect()->route("usuarios.index",["cliente_id"=>$cliente_id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cliente_id,$usuario_id)
    {


          
           user::destroy($usuario_id);
       
    
          return redirect(route("usuarios.index",['cliente_id'=> $cliente_id]));

    }

}
