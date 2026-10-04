@extends('Main_layout')
@section('title')
Detials Course
@endsection
@section('content')
   @if(Session::has('erorr'))
             <div class="alert alert-danger text-center w-25 m-auto" role="alert">  {{Session::get('erorr')}}</div>
                @endif
              </div>
 <!-- left column -->
          <div class="col-md-12 ">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header text-center">
                <h3 class="card-title ">Detials Course</h3>

              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body">
                     <table class="table table-striped table-bordered " dir="rtl">
               <thead>
    <tr class="text-center " >
    <th>Courses Name</th>
    <th>{{ $data->course_name }}</th>

    </tr>
     <tr class="text-center table-dark" >
    <th>Counter Students</th>
    <th>{{ $data->trinningStudents}}</th>

    </tr>
     <tr class="text-center " >
    <th>Courses price</th>
    <th>{{ $data->price }}</th>
    </tr>

<tr class="text-center table-dark" >
    <th>Start Course Date</th>
    <th>{{ $data->start_date}}</th>

    </tr>
     <tr class="text-center " >
    <th>End  Course Date </th>
    <th>{{ $data->end_date }}</th>
    </tr>
    <tr class="text-center " >
    <th> Notes</th>
    <th>{{ $data->notes }}</th>
    </tr>
    <tr class="table-dark">
        <td colspan="2" ><a href="{{ route('trinning.addstudenttotrinningcourse',$data->id) }}">
                       <button class="btn btn-success">Add Student To Course</button>
             </a></td>
    </tr>
</thead>


                     </table>
            </div>
            </div>
        </div>
            <!-- /.card -->
        <table class="table table-striped table-bordered " dir="rtl">
            @if(isset($trnning_course_booking) and !empty($trnning_course_booking) and count($trnning_course_booking)>0)
               <thead>
    <tr class="text-center " >
    <th>Student Name</th>

    <th>Start Date</th>
    <th>Date added </th>
      <th>Delete</th>
    </tr>
</thead>
<tbody>
@foreach ($trnning_course_booking as $info )


{{-- {{ dd($info->start_date) }} --}}


<tr class="text-center table-dark" >
  <td>{{ $info->studentName }}</td>

    <td>{{$info->start_date}}</td>
    <td>{{ $info->created_at }} </td>


         <td>
            <a href="{{ route('trinning.deletestudenttotrinningfromcourse',$info->id) }}">
                       <button class="btn btn-danger">delete</button>
             </a>
            </td>
    </tr>

@endforeach
</tbody>
@endif
                     </table>
@endsection

