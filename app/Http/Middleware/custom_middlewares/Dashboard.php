<?php

namespace App\Http\Middleware\custom_middlewares;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Dashboard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

            if(!auth()->user() || (auth()->user()->User_Type!="admin" && auth()->user()->User_Type!="moderator") )
            {
            return redirect('/');
            }
        return $next($request);
    }
}
