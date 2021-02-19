<?php
namespace App\Http\Controllers\Backend;
use App\Helpers;
use App\Models\Backend\Instructor;
use Illuminate\Http\Request;
use App\Models\Backend\Training;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingRequest;
use App\Models\Backend\TrainingDate;
class TrainingController extends Controller
{
    public function index()
    {
        $alltraining = Training::all();
        return view('backend.training.index')->with('trainings',$alltraining);
    }
    public function create()
    {
        $allinstuctor = Instructor::all();
        return view('backend.training.create')->with('instructors',$allinstuctor);
    }
    public function store(Request $request)
    {
        try{
            DB::transaction(function ()use($request){
                $training = new Training();
                $insert = $training->create($this->setData($request));
                if($request->has('training_instructor')){
                    $instructor_id =[];
                    $instructor = (array) $request->training_instructor;
                        foreach ( array_slice($instructor, 0, 4) as $teacher ) {
                            $instructor_id[] =$teacher ? $teacher : null;
                        }
                        $instructor_ids = array_filter($instructor_id);
                        if(count($instructor)>0){
                            $insert->rel_instructor()->attach($instructor_ids);
                        }
                }
            });
        }catch (\PDOException $exception){
            dd($exception->getMessage());
        }
        return redirect()->route('trainings.index')->with('success','Trainings added successfully');
    }
    public function show(Training $training){}
    public function edit($id){
        $training = Training::find($id);
        $allinstuctor = Instructor::all();
        return view('backend.training.edit')->with('trainingDetail',$training)->with('instructors',$allinstuctor);
    }
       public function update(Request $request,$id)
    {
        try{
            DB::transaction(function ()use($request,$id){
                $training = Training::find($id);
                $update = $training->update($this->setData($request));
            });
        }catch (\PDOException $exception){
            dd($exception->getMessage());
        }
        return redirect()->route('trainings.index')->with('success','Training Updated Successfully');
    }
    public function destroy(Request $request, $id)
    {

    }
    public function changeStatus(Request $request)
    {

    }
    public function setData($request){

        $data=[
            'training_name'=>$request->training_name,
            'feature_video'=>$request->feature_video,
            'price'=>$request->price,
            'is_active'=>$request->is_active,
            'short_description'=>$request->short_description,
            'description'=>$request->description,
            'training_tags'=>$request->training_tags,
            'training_features'=>$request->features,
            'is_featured'=>$request->is_featured ? $request->is_featured:1
        ];
        if($request->has('feature_image')){
             $data['feature_image']= Helpers::uploadImageToDb($request->feature_image);
        }
        return $data;
    }
}
