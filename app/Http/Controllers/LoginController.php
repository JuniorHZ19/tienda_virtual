<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\models\user;


class LoginController extends Controller
{

  public function index(){
      
    $user=Session::get('user');

     if($user ){

      return redirect()->route('home');

    }
    else{
      return view('login');
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

    Session::put('user', $user);
   

    return redirect()->route("home");

  }

  else{
    Session::flash('mensaje',"El usuario y/o contraseña no son correctos");

    return redirect()->route("login.index");
  }
        

}


  public function registerShow(){

    $user=Session::get('user');

    if($user ){

     return redirect()->route('home');

   }
   else{
     return view('register');
   }



  }

   public function register(Request $request){

     if($request->password ==$request->password2)
     {
       $usuario=new user();

       $usuario->nombre_usuario=$request->nombre_usuario;
       $usuario->correo=$request->correo;
       $usuario->password=Hash::make($request->input('password'));
       $usuario->rol_id=3;
       $usuario->cliente_id=1;

       $usuario->save();

       Session::put('user', $usuario);
       return redirect()->route("categorias.index");
      }

    else{
      
      Session::flash('mensaje',"Compruebe que la contraseña sea la misma");
      return redirect()->route("login.register");

    }


   }


   public function logout(){

   Session::forget('user');
  
   return redirect()->route('login.index');

  }


  public function home(){
         
    return view('home');

  }

}
