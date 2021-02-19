<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Address;
use App\Models\Category;
use App\Models\ContactPerson;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ListingTranslateController extends Controller
{
    public function getView($slug){
        $listing = Listing::where('slug',$slug)->first();
        $category = Category::all();
        $province = nepaliProvince();
        return view('frontend.dashboard.translate')->with('listing',$listing)->with('province',$province)->with('category',$category);
    }

    public function translateBasicInfo(Request $request , $id){
        if($request->ajax()){
            try{
                DB::transaction(function ()use($request,$id){
                    $listing = Listing::find($id);
                    $listing->nep_name = $request->title;
                    $listing->nep_about = $request->about;
                    $listing->save();
                    $listing->address_id ;

                    //address
                    $address= [
                        'nep_city'=>$request->city
                    ];
                    $address = Address::Find($listing->address_id );
                    $address->nep_city = $request->city;
                    $address->save();

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
    public function updateContactPerson(Request $request,$id){
        $listing = Listing::find($id);
        $check_exist = ContactPerson::where('listing_id',$id)->get();

        if($check_exist->isEmpty()){
            $contact = new ContactPerson();
        }else{
            $contact = ContactPerson::where('listing_id',$id)->first();
        }
        $contact->nep_name = $request->cp_name;
        $contact->listing_id = $id;
        $contact->nep_post = $request->cp_designation;
        $contact->save();
        return redirect()->back();
    }
}
