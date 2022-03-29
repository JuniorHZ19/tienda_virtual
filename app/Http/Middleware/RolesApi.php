<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RolesApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,...$roles)

    {

      
     foreach($roles as $rol)
      {  
        if($request->user()->rol->nombre==$rol)
        {
            
            return $next($request);

        }

        }
        return response()->json(["message"=>"No tiene la  autorisacion necesaria para acceder a este contenido"],404);
       
    }
}
