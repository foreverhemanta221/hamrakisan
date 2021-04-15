<?php
namespace App\Http\Controllers\Frontend;
use App\User;
use Throwable;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\MailToRegisteredUser;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Frontend\RegisterRequest;

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
                $create_user->email_verification_token=Str::random(32);
                $create_user->save();
                if($create_user->email!=null){
                    Mail::to($create_user->email)->send(new MailToRegisteredUser($create_user));
                    Mail::to('bindas.prem.75@gmail.com')->send(new MailToRegisteredUser($create_user) );
                    session()->flash('message',' Verification Email Has been sent to your email. Verify your email and log in .');
                }
            });
        }catch (\PDOException $e){
            return redirect()->back()->with('danger',$e->getMessage());
        }catch(Throwable $th){
            return redirect()->back()->with('danger',$th->getMessage());
        }
        return redirect('login');
    }
    public function login(Request $request){
        $field = filter_var($request->input('userId'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone_no';

        if(Auth::attempt([$field => $request->input('userId'), 'password' => $request->input('password')])){
            $role = Auth::user()->role;
            if(Auth::user()->isVerified){
            
            if($role=='farmer'){
                return redirect()->to('farmerdashboard')->with('success','Logged In successfully');
            }
            if ($role=='user'){
                return redirect()->to('userdashboard')->with('success','Logged In successfully');
            }

            }else{
                Auth::logout();
                return redirect()->back()->with('danger','Your Account is not verified yet !!!');
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
