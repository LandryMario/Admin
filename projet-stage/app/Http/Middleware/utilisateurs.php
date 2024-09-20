<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class utilisateurs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //vérifie si l'utilisateur est authentifié et actif 
        if(auth::check()&& auth::Utilisateurs()->status==0){
            return redirect('auth.login');
        }
        return $next($request);
    }
}
