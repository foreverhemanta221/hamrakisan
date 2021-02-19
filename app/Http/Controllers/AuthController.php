<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterAndListingRequest;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function adminLogin(LoginRequest $request){
        if (Auth::attempt(['email' => $request->input('username'), 'password' => $request->input('password'),'role'=>'admin'])) {
            return redirect('dashboard')->with('info', 'You are now logged in.');
        }
        return redirect()->back()->with('danger', 'Login Failed! Your credentials may not match. or your account may not be activated');
    }

    public function userLogin(LoginRequest $request){
        if (Auth::attempt(['email' => $request->input('username'), 'password' => $request->input('password'),'role'=>'farm'])) {
            //farmer dashaboard
        }
        if (Auth::attempt(['email' => $request->input('username'), 'password' => $request->input('password'),'role'=>'user'])) {
            //user dashaboard
        }
        return redirect()->back()->with('danger', 'Login Failed! Your credentials may not match. or your account may not be activated');
    }

    public function getUserDashboard(){
        $listing = Auth::user()->listings;
        return view('frontend.dashboard.home')->with('alllisting',$listing);
    }

    public function logout(){

        Auth::logout();
        return redirect('/');
    }




}
