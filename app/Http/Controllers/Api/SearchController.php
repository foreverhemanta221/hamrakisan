<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\Farm\FarmDetailResource;
use App\Http\Resources\Farm\FarmListResource;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Search\FarmSearchResource;
use App\Models\Backend\Product;
use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function farmerSearch(){
        $params = $this->_getFarmSearchedResults();
        $provinceId = $params['province'];
        $districtId = $params['district'];
        $categoryId = $params['category'];
        $items = Listing::where(function ($query) use($params){
            //if province only inserted
            if(($params['district']!=null || $params['province']!=null) && $params['category']==null ){
                $query->addressSearch($params);
            }elseif($params['category']!=null ){
                $query->categorySearch($params);
            }else{

            }
        })->get();
//        return $searchedItems;
//        $listing = Listing::where(function ($query) use($searchedItems){
//            if($searchedItems['key']!=null){
//                $query->search($searchedItems['key'],$searchedItems['order_by']);
//            }
//            if($searchedItems['category']!=null){
//                $category = $searchedItems['category'];
//                $query->whereHas('categories',function ($q)use($category){
//                    $q->where([['slug','=',$category],['status',1]]);
//                });
//            }
//        })->get();
       $listing =  FarmSearchResource::collection($items);
        return response()->json(['data'=>$listing],200);
    }
    public function productSearch(){
        $searchedItems = $this->_getProductSearchedResults();
        $product = Product::where(function ($query) use($searchedItems){
            if($searchedItems['key']!=null){
                $query->search($searchedItems['key'],$searchedItems['order_by']);
            }
            if($searchedItems['category']!=null){
                $category = $searchedItems['category'];
                $query->whereHas('categories',function ($q)use($category){
                    $q->where('slug',$category);
                });
            }
        })->get();
        $listing =  ProductResource::collection($product);
        return response()->json(['data'=>$listing],200);
    }

    public function _getFarmSearchedResults(){
        $params = $this->_getSearchedFarmParams();
        return $params;
    }
    public function _getProductSearchedResults(){
        $params = $this->_getSearchedProductParams();
        return $params;
    }

    protected function _getSearchedFarmParams()
    {
      return[
            'category'=>$this->request->input('category'),
            'key' => $this->request->input('key'),
            'province' => $this->request->input('province'),
            'district' => $this->request->input('district'),
        ];
    }
    protected function _getSearchedProductParams()
    {
      return[
            'category'=>$this->request->input('category'),
            'key' => $this->request->input('key'),
            'order_by'=> $this->request->input('order_by') !=null ? $this->request->input('order_by') : 'created_at'
        ];
    }

}
