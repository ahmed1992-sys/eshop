@extends('Main_layout')
@section('title')
Add  New Course
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
                <h3 class="card-title">New Course</h3>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('courses.store') }}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Course Name</label>
                    <input autofocus type="text" class="form-control" id="name" name="name">
                    @error('name')
<span style="color: red">{{$message}}</span>
                    @enderror
                  </div>
               <div class="form-group">
                    <label for="active">Activation Stutes </label>
<select name="active" id="active" class="form-control">
<option value="">Chooes A Stutes</option>
<option value="1" @if(old('active')==1) selected @endif>Active</option>
<option value="0"@if(old('active')==0 and old('active')!='') selected @endif >Not Active </option>


</select>
             @error('active')
<span style="color: red">{{$message}}</span>
                    @enderror
                  </div>

                <div class="form-group" style="text-align: center">
                  <button type="submit" class="btn btn-primary">ADD</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


@endsection
