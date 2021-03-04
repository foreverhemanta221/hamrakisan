<?php
namespace App\Http\Controllers\Frontend\Farmer;
use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\FarmProductRequest;
use App\Models\Backend\Product;
use App\Models\FarmProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Return_;

class ProductController extends Controller
{
    public function index(){
        if(Auth::user()->rel_listing->count()>0){
            $products = Auth::user()->rel_listing->first()->products;
            return view('frontend.farmer.farm.product.index')->with('myproducts',$products);
        }
        return view('frontend.farmer.farm.product.index')->with('myproducts',null)->with('danger',"You Have not listed any Product yet");
    }
    public function create(){
            $user= Auth::user();
            if($user){
                $listing = $user->rel_listing->first();
                if($listing){
                    return view('frontend.farmer.farm.product.create');
                }
                return redirect()->to('myfarm')->with('danger',"You have to list you farm first");
            }
    }
    public function store(FarmProductRequest $request){
        try{
            $this->validate($request,[
                'image'=>'required',
            ]);
            DB::transaction(function () use ($request) {
                $user= Auth::user();
                $listing = $user->rel_listing->first();
                if($listing){
                    $listing->products()->create($this->setData($request));
                }else{
                    return redirect()->route('listing.create')->with('danger',"You have to list you farm first");
                }
            });
        }catch (\PDOException $e){
            dd($e->getMessage());
        }
        return redirect()->to('myproduct')->with('success','Farm Product Addedd Successfully');
    }
    public function update(Request $request,$id){
        try{
            DB::transaction(function ()use($request,$id){
                $farmProduct = FarmProduct::find($id);
                $farmProduct->update($this->setData($request));
            });
        }catch (\PDOException $e){
            return redirect()->to('farmerdashboard')->with('error',$e->getMessage());
        }
        return redirect()->to('myproduct')->with('success','Farm Product Edit Successfully');
    }
    public function destroy(Request $request){
        if($request->ajax()){
            FarmProduct::find($request->id)->delete();
            Session()->flash('message',"Product Deleted Successfully");
        }
    }
    public function changeStatus(Request $request){
        if($request->ajax()){
            $product =FarmProduct::find($request->product_id);
            $status = $product->is_available==true ? false : true;
            FarmProduct::find($request->product_id)->update([
                'is_available' => $status
            ]);
            $current_staus = $status == 0 ? 'Not Available  ' :'Available ';
            return response()->json(['success'=>"Stauts Updated to ".$current_staus ." Successfully"]);
        }

    }

    public function setData($request){
        $data = [
          'name'=>$request->name,
          'minimum_quantity'=>$request->minimum_quantity,
          'price'=>$request->price,
          'measure_unit'=>$request->measure_unit,
        ];
        if($request->image){
            $data['image_id'] =Helpers::uploadImageToDb($request->image);
        }
        if($request->is_available){
            $data['is_available'] = $request->is_available =="on" ? '1' : 0;
        }
        return $data;
    }

}
