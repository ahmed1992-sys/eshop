@extends('Main_layout')
@section('title')
Add  Student to Course
@endsection
@section('content')
     @if(Session::has('erorr'))
             <div class="alert alert-danger text-center w-25 m-auto" role="alert">  {{Session::get('erorr')}}</div>
                @endif
              </div>
 <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add  Student to Course</h3>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('trinning.doaddstudenttotrinningcourse',$data->id) }}" method="post">
                @csrf
                <div class="card-body">

               <div class="form-group">
                    <label for="active">  students </label>
<select name="studentID" id="studentID" class="form-control">
<option value="">Chooes A Stutes</option>
@if(!empty($students))
@foreach ($students as $info )
<option value="{{ $info->id }}" @if(old('studentID')==$info->id) selected @endif>{{ $info->name }}</option>

@endforeach
@endif

</select>
             @error('studentID')
<span style="color: red">{{$message}}</span>
                    @enderror
                  </div>
 <div class="mb-3">
    <label for="start_date" class="form-label">Username</label>
    <input type="date" name='start_date' class="form-control"  id="start_date" aria-describedby="start_date" value="{{ $data->start_date }}">
@error('start_date')
        <div  class="form-text text-danger" >{{$message}}</div>

    @enderror



                <div class="form-group" style="text-align: center">
                  <button type="submit" class="btn btn-primary">ADD</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


@endsection
