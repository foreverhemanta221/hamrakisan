<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Throwable;

class VerifyController extends Controller
{
  public function VerifyEmail($token = null)
    {
    	if($token == null) {

    		session()->flash('danger', 'Invalid Login attempt');

    		return redirect()->route('login');

    	}

       $user = User::where('email_verification_token',$token)->first();

       if($user == null ){

       	session()->flash('danger', 'Invalid Login attempt');

        return redirect()->route('login');

       }

       $user->update([
        
        'email_verified' => 1,
        'email_verified_at' => Carbon::now(),
        'email_verification_token' => ''

       ]);
       
       	session()->flash('message', 'Your account is activated, you can log in now');

        return redirect()->route('userlogin');

    }

  // public function VerifyEmailResend()
  // {
  //   try{
  //     $user =Auth::user();
  //       if($user == null ){
  //         if($user->email){
  //           // Mail::to($create_user->email)->send(new MailToRegisteredUser($create_user));
  //           Mail::to('bindas.prem.75@gmail.com')->send(new MailToRegisteredUser($user) );
  //           session()->flash('message', 'Verification email is sent!! Please go to you mail and verify before login');
  //         return redirect()->route('userlogin');
  //         }else{
  //           session()->flash('danger', 'Your account registration is made with phone Number Please contact Admins to verify your account');
  //         return redirect()->back();
  //         }
  //     }
  //     session()->flash('danger', 'Invalid Login attempt');
  //     return redirect()->route('userlogin');
      
  //   }catch(Throwable $th){
  //     session()->flash('danger', $th->getMessage());
  //     return redirect()->back();
  //   }
    
  // }
  

}
