<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        $user = User::all();
        return view('backend.user.index')->with('userdata',$user);
    }


    public function create()
    {
        return  view('backend.user.create');
    }

    public function store(UserRequest $request)
    {
       $user =  User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'role'=>$request->role,
                'isVerified'=>$request->isVerified,
                'phone_no'=>$request->phone_no,
            ]);
       if($user){
           return redirect()->route('users.index')->with('success','User Created Successfully');
       }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.edit')->with('userDetail',$user);
    }

    public function update(Request $request, $id)
    {
        User::findOrFail($id)->update($this->setUpdateData($request));
        return redirect()->route('users.index')->with('success','User Updated Successfully');

    }

    public function destroy($id)
    {
        //
    }
    public function changePassword(Request $request ,  $id){
        if($request->ajax()){
            $validator = Validator::make($request->all(), [
                'password' => 'required|confirmed|min:7',
            ]);
            if ($validator->fails())
            {
                return response()->json(['errors'=>$validator->errors()->all()]);
            }
            $user = User::find($id);
            $user->password = bcrypt($request->password);
            if($user->save()){
                $request->session()->flash('success', 'Password Changed successfully');
                return response()->json(['status' => true]);
            }
            $request->session()->flash('danger', 'Password couldnot change');
            return response()->json(['status' => false]);
        }
        abort(404);
    }
    public function setData($request){
      return  $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
        ];

    }
    public function setUpdateData($request){
       return $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
            'isVerified'=>$request->isVerified,
            'phone_no'=>$request->phone_no,
        ];

    }
}
