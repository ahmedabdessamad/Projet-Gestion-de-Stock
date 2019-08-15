<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Alert;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
        if(!Auth::guard($guard)->check()) {
            Alert::warning('Attention', 'Vous n\'êtes pas connecté!')->persistent('Fermer');
            return redirect()->route('showAdminLogin');
        }
        if(checkAdministratorRole(Auth::user())){
            return $next($request);
        }
        else{
            Alert::warning('Attention', 'Vous ne pouvez pas accéder à cette partie du site!')->persistent('Fermer');
            return redirect()->back();
        }
    }
}
