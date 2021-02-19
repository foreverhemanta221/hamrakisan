<?php
namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function register(RegisterRequest $request)
    {

        if(checkEmailOrPhone($request->userId)=="invalid"){
            $request->session()->flash('danger', 'Invalid Email or Phone No');
            return redirect()->back();
        }
        if( $request->userId!=null && User::where('email',$request->userId)->count()>0){
            $request->session()->flash('danger', 'Email should be unique');
            return redirect()->back();
        }
        if($request->userId!=null && User::where('phone_no',$request->userId)->count()>0){
            $request->session()->flash('danger', 'Phone no should be unique');
            return redirect()->back();
        }
        try{
            DB::transaction(function ()use($request){
                $create_user = new User();
                if(checkEmailOrPhone($request->userId)=="email") $create_user->email  = $request->userId;
                if(checkEmailOrPhone($request->userId)=="phone") $create_user->phone_no  = $request->userId;
                $create_user->password = bcrypt($request->password);
                $create_user->role = $request->role;
                $create_user->isVerified = 0 ;
                $create_user->save();
            });
        }catch (\PDOException $e){
            return redirect()->back()->with('danger',$e->getMessage());
        }
        return redirect('login')->with('success','success! please login now');
    }
    public function login(Request $request){
        $field = filter_var($request->input('userId'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone_no';
        if(Auth::attempt([$field => $request->input('userId'), 'password' => $request->input('password')])){
            $role = Auth::user()->role;
            if($role=='farmer'){
                return redirect()->to('farmerdashboard')->with('success','Logged In successfully');
            }
            if ($role=='user'){
                return redirect()->to('userdashboard')->with('success','Logged In successfully');
            }
            abort(404);
        }
        return redirect()->back()->with('danger','Login credientials doesnot match');
    }
    public function logout(Request $request){
        if(Auth::check()==true){
            Auth::logout();
            return   redirect()->to('login')->with('success','Logout Successfull');
        }
    }
}
