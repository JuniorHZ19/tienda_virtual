<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserControllerApi extends Controller
{
    

public function register(Request $request){
 
   $validador=Validator::make($request->all(),[
    "nombre_usuario"=>"required",
    "correo"=>"required",
    "password"=>"required",
    "cliente_id"=>"required",
    "rol_id"=>"required",
  
   ],
   [
    'nombre_usuario.required' => 'Ncesario poner campo nombre_usuario.',
    'correo.required' => 'necesario poner campo correo',
    'password.required' => 'necesario poner password.',
    'cliente_id.required' => 'necesario poner cliente_id.',
    'rol_id.required' => 'necesario poner rol_id'
   ]);
   
   
   if($validador->fails())

 {
  return response()->json(['error' => $validador->errors()], 404);
 }
 else{

  $usuario=new user();

  $usuario->nombre_usuario=$request->input("nombre_usuario");
  $usuario->correo=$request->input("correo");
  $usuario->password=Hash::make($request->input('password'));
  $usuario->cliente_id=$request->input("cliente_id");
  $usuario->rol_id=$request->input("rol_id");

  $usuario->save();

  return response()->json(['message'=>'Ah sido guardado correctamente',
                            'nuevo ussuario'=>$usuario],200);
 }
    }


 
 public function login(Request $request){

     $request->validate([
         
            "correo"=>"required|email",
            "password"=>"required",
        
           ],[
        
             "correo.required"=>"Especificar correo",
             "password.required"=>"Debe de espesificar el password",
      
           ]);
    
      $user=user::where('correo',$request->correo)->first();
     

      if($user  && Hash::check($request->password,$user->password))
      {
       
        $token =$user->createToken('auth_token')->plainTextToken;

       
        
        return response()->json([

            "msg"=>'Usuario logeado correctamente',
            "access_token"=>$token

        ]);
    
      }
    
      else{
       
        return response()->json([
 
            "msg"=>'Error validar credenciales',
             "usuario"=>$request->correo,
        ],404);
    
      }
            

    }

    public  function perfil(Request $request)
    {
       
        
        return response()->json(['usuario logeado' => $request->user()], 200);
    }



    public  function logout(Request $request)
    {

        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Sesión cerrada correctamente'], 200);
    }




}
