<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LanguageSwitcherController extends Controller
{
    public function getlang($locale=null){
        if($locale==null || $locale=='en'){
            session(['locale' => 'en']);
            return redirect()->back();
        }else{
            session(['locale' => 'ne']);
            return redirect()->back();
        }

    }
}
