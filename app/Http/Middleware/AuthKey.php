<?php

namespace App\Http\Middleware;

use App\User;
use App\UserToken;
use Closure;

class AuthKey
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
        $token = $request->header('x-app-token');
       $check_token_exist =   UserToken::where('api_token',$token)->count();

       if($check_token_exist ==0){
           return response()->json(['message'=>'Api Token not found','token_status'=>false],401);
       }
        return $next($request);
    }
}
