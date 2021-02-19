<?php

namespace App\Http\Controllers\Backend\Websetting;

use App\Http\Requests\BannerRequest;
use App\Models\WebSetting\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::all();
        return view('backend.banner.index')->with('allbanner', $banner);
    }
    public function create()
    {
        return view('backend.banner.create');
    }

    public function store(BannerRequest $request)
    {
        $banner = new Banner();
        $team = $this->insertOrUpdate($banner,$request);
        return redirect()->route('banner.store')->with('success', 'Member Added Successfully');
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
        $team_detail = Banner::find($id);
        return view('backend.banner.create')->with('team', $team_detail);
    }

    public function update(Request $request, $id)
    {
        $team = Banner::find($id);
        $team = $this->insertOrUpdate($team,$request);
        return redirect()->route('banner.index')->with('success','Team updated successfully');
    }

    public function destroy(Request $request,  $id)
    {
        if($request->ajax()){

            $delete = Banner::find($id)->delete();
            $request->session()->flash('success', 'image successfully deleted.');
            return response()->json(['status'=>true]);
        }
    }
    public function insertOrUpdate($team,$request){
        $team->url = $request->url;
        $team->image_id =  Helpers::uploadImageToDb($request->image,Auth::user()->id);
        $team->save();
    }
}
