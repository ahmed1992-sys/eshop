<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\posts;
use App\Http\Requests\CreatePostseRequest;
class PostController extends Controller
{
    //
    // public function show(){
    //      $skills=['php','javaScript','mysql','css'];
    //      $colors=['red','green','blue','yallow'];
    //     return view('test',['skills'=>$skills]);

    // }
   // public function create(){
// DB::statement("
//     CREATE TABLE posts (
//       name VARCHAR(255),
//       email VARCHAR(255),
//       phone VARCHAR(255),
//       message TEXT
//       )
// ");

   // }
   public function index(){
  //  $posts=DB::table('posts')->orderby('name','ASC')->get();//طريقه اخرى لجلب البيانات//
    $posts=posts::orderby('name','ASC')->get();
    return view('Posts',['posts'=>$posts]);
   }

   public function create(){
    return view('Create');
   }


  public function store(CreatePostseRequest $request){
    $request->validate(
        [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'message'=>'required',


        ]
    );
    //first way to insert
//     $dataToInsert=[
//         'name'=>$request->name,
//     'email'=>$request->email,
//     'phone'=>$request->phone,
//     'message'=>$request->message,

// ];
//posts::create($dataToInsert);

///////////////////////////second way to insert
// $dataToInsert['name']=$request->name;
// $dataToInsert['email']=$request->email;
// $dataToInsert['phone']=$request->phone;
// $dataToInsert['message']=$request->message;
//posts::create($dataToInsert);
////////theerd way to insert

$newData=new posts();
$newData->name=$request->name;
$newData->email=$request->email;
$newData->phone=$request->phone;
$newData->message=$request->message;
$newData->save();
session()->flash('message','Successfully Added');

return redirect()->route('posts.index');
//return to_route('posts.create');
   }

   public function show($id){
    $data=posts::find($id);
    return view('show',['data'=>$data]);
   }
public function edit($id){
       $data=posts::find($id);

    return view('edit',['data'=>$data]);
}
public function update(CreatePostseRequest $request ,$id){
      $request->validate(
        [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'message'=>'required',


        ]
    );
     $user=posts::find($id);
$user->update([
         'name'=>$request->name,
         'email'=>$request->email,
        'phone'=>$request->phone,
        'message'=>$request->message,
           ]);
    return to_route('posts.index');
}
//////////////////////////////
public function destroy($id){
$delet=posts::find($id);
$delet->delete();
   // posts::destroy($id);
    return to_route('posts.index');

}

   }



