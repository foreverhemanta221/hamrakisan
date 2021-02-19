<?php

namespace App\Http\Controllers\Frontend\Farmer;
use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\FarmerFarmListRequst;
use App\Models\Address;
use App\Models\Category;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class FarmerController extends Controller
{
    public $user;
    public function __construct()
    {

    }

    public function getFamerDashboard(){
        return view('frontend.farmer.dashboard');
    }
    public function loadFarm(){
        $category = Category::all();
        if(Auth::user()->rel_listing->count()>0){
            $farm = Auth::user()->rel_listing->first();
            return view('frontend.farmer.farm.myfarm')->with('farmdetail',$farm)->with('allcategory',$category);
        }else{
            return view('frontend.farmer.farm.farmForm')->with('allcategory',$category);;
        }
    }
    public function saveFarm(FarmerFarmListRequst $request){
        // dd($request->all());
        //TODO:: check user have already listed farm or not
        try {
            DB::transaction(function () use ($request) {
                $listing = new Listing();
                $listing->name = $request->farmName;
                $listing->slug = str_replace(' ','_',$request->farmName);
                $listing->address_id = $this->_addAddress($request);
                $listing->email = $request->farmEmail;
                $listing->category_id = $request->category_id;
                $listing->phone = $request->farmPhone;
                $listing->about = $request->description;
                $listing->website = $request->farmWebsite;
                $listing->facebook = $request->farmFacebook;
                $listing->youtube = $request->farmYoutube;
                $listing->user_id = Auth::user()->id;
                $listing->save();

               // get gallery image
                if($request->gallery_image){
                    $image_ids = [];
                    $gallery = (array) $request->gallery_image;
                    if(count($gallery)>0){
                        foreach ( array_slice($gallery, 0, 10) as $image ) {
                            $uploaded = Helpers::uploadImageToDb($image);
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
           // session()->flash('danger', 'Farm Could Not Be Added !!!');
             dd($e->getMessage());
        }
        DB::commit();
        session()->flash('message', 'Farm Added Successfully');
        return redirect()->to('farmerdashboard')->with('success','Farm Addes Successfully');
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
}
