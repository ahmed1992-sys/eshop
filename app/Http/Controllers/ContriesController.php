<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use Faker\Extension\CountryExtension;
use Illuminate\Http\Request;

class ContriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data=Countries::find(5);
        // var_dump($data);
        // die();
//$data=Countries::withTrashed()->whereIN('id',[1,2])->orWhere('active',1)->active()->get();
//$sum=Countries::withTrashed()->where('active',1)->sum('active');
//$count=Countries::where('active',1)->count('active');
       $data=Countries::withTrashed()->with('destination')->with('booking')->active()->get();

        
        return view('Countries',['data'=>$data]) ;
        //return $sum;
               // return $count;


    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
return view('Createcountry');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $request->validate(['country'=>'required']);
      $data_Country=[
    'name'=>$request->country,
          ];
Countries::create($data_Country);
session()->flash('message','Add Successfuly');
return to_route('country.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $data=Countries::find($id);
return view('show_country',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

               $data=Countries::findOrFail($id);
    // if(empty($data)){
    //   return to_route('country.index');

    // }
        return view('edit_country',['data'=>$data]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)

    {


            $request->validate(['country'=>'required']);

                     $data=Countries::find($id);

                       $data->update(['name'=>$request->country]);

             return to_route('country.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)

    {
               Countries::where('id','=',$id)->delete();
                     return to_route('country.index');

    }
      public function delete( $id)

    {
               Countries::where('id','=',$id)->forceDelete();

            return to_route('country.index');

    }
    public function restore( $id)

    {
               Countries::where('id','=',$id)->restore();

            return to_route('country.index');

    }
}
