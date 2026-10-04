<?php

namespace App\Http\Controllers;

use App\Http\Requests\createstudendrequest;
use App\Models\Countries;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function index(){
        ahmed_dev();
        $data=Students::all();
        if(!empty($data)){
            foreach($data as $info){
                $info->country_name=Countries::where('id','=',$info->country_id)->value('name');
            }
            return view('student.index',['data'=>$data]);
        }

    }
    public function create(){
$country=Countries::select('id', 'name')->where('active',1)->get();

        return view('student.Create',['country'=>$country]);
    }
    ///store fun
public function store(createstudendrequest $request){
    $counter=Students::where('nationalty_id','=',$request->nationalty_id)->count();
    if($counter>0){
        return redirect()->back()->with('erorr','عفوالرقم القومي مسجل من قبل')->withInput();
    }
    $filename=null;
  if($request->has('photo')){
$image=$request->photo;
$extension=strtolower($image->extension());
$filename=time().rand(1,100000).'.'.$extension;
$image->move('upload',$filename);
        }

    $data=[
        'name'=>$request->name,
        'phone'=>$request->phone,
        'address'=>$request->address,
        'active'=>$request->active,
        'country_id'=>$request->country_id,
          'img'=>$filename,
        'nots'=>$request->nots,
        'nationalty_id'=>$request->nationalty_id,

    ];
    Students::create($data);

   // session()->flash('message','Successfully Added');

return to_route('student.index')->with(['seccess'=>'added successfuly']);


}
public function edit($id){
$country=Countries::select('id', 'name')->where('active',1)->get();
$data=Students::find($id);
    if(empty($data)){

return to_route('student.index')->with(['erorr'=>'I dont have any data']);

    }
   return view('student.edit',['data'=>$data,'country'=>$country]);
}
public function update(createstudendrequest $request ,$id)
{
    $data=Students::find($id);
     if(empty($data)){

return to_route('student.index')->with(['erorr'=>'I dont have any data']);
}

     $filename=$data->img;
  if($request->has('photo')){
    $oldimage=$data->img;
$image=$request->photo;
$extension=strtolower($image->extension());
$filename=time().rand(1,100000).'.'.$extension;
$image->move('upload',$filename);
if(!empty( $oldimage)&& File::exists(public_path('upload/'.$oldimage))){
File::delete(public_path('upload/'.$oldimage));
}
        }

    $data->update([
        'name'=>$request->name,
        'phone'=>$request->phone,
        'address'=>$request->address,
        'active'=>$request->active,
        'country_id'=>$request->country_id,
          'img'=>$filename,
        'nots'=>$request->nots,
        'nationalty_id'=>$request->nationalty_id,

    ]);
return to_route('student.index')->with(['seccess'=>'updated successfuly']);
}
public function destroy($id){
     $data=Students::find($id);
    if(empty($data)){

return to_route('student.index')->with(['erorr'=>'I dont have any data']);
}
     $data->delete();

   // Courses::destroy($id);

return to_route('student.index')->with(['seccess'=>'deleted successfuly']);
}
public function ajax_search_student(Request $request){
    if($request->ajax()){
    $name=$request->name;
     $data=Students::where('name','like',"%{$name}%")->get();
       if(!empty($data)){
             foreach($data as $info){
                 $info->country_name=Countries::where('id','=',$info->country_id)->value('name');
             }
       }
 return view('student.ajax_search_student',['data'=>$data]);

     }
}

}


