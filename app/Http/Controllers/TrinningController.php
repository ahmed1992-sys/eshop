<?php

namespace App\Http\Controllers;

use App\Http\Requests\createTrinningRequest;
use App\Http\Requests\Doaddstudenttocourse;
use App\Models\CourseDetails;
use App\Models\Courses;
use App\Models\Students;
use App\Models\Trinnig;
use Illuminate\Http\Request;

class TrinningController extends Controller
{
 public function index(){

        $data=Trinnig::all();
        if(!empty($data)){
            foreach($data as $info){
                $info->cours_name=Courses::where('id',$info->courses_id)->value('name');
            }
            return view('trinning.index',['data'=>$data]);

        }


    }
       public function create(){
$course=Courses::select('id', 'name')->where('active',1)->get();

        return view('trinning.create',['course'=>$course]);
    }
    public function store(createTrinningRequest $request){



    $data=[
        'courses_id'=>$request->courses_id,
        'price'=>$request->price,
        'start_date'=>$request->start_date,
        'end_date'=>$request->end_date,
        'notes'=>$request->notes,

    ];
    Trinnig::create($data);

   // session()->flash('message','Successfully Added');

return to_route('trinning.index')->with(['seccess'=>'added successfuly']);


}
public function edit($id){
$course=Courses::select('id', 'name')->where('active',1)->get();
$data=Trinnig::find($id);
    if(empty($data)){

return to_route('trinning.index')->with(['erorr'=>'I dont have any data']);

    }
   return view('trinning.edit',['data'=>$data,'course'=>$course]);
}
public function update(createTrinningRequest $request ,$id)
{
    $data=Trinnig::find($id);
     if(empty($data)){

return to_route('trinning.index')->with(['erorr'=>'I dont have any data']);
}




    $data->update([
         'courses_id'=>$request->courses_id,
        'price'=>$request->price,
        'start_date'=>$request->start_date,
        'end_date'=>$request->end_date,
        'notes'=>$request->notes,

    ]);
return to_route('trinning.index')->with(['seccess'=>'updated successfuly']);
}
public function destroy($id){
     $data=Trinnig::find($id);
    if(empty($data)){

return to_route('trinning.index')->with(['erorr'=>'I dont have any data']);
}
     $data->delete();

   // Courses::destroy($id);

return to_route('trinning.index')->with(['seccess'=>'deleted successfuly']);
}
public function details($id){
$data=Trinnig::find($id);
if(empty($data)){
    return to_route('trinning.index')->with(['erorr'=>'I dont have any data']);
}
$data->course_name=Courses::where('id',$data->courses_id)->value('name');
$data->trinningStudents=CourseDetails::where('trinning_courseID',$id)->count();
$trnning_course_booking=CourseDetails::select('*')->where('trinning_courseID',$id)->get();
//dd($trnning_course_booking);
if(!empty($trnning_course_booking)){
foreach($trnning_course_booking as $info){
    $info->studentName=Students::where('id',$info->studentID)->value('name');
}
}
return view('trinning.details',['data'=>$data,'trnning_course_booking'=>$trnning_course_booking]);
}
public function addstudenttotrinningcourse($id){
$data=Trinnig::find($id);
if(empty($data)){
    return to_route('trinning.index')->with(['erorr'=>'I dont have any data']);
}

$students=Students::select('id','name')->where('active',1)->get();

        return view('trinning.addstudenttocourse',['data'=>$data,'students'=>$students]);
    }






public function doaddstudenttotrinningcourse($id,Doaddstudenttocourse $request){
$data=Trinnig::find($id);
if(empty($data)){
    return to_route('trinning.index')->with(['erorr'=>'I dont have any data']);
}

$data->studentsCounter=CourseDetails::where('trinning_courseID',$id)->where('studentID',$request->studentID)->count();
if($data->studentsCounter>0){
        return to_route('trinning.details',$id)->with(['erorr'=>'عفوا الطالب مسجل من قبل']);

}
$countStudent=[
     'trinning_courseID' => $id,
    'studentID'=>$request->studentID,
    'start_date'=>$request->start_date,
];

CourseDetails::create($countStudent);

 return to_route('trinning.index')->with(['success'=>'تم اضافة الطالب بنجاح']);
}
public function deletestudenttotrinningfromcourse($id){
    $data=CourseDetails::find($id);
    if(!empty($data)){
$trinningId=$data->trinning_courseID;
        $data->delete();
        return to_route('trinning.details',$trinningId)->with(['success'=>'تم اضافة الطالب بنجاح']);

    }
return to_route('trinning.index')
        ->with(['erorr' => 'I dont have any data']);
}
}
