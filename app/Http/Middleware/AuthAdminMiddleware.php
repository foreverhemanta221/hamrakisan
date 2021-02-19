<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AuthAdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if(Auth::user()){
            if(Auth::user()->role =="admin"){
                return $next($request);
            }
            return redirect()->route('userlogin');
        }
        return redirect()->route('userlogin');
    }
}
