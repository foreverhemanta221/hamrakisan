<?php
namespace App\Http\Controllers\Forms;
use App\Http\Requests\Forms\FarmListFormRequest;
use App\Models\Forms\FarmListForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class FarmListFormController extends Controller
{
    public function index()
    {
        $allFarmRequestForm  = FarmListForm::all();
        return view('backend.form.farmlist.index')->with('farmlist',$allFarmRequestForm);
    }
    public function store(FarmListFormRequest $request)
    {
        $farmInsert = FarmListForm::create($request->all());
        return view('frontend.thankyou');
    }
    public function show($id)
    {
        $getFarmListDetail =  FarmListForm::find($id);
        $getFarmListDetail->status = 1;
        $getFarmListDetail->save();
        return view('backend.form.farmlist.show')->with('farmdetail',$getFarmListDetail);
    }
    public function update(Request $request, $id)
    {
       FarmListForm::find($id)->update($request->all());
       return redirect()->route('farmlistrequest.index')->with('success','Updated successfully');
    }
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            if(FarmListForm::find($id)->delete()){
                $request->session()->flash('success', 'Delete Successfully');
                return response()->json(['status' => true]);
            }
            $request->session()->flash('danger', 'Something went wrong');
            return response()->json(['status' => true]);
        }
        abort(404);
    }
}
