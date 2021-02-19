<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\VendorRequest;
use App\Models\Backend\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Helpers;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::all();
        return view('backend.vendor.index')->with('allvendor',$vendors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorRequest $request)
    {
        try{
            DB::transaction(function() use($request){
                $data = $this->setData($request);
                $vendor = Vendor::create($data);
            });
        }catch (\PDOException $exception){
            return redirect()->route('vendor.index')->with('danger',$exception->getMessage());
        }
        return redirect()->route('vendor.index')->with('success','Vendors Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor = Vendor::find($id);
        return view('backend.vendor.edit')->with('vendorDetail',$vendor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VendorRequest $request, $id)
    {
        try{
            DB::transaction(function() use($request,$id){
                $data = $this->setData($request);
                $vendor =  Vendor::find($id)->update($data);
            });
        }catch (\PDOException $exception){
            return redirect()->route('vendor.index')->with('danger',$exception->getMessage());
        }
        return redirect()->route('vendor.index')->with('success','Vendors Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, $id)
    {
        if($request->ajax()){
            $vendor = Vendor::findOrFail($id);
            $vendor->delete();
            $request->session()->put('success','Vendor deleted successfully.');
            return  response()->json(['data'=>'sucess'],200);
        }

    }

    public function setData($request){

        $data = [
            'name'=>$request->title,
            'address'=>$request->address,
            'email'=>$request->email,
            'cp_name'=>$request->cp_name,
            'cp_phone'=>$request->cp_phone,
            'description'=>$request->description
        ];
        return $data;

    }
}
