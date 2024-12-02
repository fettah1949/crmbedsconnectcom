<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
         
        // dd($guard);
    //   dd(Auth::guard($guard)->check()) ;
        switch($guard)
        {
            
               

               case 'Client_seller01': 
                if(Auth::guard($guard)->check())
                {
                    return redirect('/login_auth_seller');
                }
                // dd($guard);
                
            
            default:
        if (Auth::guard($guard)->check()) {
            return redirect('/sales');
        }
        break;

      }
        return $next($request);
    }
}
