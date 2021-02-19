<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;

use App\Models\Forms\LoanRequestForm;
use Illuminate\Http\Request;

class LoanRequestFormController extends Controller
{

    public function index()
    {


        $allLoanRequest = LoanRequestForm::all();
        return view('backend.form.loanrequest.index')->with('farmlist',$allLoanRequest);
    }

    public function create()
    {
        return view('frontend.forms.loan');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
           'email'=>'required|unique:loan_request_forms,email'
        ]);
        LoanRequestForm::create($request->all());
        return redirect('thankyou');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $formDeatil =  LoanRequestForm::findOrFail($id);
        return view('backend.form.loanrequest.show')->with('loanDetail',$formDeatil);

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
        LoanRequestForm::findOrFail($id)->update($request->all());
        return redirect()->route('loanrequest.index')->with('success','Updated Successfully');
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
            LoanRequestForm::findOrFail($id);
            $request->session()->put('Loan report delete successfully');
        }
    }
}
