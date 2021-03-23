<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers;
use Throwable;

use function GuzzleHttp\Psr7\str;
class CategoryController extends Controller
{
    public function index()
    {

        $category = Category::all();

        return view('backend.category.index')->with('allcategory',$category);
    }

    public function create()
    {
        return view('backend.category.create');
    }
    public function store(CategoryRequest $request)
    {
        $this->validate($request,[
            'image' => 'mimes:jpeg,jpg,png,gif|max:1024'
        ]);
        try{
            DB::transaction(function () use($request){
                $category = new Category();
                $category->title = $request->title;
                $category->slug = $request->has('slug')? $request->slug : str_replace(' ','_',$request->title);
                $category->featured = $request->feature;
                $category->image_id = Helpers::uploadImageToDb($request->image,Auth::user()->id);
                $category->save();
            });
            return redirect()->route('category.index')->with('success','Category inserted successfully');
        }catch (\PDOException $e){
            dd($e);
        }
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit')->with('category',$category);
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->title = $request->title;
        $category->slug = $request->has('slug')? $request->slug : str_replace(' ','_',$request->title);
        $category->featured = $request->feature;
        if($request->image){
            $category->image_id = Helpers::uploadImageToDb($request->image);
        }
        $category->save();
        return redirect()->route('category.index')->with('success','Category Updated Successfully');
    }

    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            try{
                $category = Category::find($id);
                //listing
                
                
                // $category delete
                if($category->delete()){
                
                    if($category->image()->count() > 0){
                        $image_id = $category->image->id;
                        if($image_id!=null){
                            Helpers::delete_image_byId($image_id);
                        }
                    }
                    if($category->listings()->count()>0){
                            $category->listings()->delete();
                        }

                    $request->session()->flash('success', 'image successfully deleted.');
                    return response()->json(['status' => true]);
                }

            }catch(Throwable $th){
                $request->session()->flash('danger', $th->getMessage());
                return response()->json(['status' => false]);
            }
            
        }
    }
}
