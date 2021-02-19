<?php

namespace App\Http\Controllers\Frontend\Farmer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AccountController extends Controller
{
    public function myProfile(){
        $user = Auth::user();
        return view('frontend.farmer.account')->with('userdetail',$user);
    }
}
