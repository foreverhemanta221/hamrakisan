<?php

namespace App\Http\Controllers\Backend\Nepali;

use App\Models\Backend\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    public function getView($id){
        $data = ProductCategory::find($id);
        return view('backend.productcategory.nep_create')->with('item',$data);
    }
    public function translateData(Request $request,$id){
        $category = ProductCategory::find($id);
        $category->update([
           'nep_name'=>$request->title,
           'nep_description'=>$request->description,
        ]);
        return redirect()->route('productcategory.index')->with('success','Translated Successfully');
    }
}
