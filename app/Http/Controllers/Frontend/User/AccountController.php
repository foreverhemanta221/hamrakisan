<?php
namespace App\Http\Controllers\Frontend\User;
use App\Helpers;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $user = Auth::user();
        if(User::where('phone_no',test_input($request->phone))->count()>0){
            return redirect()->back()->with('danger','Phone Number already in Use');
        }
        try{
            DB::transaction(function ()use($request){
                // dd($request);
                $user = Auth::user();
                $user->update($this->setData($request));
            });
        }catch (\PDOException $e){
            return redirect()->back()->with('danger',$e->getMessage());
        }
        if(Session::has('redirectRoute')){
            $url = Session::get('redirectRoute');
            Session::forget('redirectRoute');
            session()->flash('message',"Phone Number Updated Successfully You can place your Order Now");
            return redirect()->to($url);
        }
        return redirect()->back()->with('success','Updated');
    }
    public function setData($request){
        $data = [
          'name'=>$request->name,
          'phone_no'=>$request->phone,
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
