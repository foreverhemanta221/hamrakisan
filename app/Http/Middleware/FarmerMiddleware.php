<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class FarmerMiddleware
{
    public function handle($request, Closure $next)
    {
        if(Auth::check()==true && Auth::user()->role=="farmer"){
            return $next($request);
        }
        return redirect()->to('login')->with('message','Login your Account First');
    }
}
