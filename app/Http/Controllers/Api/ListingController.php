<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\PHPMailer;
use App\Http\Requests\RegisterAndListingRequest;
use App\Http\Resources\Farm\FarmDetailResource;
use App\Http\Resources\Farm\FarmListResource;
use App\Http\Resources\Farm\FarmProduct\FarmProductResource;
use App\Models\Address;
use App\Models\FarmProduct;
use App\Models\Listing;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ListingController extends Controller
{

    public function index()
    {
        $listing = Listing::where('status',1)->get();
        $listing = FarmListResource::collection($listing);
        return response()->json(['data'=>$listing],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listing = Listing::where([['featured',1],['id',$id]])->first();
        if($listing!=null){

            $listing =  new FarmDetailResource($listing);
            return response()->json(['data'=>$listing],200);
        }
        return response()->json(null);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function allActiveListing(){

    }
    public function farmProductDetail($id){
        $farmProduct = FarmProduct::findOrFail($id);
        return new FarmProductResource($farmProduct);

    }
    public function registerAndListingFarm(RegisterAndListingRequest $request){
        try{
            DB::beginTransaction();
            $password  = str_random(8,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($password) ;
            $user->isVerified = 0 ;
            $user->role  = 3;
            $user->save();
            $address = [
                'province'=>$request->province,
                'district'=>$request->district,
                'city'=>$request->city
            ];
            $address = Address::create($address);
            $listing = [
                'name'=>$request->farm_name,
                'slug'=>str_slug($request->farm_name,'-'),
                'about'=>$request->description,
                'address_id'=>$address->id,
                'status' => 0,
                'featured'=>0,
            ];
            $listing = $user->listings()->create($listing);
            $mail = new PHPMailer();
            $mail->From = "info@hamrakisan.com";
            $mail->FromName = "Hamrakisan";
            $mail->isHTML(true);
            $mail->AddAddress($request->email, $request->name);
            $mail->Subject = "Farm Listing and User Creation";
            $mail->Body = "<h3>Thank you for submitting your farm on our site . </h3>
                <p>Your password is : ".$password."</p>
                Your password Our Team will get back to your in next 24 hour ";
            $mail->send();
            DB::commit();
        }catch (\PDOException $e){
            DB::rollback();
            return response()->json(['message',$e->getMessage()],200);
        }


        return response()->json(['message'=>'Farm Added Successfully and your account created Successfully'],200);
//        return redirect()->back()->with('success','Farm added successfully and successfully created your account too please check your email to verify');
    }

    public function checkRequestRole($request){
        if(!$request->role){
            $role = '3';
        }else{
            $role = $request->role;
        }return $role;
    }


}
