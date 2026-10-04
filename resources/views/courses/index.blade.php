@extends('Main_layout')
@section('title')
Courses
@endsection
@section('content')
   <!-- /.row -->

          <div class="col-12" style="background-color:white;padding:10px">
            <div class="card">
              <div class="card-header">

                <h3 class="card-title" style="text-align:center;float:none">Courses Data</h3>

     <a href="{{ route('courses.create') }}">
                       <button class="btn btn-info">New Add</button>
              </a>
               @if(Session::has('erorr'))
             <div class="alert alert-danger text-center w-25 m-auto" role="alert">  {{Session::get('erorr')}}</div>
                @endif

                 @if(Session::has('seccess'))
             <div class="alert alert-success text-center w-25 m-auto" role="alert">  {{Session::get('seccess')}}</div>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                @if(@isset($data) and @!empty($data))
                <table class="table table-striped table-bordered " dir="rtl">
<thead>
    <tr class="text-center table-dark" >
    <th>Courses Name</th>
    <th>Actvitation Stutes</th>
        <th>Created_At</th>
        <th>Update_At</th>

    <th>Controller</th>
    </tr>
</thead>


                  <tbody>
                    @foreach ($data as $info )
                <tr>
                      <td>{{ $info->name }}</td>
                      <td>
                    @if ($info->active==1)
                           Activation
                    @else
                             NotActivation
                      @endif
                    </td>
                     <td>{{ $info->created_at }}</td>

                     <td>{{ $info->updated_at }}</td>
                     <td>
                       <a href="{{ route('courses.edit',$info->id) }}">
                       <button class="btn btn-success">Edit</button>
             </a>
               <a href="{{ route('courses.delete',$info->id) }}">
                 <button class="btn btn-danger">Delete</button>
               </a>
                </tr>
                    @endforeach


                  </tbody>
                </table>
                @else
                <h2 style="color: red;text-align:center">I Have't Data To Display</h2>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

@endsection
