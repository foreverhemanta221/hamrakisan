<?php
namespace App\Http\Controllers\Frontend\Farmer;
use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\FarmProductRequest;
use App\Models\FarmProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class ProductController extends Controller
{
    public function index(){
        if(Auth::user()->rel_listing->count()>0){
            $products = Auth::user()->rel_listing->first()->products;
            return view('frontend.farmer.farm.product.index')->with('myproducts',$products);
        }
    }
    public function create(){
        return view('frontend.farmer.farm.product.create');
    }
    public function store(FarmProductRequest $request){
        try{
            DB::transaction(function () use ($request) {
                $user= Auth::user();
                $listing = $user->rel_listing->first();
                $listing->products()->create($this->setData($request));
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
