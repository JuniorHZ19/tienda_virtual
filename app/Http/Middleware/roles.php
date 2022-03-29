<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class roles
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

        $user=Session::get('user');
        
        print_r($roles);

     foreach($roles as $rol)
      {  
        if($user->rol->nombre==$rol)
        {
            
            return $next($request);

        }

        }
        return redirect()->route("home");
       
    }
}
