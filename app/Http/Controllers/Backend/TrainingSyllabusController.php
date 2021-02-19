<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Training;
use Illuminate\Http\Request;

class TrainingSyllabusController extends Controller
{

    public function index($training_id)
    {
        $trining = Training::findOrFail($training_id);
        return view('backend.training.syllabus.index')->with('trainingDetail',$trining);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($training_id)
    {
        $trining = Training::findOrFail($training_id);
        return view('backend.training.syllabus.create')->with('trainingDetail',$trining);
    }

    public function store(Request $request,$training_id)
    {
        $training = Training::findOrFail($training_id);
        $store = $training->rel_syllabus()->create($request->all());
        return redirect()->route('syllabus.index',$training_id)->with('success','Training Syllabus Inserted');

    }

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
