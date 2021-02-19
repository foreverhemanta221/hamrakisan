<?php
namespace App\Http\Controllers\Api;
use App\Http\Requests\FarmProductBookRequest;
use App\Http\Resources\Farm\FarmProduct\Book\FarmProductBookResource;
use App\Models\FarmProduct;
use App\Models\FarmProductBook;
use App\User;
use App\UserToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class FarmProductManageController extends Controller
{
    public function orderList(Request $request){
        try{
            $user_id = $this->getUserId($request->header('x-app-token'));
            $user_listing = User::findOrFail($user_id)->listings->first();
            if($user_listing!=null){
                $products = $user_listing->products;
                $product_id = [];
                foreach($products as $product){
                 array_push($product_id,$product->id);
                }
                $orders = FarmProductBook::whereIn('product_id',array_values($product_id))->paginate(15);
                //return $orders
                return response()->json(['data'=>FarmProductBookResource::collection($orders)],200);
            }return response()->json(['message','No product added yet',200]);
        }catch (\PDOException $e){
            return response()->json(['message',$e->getMessage()],400);
        }
    }
    public function getOrder(Request $request,$id){
        DB::beginTransaction();
        try{
            $farmproductBook = new FarmProductBook();
            $farmproductBook->product_id = $id;
            $farmproductBook->name = $request->name;
            $farmproductBook->email = $request->email;
            $farmproductBook->phone = $request->phone;
            $farmproductBook->province = $request->province;
            $farmproductBook->district = $request->district;
            $farmproductBook->city = $request->city;
            $farmproductBook->s_address = $request->s_address;
            $farmproductBook->quantity = $request->quantity;
            $farmproductBook->description = $request->description;
            $farmproductBook->save();
            DB::commit();
        }catch (\Exception $e) {
            DB::rollback();
            return response()->json(['data'=>$e->getMessage()],400);
        }
        return response()->json(['data'=>'Ordered Successfully'],200);
    }
    public function ordersOfSingleProduct(Request $request,$product){
        $user_id = $this->getUserId($request->header('x-app-token'));
        $user_listing = User::findOrFail($user_id)->listings->first();
        if($user_listing!=null){
            if($user_listing->products->where('id',$product)->count()>0){
                $orders = FarmProductBook::where('product_id',$product)->get();
                return response()->json(['data'=>FarmProductBookResource::collection($orders)],200);
            }return response()->json(['message'=>'This is not your product'],200);
        }


    }
    public function getUserId($token){
        $user_token = UserToken::where('api_token',$token)->first();
        if($user_token!=null){
            $user_id = $user_token->user_id;
            return $user_id;
        }
    }

}
