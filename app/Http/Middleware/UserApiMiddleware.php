<?php

namespace App\Http\Middleware;

use App\User;
use App\UserToken;
use Closure;

class UserApiMiddleware
{
    public function handle($request, Closure $next)
    {
        if(UserToken::where('api_token',$request->header('x-app-token'))->count()>0){
            if($this->checkRole($request->header('x-app-token'))=='user'){
                return $next($request);
            }
            return response()->json(['message'=>'Api Token not found'],401);
        }
        return response()->json(['message'=>'Api Token not found'],401);
    }
    public function checkRole($token){
        $user_id = UserToken::where('api_token',$token)->first()->user_id;
        return User::find($user_id)->role;
    }
}
