<?php

namespace App\Http\Controllers\Frontend\Farmer;
use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\FarmerFarmListRequst;
use App\Models\Address;
use App\Models\Category;
use App\Models\Listing;
use App\Modules\Order\Repositories\OrderRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class FarmerController extends Controller
{
    public $user;
    protected $orderService;
    public function __construct(OrderRepositoryInterface $orderServices)
    {
        $this->orderService = $orderServices;

    }
    public function getFamerDashboard(){
        $user = Auth::user();
        $new_orders =null;
        $products_listed =null;
        $new_orders_count =0;
        $product_count =0;
        if($user->listed_farm){
            $new_orders =$this->orderService->orderByFarmId($user->listed_farm->id);
            $new_orders_count =$this->orderService->orderByFarmId($user->listed_farm->id)->count();
        }
        $myorder = $this->orderService->orderByUserId(Auth::user()->id);
        // dd($myorder);
        $product_listed = 0;
        if($user->listed_farm){
            $products_listed = $user->listed_farm->products;
        }else{
            $products_listed = null;
        }
        return view('frontend.farmer.dashboard')->with([
            'orders_count'=>$new_orders_count,
            'new_orders'=>$new_orders,
            'products_listed'=>$products_listed,
            'product_count'=>$products_listed!=null ? $products_listed->count() : 0,

        ]);
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


        if(Auth::user()->rel_listing->count()>0){
            return redirect('myfarm')->with('danger','You already have existing farm');
        }
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
            session()->flash('danger', 'Farm Could Not Be Added !!!');
//             dd($e->getMessage());
        }
        DB::commit();
        session()->flash('message', 'Farm Added Successfully');
        return redirect()->to('farmerdashboard')->with('success','Farm Addes Successfully');
    }
    public function updateFarm(Request $request){

        try {
            DB::transaction(function () use ($request) {
                $farm_id = Auth::user()->rel_listing[0]->id;
                $listing =Listing::find($farm_id);
                $listing->name = $request->farmName;
                $listing->slug = str_replace(' ','_',$request->farmName);
                $listing->email = $request->farmEmail;
                $listing->category_id = $request->category_id;
                $listing->phone = $request->farmPhone;
                $listing->about = $request->description;
                $listing->website = $request->farmWebsite;
                $listing->facebook = $request->farmFacebook;
                $listing->youtube = $request->farmYoutube;
                $listing->user_id = Auth::user()->id;

                $listing->save();

                //update address
                Address::find($listing->address_id)->update($this->getAddressRequest($request));
                // get gallery image
                if($request->gallery_image){
                    $image_ids = [];
                    $gallery = (array) $request->gallery_image;

                    if(count($gallery)>0){
                        foreach ( array_slice($gallery, 0, 10) as $image ) {
                            if($image!=null){
                                $uploaded = Helpers::uploadImageToDb($image);
                                $image_ids[] =$uploaded ? $uploaded : null;
                            }
                        }
                        $image_ids = array_filter($image_ids);
                        // Attach
                        if (count($image_ids) > 0)
                            $listing->images()->attach($image_ids);
                    }
                }

            });
        }catch (\PDOException $e){
            session()->flash('danger', 'Farm Could Not Be Added !!!');
//             dd($e->getMessage());
        }
        DB::commit();
        session()->flash('message', 'Farm Added Successfully');
        return redirect()->to('farmerdashboard')->with('success','Farm Addes Successfully');

    }
    public function _addAddress($request){
        $address_array = $this->getAddressRequest($request);
        //now create
       $address = Address::create($address_array);
        return empty($address) ? null : $address->id;
    }
    public function getAddressRequest($request){
        //address
        return [
            'province'=>$request->farmProvince,
            'district'=>$request->farmDistrict,
            'specific_address'=>$request->farmSpecificAddress,
            'city'=>$request->farmCity,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
        ];
    }

}
