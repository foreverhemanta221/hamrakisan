<?php
namespace App\Http\Controllers\Backend;
use App\Http\Requests\ListingRequest;
use App\Models\Address;
use App\Models\Category;
use App\Models\Listing;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Helpers;
class ListingController extends Controller
{
     public function index()
    {
        $alllisting = Listing::all();
        return view('backend.listing.index')->with('listings',$alllisting);
    }
    public function create()
    {
        $category = Category::all();
        if(count($category)>0){
            $user = User::whereDoesntHave('rel_listing')->where('role','farmer')->get();
            $province = getProvince();
            if($category)
                return view('backend.listing.create')->with('category',$category)->with('province',$province)->with('users',$user);
        }
        return redirect()->back()->with('danger','Category must create first');
    }
    public function store(ListingRequest $request)
    {
        try{
            $item  = $this->_addNewRecord($request);
        }catch (\PDOException $e){
            dd($e->getMessage());
        }
        return redirect()->route('listing.index')->with('success','Farm Added Successfully');
    }
    public function show(Listing $listing)
    {
        return view('backend.listing.settings.index')->with('listing',$listing);
    }
    public function edit($id)
    {
        $listing = Listing::find($id);
        $category = Category::all();
        $province = getProvince();
        $user = User::where('role','farmer')->where('isVerified',1)->get();
        return view('backend.listing.edit')->with('categories',$category)->with('province',$province)->with('listing',$listing)->with('users',$user);
    }
    public function update(Request $request, $id)
    {
        try{
            DB::transaction(function ()use($request,$id){
                $listing = Listing::find($id);
                $update = $this->setData($request);
                $listing->update($update);
            });
        }catch (\PDOException $e){
            dd($e);
        }
        return redirect()->route('listing.index')->with('success','Listing successfully updated');
    }
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
                $listing =  Listing::find($id);
                // DB::table('listing_category')->where('listing_id',$listing->id)->delete();
                // DB::table('farm_products')->where('farm_id',$listing->id)->delete();
                // DB::table('listing_image')->where('listing_id',$listing->id)->delete();
                // DB::table('contact_people')->where('listing_id',$listing->id)->delete();
                // DB::table('maps')->where('listing_id',$listing->id)->delete();
                if($listing->delete()){
                    $request->session()->flash('success', 'Listing Deleted deleted.');
                    return response()->json(['status' => true]);
                }
            $request->session()->flash('danger', 'some error while delete.');
            return response()->json(['status' => false]);
        }
    }
    protected function _addNewRecord($request){
            $user  = User::find($request->user);
            $new = $this->setData($request);
            //upload feature_image
            if($request->has('feature_image'))
                $new['feature_image']= Helpers::uploadImageToDb($request->feature_image);

            $record = $user->rel_listing()->create($new);
            //get gallery image
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
                        $record->images()->attach($image_ids);
                }
            }
            return $record;
    }
    protected function _addAddress($request)
    {
        $new = [
            'landmark'    => $request->input('landmark'),
            'city'        => $request->input('city'),
            'province'    => $request->input('province'),
            'district' => $request->input('district'),
            'latitude'=>$request->input('latitude'),
            'longitude'=>$request->input('longitude'),
        ];
        if ($new['district']) {
            $address = Address::firstOrCreate($new);
            return empty($address) ? null : $address->id;
        }
    }
    public function setData($request){
        $new_update = [
            'name'=>$request->title,
            'category_id'=>$request->category,
            'slug'=> $request->slug ? $request->slug : str_replace(' ','_',trim(strtolower($request->title))),
            'about'=>$request->about,
            'featured'=>$request->featured==1 ? 1 : 0,
            'status'=>$request->status==1 ? 1 : 0,
            'address_id'=>$this->_addAddress($request),
            'phone'=>$request->phone,
            'email'=>$request->email,
            'website'=>$request->website,
            'facebook'=>$request->facebook,
            'youtube'=>$request->youtube,
        ];
        return $new_update;
    }
    //show gallery of farm
    public function showImage($id){
         $listings = Listing::find($id);
         return view('backend.listing.settings.gallery.index')->with('listing',$listings);
    }
    //insert new image into gallery
    public function insertImage(Request $request,$id){
        $listing = Listing::find($id);
        if(count($listing->images)<4){
            $upload = Helpers::uploadImageToDb($request->image);
            if($upload){
                $listing->images()->attach($upload);
                return redirect()->back()->with('success','Image Added Successfully');
            }
        }else{
            return redirect()->back()->with('danger','Only 4 image can be inserted');
        }
    }
    //delete image of listing
    public function deleteImage(Request $request,$id){
         if($request->ajax()){
            $delete = DB::table('listing_image')->where('image_id', $id)->delete();
                 if($delete){
                     Helpers::delete_image_byId($id);
                     $request->session()->flash('success', 'image successfully deleted.');
                     return response()->json(['status' => true]);
                 }
                 $request->session()->flash('danger', 'somethings went wrong.');
                 return response()->json(['status' => false]);
             }
             abort(404);
    }

    public function updateData(Request $request,Listing $listing){
        $new_update = [
            'name'=>$request->title ? $request->title : $listing->name,
            'about'=>$request->about ? $request->about : $listing->about,
            'services'=>$request->features ? $request->features : $listing->services,
            'address_id'=>$request->province ? $this->_addAddress($request) : $listing->address_id,
            'phone'=>$request->phone ? $request->phone: $listing->phone,
            'email'=>$request->email ?  $request->email : $listing->email,
            'website'=>$request->website ? $request->website : $listing->website ,
            'facebook'=>$request->facebook ? $request->facebook : $listing->facebook,
            'twitter'=>$request->twitter ?  $request->twitter : $listing->twitter,
            'instagram'=>$request->instagram ?  $request->instagram : $listing->instagram,
            'youtube'=>$request->youtube ? $request->youtube : $listing->youtube,
        ];
        return $new_update;
    }

    public function changeStatus(Request $request){
         if($request->ajax()){
             $listingId = $request->listingId;
             $listing = Listing::find($listingId);

             $status = $listing->staus==1? 0:1;
             $listing->update(['status'=>$status]);
             $request->session()->put('success','Status changed successfulyy');
             return response()->json(['data'=>'success'],200);
         }
    }
}
