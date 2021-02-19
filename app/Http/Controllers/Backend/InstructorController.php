<?php
namespace App\Http\Controllers\Backend;
use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\InstructorRequest;
use App\Models\Backend\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class InstructorController extends Controller
{
    public function index()
    {
        $instructor = Instructor::all();
        return view('backend.training.instructor.index')->with('allinstructor',$instructor);
    }
    public function create()
    {
        return view('backend.training.instructor.create');
    }
    public function store(InstructorRequest $request)
    {
        try{
            DB::transaction(function ()use($request){
                $instructor = new Instructor();
                $instructor->create($this->setData($request));
            });
        }catch (\PDOException $e){
            dd($e->getMessage());
        }
        return  redirect()->route('trainings-instructor.index')->with('success','Instructor has been added successfully');
    }
    public function edit($id)
    {
        $instructor = Instructor::find($id);
        return view('backend.training.instructor.edit')->with('instructorDetail',$instructor);
    }
    public function update(InstructorRequest $request, $id)
    {
        try{
            DB::transaction(function ()use($request,$id){
                $instructor = Instructor::findOrFail($id);
                $instructor->update($this->setData($request));
            });
        }catch (\PDOException $e){
            return redirect()->route('trainings-instructor.index')->with('danger',$e->getMessage());
        }
        return redirect()->route('trainings-instructor.index')->with('success','Instructor Detail Updated Successsfully');


    }
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $instructor =   Instructor::findOrFail($id);
            if($instructor->delete()){
                Helpers::delete_image_byId($instructor->instructor_image);
                return response()->json(['status'=>true],200);
            }
        }
    }
    public function setData($request){
        $social_datail=[
          'facebook'=>$request->instructor_facebook_detail ? $request->instructor_facebook_detail :'#',
          'twitter'=>$request->instructor_twitter_detail ? $request->instructor_twitter_detail :'#',
          'instagram'=>$request->instructor_instagram_detail ? $request->instructor_instagram_detail :'#',
        ];
        $data=[
            'instructor_name'=>$request->instructor_name,
            'instructor_profession'=>$request->instructor_profession,
            'instructor_detail'=>$request->instructor_detail,
            'instructor_social_site_detail'=>json_encode($social_datail)
        ];
        if($request->has('instructor_image')){
            $data['instructor_image']=Helpers::uploadImageToDb($request->instructor_image);
        }
        return $data;
    }
}
