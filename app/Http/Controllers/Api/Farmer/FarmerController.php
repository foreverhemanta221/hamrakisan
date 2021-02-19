<?php

namespace App\Http\Controllers\Api\Farmer;

use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Resources\Farm\FarmDetailResource;
use App\Models\Address;
use App\Models\Listing;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class FarmerController extends Controller
{
    public $user;
    public function __construct(Request $request)
    {
        $this->user = User::find(getUserId($request->header('x-app-token')));
    }

    public function myFarm(Request $request){
        $listing =$this->user->rel_listing;
        if(!$listing->isEmpty()){
            return response()->json(['data'=> new FarmDetailResource($listing->first())],200)  ;
        }
        return response()->json(['data'=> null],200)  ;
    }
    public function addFarmDetail(Request $request){
        if(!$this->user->rel_listing->isEmpty()){
            return response()->json(['message'=>'already exist','status'=>false],400);
        }
        try {
            DB::transaction(function () use ($request) {
                $listing = new Listing();
                $listing->name = $request->farmName;
                $listing->slug = str_replace(' ','_',$request->farmName);
                $listing->address_id = $this->_addAddress($request);
                $listing->email = $request->farmEmail;
                $listing->phone = $request->farmPhone;
                $listing->about = $request->description;
                $listing->website = $request->farmWebsite;
                $listing->facebook = $request->farmFacebook;
                $listing->youtube = $request->farmYoutube;
                $listing->user_id =$this->user->id;
                $listing->category_id = $request->farmCategory;
                $listing->save();

                //get gallery image
                if($request->gallery_image){
                    $image_ids = [];
                    $gallery = (array) $request->gallery_image;
                    if(count($gallery)>0){
                        foreach ( array_slice($gallery, 0, 10) as $image ) {
                            $uploaded = Helpers::uploadApiImageToDb($image);
                            $image_ids[] =$uploaded ? $uploaded : null;
                        }
                        $image_ids = array_filter($image_ids);
                        // Attach
                        if (count($image_ids) > 0)
                            $listing->images()->attach($image_ids);
                    }
                }
            });
        }catch (\PDOException $e){
            return response()->json(['message'=>$e->getMessage(),'status'=>false],400);
        }
        return response()->json(['message'=>'Farm created','status'=>true],200);
    }
    public function _addAddress($request){
        //address
        $address_array = [
            'province'=>$request->farmProvince,
            'district'=>$request->farmDistrict,
            'specific_address'=>$request->farmSpecificAddress,
            'city'=>$request->farmCity,
        ];
        //now create
        $address = Address::create($address_array);
        return empty($address) ? null : $address->id;
    }
    public function mystats(){
        $data =[
            [
                'image'=>URL::asset('frontend/img/icons/products.png'),
                'name'=>'product',
                'data'=>$this->getProductCount(),
                ],
            [
                'image'=>URL::asset('frontend/img/icons/neworders.png'),
                'name'=>'Review',
                'data'=>$this->getReviewCount(),
            ],
            [
                'image'=>URL::asset('frontend/img/icons/visitors.png'),
                'name'=>'Total Sales',
                'data'=>"Rs. 3000",
            ],
            [
                'image'=>URL::asset('frontend/img/icons/todaysales.png'),
                'name'=>'Visitor',
                'data'=>190,
            ],

        ];
        return response()->json(['data'=>$data],200);
    }

    public function getProductCount(){
        if(!$this->user->rel_listing->isEmpty()){
            $productCount = $this->user->rel_listing->first()->products->count();
            return $productCount;
        }
    }
    public function getReviewCount(){
        if(!$this->user->rel_listing->isEmpty()){
            $reviewCount = $this->user->rel_listing->first()->rel_review->count();
            return $reviewCount;
        }
    }
}
