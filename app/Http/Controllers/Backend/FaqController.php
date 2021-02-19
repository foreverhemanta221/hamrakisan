<?php

namespace App\Http\Controllers\Backend;

use App\Backend\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\DeclareDeclare;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::all();
        return  view('backend.faq.index')->with('allfaq',$faqs);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('backend.faq.create');
    }



    public function store(Request $request)
    {
        $this->validate($request,[
                'question'=>'required|string|max:255',
                'answer'=>'required'
        ]);
        Faq::create($this->setData($request));
        return redirect()->route('faqs.index')->with('success','FAQ entered successfully');
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
    public function setData($request){
        $data = [
            'question'=> $request->question,
            'answer'=> $request->answer,
        ];
        return $data;
    }
}
