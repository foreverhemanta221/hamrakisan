<?php
namespace App\Http\Controllers\Api;
use App\Http\Requests\Api\User\RegisterRequest;
use App\Http\Resources\User\UserResource;
use App\User;
use App\UserToken;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers;
class UserController extends Controller
{
    public function register(RegisterRequest $request){
        if(checkEmailOrPhone($request->email)=="invalid"){
            return response()->json(['message'=>'invalid email or phone'],400);
        }
        if( $request->email!=null && User::where('email',$request->email)->count()>0){
            return response()->json(['message'=>'Email already taken'],400);
        }
        if($request->email!=null && User::where('phone_no',$request->email)->count()>0){
            return response()->json(['message'=>'Phone already taken'],400);
        }
        try{
            DB::transaction(function ()use($request){
                $create_user = new User();
                if(checkEmailOrPhone($request->email)=="email") $create_user->email  = $request->email;
                if(checkEmailOrPhone($request->email)=="phone") $create_user->phone_no  = $request->email;
                $create_user->password = bcrypt($request->password);
                $create_user->role = $request->role;
                $create_user->isVerified = 0 ;
                $create_user->save();
            });
        }catch (\PDOException $e){
            return response()->json(['message'=>$e->getMessage()],400);
        }
        return response()->json(['message'=>'Registered Successfully please check your email for verification'],200);
    }
    public function login(Request $request){
        $field = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone_no';
        if(Auth::attempt([$field => $request->input('login'), 'password' => $request->input('password')])){
            $token = bin2hex(openssl_random_pseudo_bytes(30));
            $expire_date = Carbon::now()->addMinute(30);
            //Delete expire token
            UserToken::where([
                ['user_id','=',Auth::user()->id],
                ['token_expire_at','<',Carbon::now()]
            ])->delete();
            //create new token
            DB::table('user_tokens')->insert([
                'user_id'=>Auth::user()->id,
                'api_token' =>$token,
                'token_expire_at'=>$expire_date
            ]);
          $user = new UserResource(Auth::user());
          return response()->json(['data'=>$user],200)
              ->header('x-app-token',$token)
              ->header('x-token-expires',Carbon::now()->diffInSeconds($expire_date))
              ->header('x-app-role',Auth::user()->role);
        }
        return response()->json(['message'=>'Logged in failed'],400);
    }
    public function logOut(Request $request){
        if(UserToken::where('api_token',$request->header('x-app-token'))->count()>0){
            UserToken::where('api_token',$request->header('x-app-token'))->delete();
            return response()->json(['message'=>'Logout Successfully'],200);
        }
    }
    public function updateProfile(Request $request){
        $user_id =   $this->getUserId($request->header('x-app-token'));
        try{
            DB::transaction(function ()use($request,$user_id){
              $user=  User::findOrFail($user_id);
              $user->name = $request->fullName;
              $user->province = $request->province;
              $user->district = $request->district;
              $user->city = $request->city;
              $user->specific_address = $request->specificAddress;
              $user->phone_no = $request->phone_no;
              if($request->fileToUpload!=null){
                  //delete old image
                  $user->image_id =Helpers::uploadApiImageToDb($request->fileToUpload);
              }
              $user->save();
            });
        }catch (\PDOException $e){
            return response()->json(['message'=>$e->getMessage()],400);
        }
        return response()->json(['message'=>'Your Profile has been updated successfully'],200);
    }
    public function userProfile(Request $request){
        $user_id =   $this->getUserId($request->header('x-app-token'));
        $user= User::findOrFail($user_id);
        return response()->json(['data'=>new UserResource($user)],200);
    }
    public function getUserId($token){
        $user_token = UserToken::where('api_token',$token)->first();
        if($user_token!=null){
            $user_id = $user_token->user_id;
            return $user_id;
        }
    }
}
