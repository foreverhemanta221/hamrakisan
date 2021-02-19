<?php
namespace App\Http\Controllers\Frontend;
use App\Models\Address;
use App\Models\Category;
use App\Models\ContactPerson;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers;
class ListingController extends Controller
{
    public function create()
    {
        if(Auth::user()->role == 3){
            $count = Listing::where('user_id',Auth::user()->id)->count();
            if($count>0){
                return redirect('userdashboard')->with('info','you already have one listing');
            }
        }
        $category = Category::all();
        $province = getProvince();
        return view('frontend.dashboard.add-listing')->with('province',$province)->with('category',$category);
    }
    public function edit($id)
    {
        $listing = Listing::where('slug',$id)->first();
        $category = Category::all();
        $province = getProvince();
        return view('frontend.dashboard.edit-listing')->with('listing',$listing)->with('province',$province)->with('category',$category);
    }
    public function updateBasicInfo(Request $request , $id){
        if($request->ajax()){
            try{
                DB::transaction(function ()use($request,$id){
                    $listing = Listing::find($id);
                    $listing->name = $request->title;
                    $listing->phone = $request->phone;
                    $listing->email = $request->email;
                    $listing->about = $request->about;
                    $listing->services = $request->services;
                    $listing->save();

                    //address
                    $address= [
                        'provience'=>$request->province, 'district'=>$request->district, 'city'=>$request->city, 'landmark'=>$request->landmark
                    ];
                    $address = Address::firstOrCreate($address);
                    if($address){
                        $listing->address_id = $address->id;
                        $listing->save();
                    }
                    // Get the categories.
                    $cats = (array) $request->input('category');
                    // Now attach the categories.
                    if (count($cats) > 0) {
                        $categories = Category::find($cats);
                        $listing->categories()->sync($categories);
                    }
                });
            }catch (\PDOException $e){
                $request->session()->flash('danger', 'Something went wrong');
                return response()->json(['status'=>false]);
            }
            $request->session()->flash('success', 'Updated Successfully');
            return response()->json(['status'=>true]);
        }
        return redirect('frontend/dashboard/edit-listing/'.Listing::find($id)->slug);
    }
    public function updateSocialMedia(Request $request,$id)
    {
        if ($request->ajax()) {
            try {
                DB::transaction(function () use ($request, $id) {
                    $listing = Listing::find($id);
                    $listing->facebook = $request->facebook;
                    $listing->twitter = $request->twitter;
                    $listing->instagram = $request->instagram;
                    $listing->youtube = $request->youtube;
                    $listing->save();
                });
            } catch (\PDOException $e) {
                $request->session()->flash('danger', 'Something went wrong');
                return response()->json(['status'=>false]);
            }
            $request->session()->flash('success', 'Updated Successfully');
            return response()->json(['status'=>true]);
        }else{
            return 'this is not ajax';
        }
    }
    public function updateMedia(Request $request, $id){
           $lising =  Listing::find($id);
           $lising->feature_image = Helpers::uploadImageToDb($request->banner,Auth::user()->id);
           $lising->save();
        return response()->json(['data'=>$lising]);
    }

    public function updateContactPerson(Request $request,$id){
        $check_exist = ContactPerson::where('listing_id',$id)->get();
        if($check_exist->isEmpty()){
            $contact = new ContactPerson();
            $contact->listing_id = $id;
        }else{
            $contact = ContactPerson::where('listing_id',$id)->first();
        }
            $contact->name = $request->cp_name;
            $contact->listing_id = $id;
            $contact->post = $request->cp_designation;
            $contact->phone = $request->cp_phone;
            $contact->email = $request->cp_email;
            $contact->save();
            return redirect()->back();
    }
}