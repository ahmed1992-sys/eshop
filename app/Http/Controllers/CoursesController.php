<?php

namespace App\Http\Controllers;

use App\Http\Requests\create_coures_validation;
use App\Models\Courses;
use Illuminate\Http\Concerns\InteractsWithInput;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CoursesController extends Controller
{

 public function index(){
        $data=Courses::all();

        return view('courses.index',['data'=>$data]);
    }
 public function create(){


        return view('courses.Create_Courses');
    }
public function store(create_coures_validation $request){
    $counter=Courses::where('name','=',$request->name)->count();
    if($counter>0){
        return redirect()->back()->with('erorr','عفوا الاسم مسجل من قبل')->withInput();
    }
    $data=[
        'name'=>$request->name,
        'active'=>$request->active,
    ];
    Courses::create($data);

   // session()->flash('message','Successfully Added');

return to_route('courses.index')->with(['seccess'=>'added successfuly']);


}
public function edit($id){
    $data=Courses::find($id);
    if(empty($data)){

return to_route('courses.index')->with(['erorr'=>'I dont have any data']);

    }
    return view('courses.edit_courses',['data'=>$data]);
}
public function update(create_coures_validation $request ,$id){
    $data=Courses::find($id);
     if(empty($data)){

return to_route('courses.index')->with(['erorr'=>'I dont have any data']);
}

    $data->update([
        'name'=>$request->name,
        'active'=>$request->active,
    ]);
return to_route('courses.index')->with(['seccess'=>'updated successfuly']);
}
public function destroy($id){
     $data=Courses::find($id);
    if(empty($data)){

return to_route('courses.index')->with(['erorr'=>'I dont have any data']);
}
     $data->delete();

   // Courses::destroy($id);

return to_route('courses.index')->with(['seccess'=>'deleted successfuly']);
}
}
