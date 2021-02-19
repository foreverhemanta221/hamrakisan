<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    public function mystats(){
        $data =[
            [
                'image'=>URL::asset('frontend/img/icons/products.png'),
                'name'=>'Order',
                'data'=>15
            ],
            [
                'image'=>URL::asset('frontend/img/icons/neworders.png'),
                'name'=>'Review',
                'data'=>50,
            ],
        ];
        return response()->json(['data'=>$data],200);
    }
}
