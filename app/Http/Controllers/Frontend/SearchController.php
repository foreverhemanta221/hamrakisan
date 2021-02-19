<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Resources\Farm\FarmDetailResource;
use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Stmt\Return_;

class SearchController extends Controller
{
    public $request;
    public function __construct(Request $request)
    {
       $this->request = $request;
    }

    public function showSearchResults(Request $request){
        $category = Category::all();
        $searchedItems = $this->_getSearchedResults();
        $countSearach = $searchedItems->count();

        return view('frontend.search')->with('items',$searchedItems)
                                            ->with('categories',$category)
                                            ->with('searchCount',$countSearach)
                                            ->with('request',$request);
    }

    public function ajaxSearch(Request $request){
        $searchedItems = $this->_getSearchedResults();
        return response()->json(['result'=>FarmDetailResource::collection($searchedItems)]);
    }

    public function _getSearchedResults(){
        $params = $this->_getSearchedParams();
        $provinceId = $params['province'];
        $districtId = $params['district'];
        $categoryId = $params['category'];

        $items = Listing::onlyApproved()
            ->when($categoryId,function ($query) use($categoryId){
                return$query->whereIn('listings.category_id',$categoryId);
            })
            ->when($provinceId,function ($query) use($provinceId){
                return $query->whereHas('address',function ($q) use($provinceId){
                        return $q->where('province',$provinceId);
                });
            })
            ->when($districtId,function ($query) use($districtId){
                return $query->whereHas('address',function ($q)use($districtId){
                    return $q->where('district',$districtId);
                });
            })
            ->paginate(16);
        return $items;
    }

    protected function _getSearchedParams()
    {
        return [
            'province' => $this->request->has('province') ? $this->request->get('province') : null,
            'district' => $this->request->has('district') ? $this->request->get('district') :null ,
            'category' => $this->request->has('category') ? explode(',',$this->request->input('category')) : null,
        ];
    }
}
