<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
// USE App\Http\Middleware\UsersMIddleware;

class UsersMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null ): Response
    {
        if(Auth::guard($guard)->check() && Auth::user()->role_id === 2){

            return $next($request);
        }

        return redirect('/');
    }

}
