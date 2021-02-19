<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\FarmStoriesRequest;
use App\Models\FarmStory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers;

class FarmStoriesController extends Controller
{

    public function index()
    {
        $farm_stories = FarmStory::all();
        return view('backend.success-story.index')->with('farm_stories',$farm_stories);
    }

    public function create()
    {
        return view('backend.success-story.create');
    }


    public function store(FarmStoriesRequest $request)
    {
        $farmStory = new FarmStory();
        $farmStory = $this->insertOrUpdate($farmStory,$request);
        return redirect()->route('farmstory.index')->with('success','Story Added Successfully');
    }




    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $category = FarmStory::find($id);
            if($category->delete()){
                $request->session()->flash('success', 'image successfully deleted.');
                return response()->json(['status' => true]);
            }
            $request->session()->flash('danger', 'Something went wrong.');
            return response()->json(['status' => true]);
        }
    }

    public function insertOrUpdate($obj,$req){
        $obj->title = $req->title;
        $obj->video = $req->url;
        $obj->image_id = Helpers::uploadImageToDb($req->image,Auth::user()->id);
        $obj->save();
    }
}
