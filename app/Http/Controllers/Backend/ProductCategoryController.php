<?php
namespace App\Http\Controllers\Backend;
use App\Http\Requests\CategoryRequest;
use App\Models\Backend\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers;
class ProductCategoryController extends Controller
{
    public function index()
    {
        $category = ProductCategory::all();
        return view('backend.productcategory.index')->with('allcategory',$category);
    }
    public function create()
    {
        return view('backend.productcategory.create');
    }
    public function store(CategoryRequest $request)
    {
        $productcat = new ProductCategory();
        $insert =    $this->insertOrUpdate($productcat,$request);
        if($insert)
            return redirect()->route('productcategory.index')->with('success','Category Added Successfully');
    }
    public function edit($id)
    {
        $productCategory = ProductCategory::find($id);
        return view('backend.productcategory.edit')->with('category',$productCategory);
    }
    public function update(CategoryRequest $request, $id)
    {
        $category = ProductCategory::find($id);
        $update = $this->insertOrUpdate($category,$request);
        if($update)
            return redirect()->route('productcategory.index')->with('success','Updated Successfully');
    }
    public function destroy(Request $request,$id)
    {
        if($request->ajax()){
            $productCateogry = ProductCategory::find($id)->delete();
            $request->session()->put('success','Product Category Deleted Successfully');
            return response()->json(['status'=>'true'],200);
        }

    }
    public function insertOrUpdate($obj,$req){
        $obj->name = $req->title;
        $obj->slug = $req->slug ? $req->slug : str_replace(' ','_',trim(strtolower($req->title)));
        if($req->image) $obj->image_id =  Helpers::uploadImageToDb($req->image);
        $obj->save();
        return $obj;
    }
}
