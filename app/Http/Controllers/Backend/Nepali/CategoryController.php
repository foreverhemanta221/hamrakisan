<?php

namespace App\Http\Controllers\Backend\Nepali;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function getView($id){
        $category = Category::find($id);
        return view('backend.category.nep_create')->with('category',$category);
    }
    public function translateData(Request $request , $id){
        $category = Category::find($id)->update([
           'nep_title'=>$request->title,
            'nep_description'=>$request->description,
        ]);
       return redirect()->route('category.index')->with('success','Category Name Tranlsate in Nepali');
    }
}
