<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

class FarmerMiddleware
{
    public function handle($request, Closure $next)
    {
         if($request->ajax()){
             if(Auth::check()!=true){
                 session()->flash('danger','login Your Account First');
                return redirect()->to('login')->with('message','Login your Account First');
             }
         }else{
             if(Auth::check()==true && Auth::user()->role=="farmer"){
                 return $next($request);
             }
             return redirect()->to('login')->with('message','Login your Account First');
         }
         abort(404);
    }
}
