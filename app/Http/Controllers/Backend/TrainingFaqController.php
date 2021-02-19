<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Training;
use App\Models\Backend\TrainingFaq;
use Illuminate\Http\Request;

class TrainingFaqController extends Controller
{


    public function index($training)
    {
      $faqs =  Training::find($training)->rel_faq;
      return view('backend.training.faq.index')->with('allfaq',$faqs)->with('trainingDetail',Training::find($training));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($training)
    {
        $training = Training::find($training);
        return view('backend.training.faq.create')->with('trainingDetail',$training);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$training)
    {
        $faq = new TrainingFaq();
        $faq->question = $request->training_question;
        $faq->answer=$request->training_answer;
        $faq->training_id = $training;
        $faq->save();


       return redirect()->route('faq.index',$training)->with('success','FAQ added successfully');
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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
    public function setData($request){
        $data=[
          'question'=>$request->training_question,
          'answer'=>$request->training_answer
        ];
    }
}
