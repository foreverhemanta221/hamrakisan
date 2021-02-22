<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class LanguageSwitcherController extends Controller
{
    public function getlang($locale=null , Request $request){
        if($locale==null || $locale=='en'){
            $request->session()->flush();
            App::setLocale('en');
            Session::put('locale', 'en');
//            $request->session()->put('locale','en');
        }else{
            $request->session()->flush();
            App::setLocale('nep');
            Session::put('locale', 'nep');
//            $request->session()->put('locale','nep');

        }

        return redirect()->back();
    }
}
