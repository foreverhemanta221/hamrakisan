<?php
namespace App\Http\Controllers\Api;
use App\Http\Resources\FarmProfile\FarmBasicInfoResource;
use App\Http\Resources\FarmProfile\FarmContactPersonInfoResource;
use App\Http\Resources\FarmProfile\FarmSocialInfoResource;
use App\Models\Address;
use App\Models\Category;
use App\Models\Listing;
use App\User;
use App\UserToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Helpers;
class FarmProfileController extends Controller
{
    public function getBasicInfo(Request $request){
        $user_listing =  $this->fetchListing($request);
        if($user_listing->isEmpty()){
            return response()->json(['data'=>null],200);
        }
        return new FarmBasicInfoResource($user_listing->first());
    }
    public function postBasicInfo(Request $request){
        $user_listing =  $this->fetchListing($request);
        try{
            if($user_listing->isEmpty()){
                $data =$this->setListingCreateData($request,$this->getUserId($request->header('x-app-token')));
                $data['slug']= Str::slug($request->title);
                $listing = Listing::create($data);
                $address = Address::firstOrCreate($this->setAddressDetail($request));
                if($address){
                    $listing->address_id = $address->id;
                    $listing->save();
                }
                $cats = (array) $request->input('category');
                // Now attach the categories.
                if (count($cats) > 0) {
                    $categories = Category::find($cats);
                    $listing->categories()->sync($categories);
                }

            }else{
                $user_listing->first()->update($this->setListingCreateData($request,$this->getUserId($request->header('x-app-token'))));
                $listing = $user_listing->first();
                $address = Address::firstOrCreate($this->setAddressDetail($request));
//            dd($address->id);
                if($address){
                    $listing->address_id = $address->id;
                    $listing->save();
                }
                $cats = (array) $request->input('category');
                // Now attach the categories.
                if (count($cats) > 0) {
                    $categories = Category::find($cats);
                    $listing->categories()->sync($categories);
                }
            }
        }catch (\PDOException $e){
            return response()->json(['data'=>null,'message'=>$e->getMessage()],400);
        }
        return response()->json(['data'=>new FarmBasicInfoResource($user_listing->first()),'message'=>'Farm Updated Successfully'],200);
    }
    public function getSocialInfo(Request $request){
        $user_listing =  $this->fetchListing($request);
        if($user_listing->isEmpty()){
            return response()->json(['data'=>null,'message'=>'please create a farm first'],200);
        }
        return new FarmSocialInfoResource($user_listing->first());
    }
    public function postSocialInfo(Request $request){
        $user_listing =  $this->fetchListing($request);
        
        if($user_listing->isEmpty()){
            return response()->json(['data'=>null,'message'=>'you are not able to do this operation'],200);
        }
        try{
            $user_listing->first()->update($this->setSocailData($request));
        }catch (\PDOException $e){
            return response()->json(['data'=>null,'message'=>$e->getMessage()],400);
        }
        return response()->json(['data'=>new FarmSocialInfoResource($user_listing->first()),'message'=>'socail info updated successfully']);
    }
    public function getContactPeople(Request $request){
        $user_listing = $this->fetchListing($request);
        if($user_listing->isEmpty()){
            return response()->json(['data'=>null,'message'=>'please create a farm first'],200);
        }
        return response()->json(['data'=>new FarmContactPersonInfoResource($user_listing->first()),'message'=>'farm contact person fetch successfully'],200);

    }
    public function postContactPeople(Request $request){
        $user_listing = $this->fetchListing($request);
        if($user_listing->isEmpty()){
            return response()->json(['data'=>null,'message'=>'please create a farm first'],200);
        }

      if($user_listing->first()->contactPerson ==null){
        $user_listing->first()->contactPerson()->create($this->setContactPeopleData($request));
      }else{
        $user_listing->first()->contactPerson()->update($this->setContactPeopleData($request));
      }
        return response()->json(['data'=>new FarmContactPersonInfoResource($user_listing->first()),'message'=>'Data store successfully'],200);
    }
    public function getLogoAndGallery(Request $request){


    }
    public function postLogoAndGallery(Request $request){
        $user_listing = $this->fetchListing($request);
        if($user_listing->isEmpty()){
            return response()->json(['data'=>null,'message'=>'Please Create Farm First'],404);
        }
        $listing = $user_listing->first();
        // dd($listing);
        if($request->has('fileToUpload')){
            $listing->feature_image  = Helpers::uploadApiImageToDb($request->fileToUpload,$this->getUserId($request->header('x-app-token')));
                 
            $listing->save();
                 
        }
        //get gallery image
        if($request->galleryToUpload){
            $image_ids = [];
            $gallery = (array) $request->galleryToUpload;
            if(count($gallery)>0){
                foreach ( array_slice($gallery, 0, 4) as $image ) {
                    $uploaded = Helpers::uploadImageToDb($image,$this->getUserId($request->header('x-app-token')));
                    $image_ids[] =$uploaded ? $uploaded : null;
                }
                $image_ids = array_filter($image_ids);
                // Attach
                if (count($image_ids) > 0){
                    $listing->images()->attach($image_ids);
                    return 'test successfull';
                }

            }
        }


    }
    public  function setListingCreateData($request,$user_id){
        return [
        'user_id'=>$user_id,
        'name'=>$request->title,
        'phone' => $request->phone,
        'email' => $request->email,
        'about' => $request->about,
        'services' => $request->services
        ];
    }
    public function setAddressDetail($request){
        return [
            'province'=>$request->province, 'district'=>$request->district, 'city'=>$request->city, 'landmark'=>$request->landmark
        ];
    }
    public function setSocailData($request){
        return [
          'facebook'=>$request->facebook,
          'twitter'=>$request->twitter,
          'youtube'=>$request->youtube,
          'instagram'=>$request->instagram,
        ];
    }
    public function setContactPeopleData($request){
        return [
          'name'=>$request->cp_name,
          'post'=>$request->cp_designation,
          'phone'=>$request->cp_phone,
          'email'=>$request->cp_email,
        ];
    }
    public function getUserId($token){
        $user_token = UserToken::where('api_token',$token)->first();
        if($user_token!=null){
            $user_id = $user_token->user_id;
            return $user_id;
        }
    }
    public function fetchListing($request){
        $user_id = $this->getUserId($request->header('x-app-token'));
        $user_listing = User::findOrFail($user_id)->listings;
        return $user_listing;
    }



}
