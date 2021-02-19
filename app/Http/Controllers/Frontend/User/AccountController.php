<?php
namespace App\Http\Controllers\Frontend\User;
use App\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function myProfile(){
        $user = Auth::user();
        if($user->role=="user"){
            return view('frontend.user.account')->with('userdetail',$user);
        }
        return view('frontend.farmer.account')->with('userdetail',$user);
    }
    public function  updateAccount(Request $request){
        try{
            DB::transaction(function ()use($request){
                $user = Auth::user();
                $user->update($this->setData($request));
            });
        }catch (\PDOException $e){
            dd($e->getMessage());
            return redirect()->back()->with('danger',$e->getMessage());
        }
        return redirect()->back()->with('success','Updated');
    }
    public function setData($request){
        $data = [
          'name'=>$request->name,
          'province'=>$request->province,
          'district'=>$request->district,
          'city'=>$request->city,
          'specific_address'=>$request->specific_address,
        ];
        if($request->has('image')){
            $image_id = Helpers::uploadImageToDb($request->image);
            $data['image_id']= $image_id;
        }
        return $data;
    }
}
