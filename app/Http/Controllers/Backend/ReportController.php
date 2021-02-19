<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Listing;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
//    public $request;
//    public function __construct(Request $request)
//    {
//        $this->request = $request;
//    }

    public function getFarmerReportView(){
        $categories = Category::all();
        return view('backend.report.farm')->with('allcategories',$categories);
    }
    public function generateFarmReport(Request $request){
//        dd($request->all());
        $params['province']= $request->province;
        $params['district']= $request->district;
        $params['category']= $request->category;
        $items = Listing::where(function ($query) use($params){
            //if province !=null
            if(($params['district']!=null || $params['province']!=null) && $params['category']==null ){
                $query->addressSearch($params);
            }elseif($params['district']==null && $params['province']==null && $params['category']==null ){
                $query->get();
            }
            else{
                $query->whereHas('categories',function ($q)use($params){
                    $q->where('slug',$params['category']);
                });
            }


        })->get();
      $pdf=   PDF::loadview('backend.report.pdfreport.farm',compact(['items','params']));
        return $pdf->stream('report.pdf');

    }


}
