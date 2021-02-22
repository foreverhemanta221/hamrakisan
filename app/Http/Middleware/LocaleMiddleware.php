<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        dd(Session::has('locale'));
        if(!Session::has('locale')|| Session::get('locale')=='en'){
            App::setLocale('en');
        }else{
            App::setLocale('nep');
        }
        return $next($request);
    }

}
