@extends('Main_layout')
@section('title')
Update Course
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
                <h3 class="card-title">Update Course</h3>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('trinning.update',$data->id) }}" method="post" >
                @csrf
                <div class="card-body">
                                       <div class="form-group">
                    <label for="courses_id "> Course Name </label>
<select name="courses_id" id="courses_id " class="form-control">
<option value="">Chooes your Course</option>
@if(!empty($course))
@foreach ($course as $info )
<option value="{{ $info->id }}" @if(old('courses_id',$data->courses_id==$info->id)) selected @endif >{{ $info->name }}</option>

@endforeach
@endif
</select>
            @error('courses_id')
<span style="color: red">{{$message}}</span>
                    @enderror
                  </div>

              <div class="form-group">
                    <label for="price">Course Price</label>
                    <input  type="number" class="form-control" id="price" name="price" value="{{ old('price',$data->price*1) }}">
                    @error('price')
<span style="color: red">{{$message}}</span>
                    @enderror
                  </div>
                        <div class="form-group">
                    <label for="start_date">Start Course date</label>
                    <input  type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date',$data->start_date) }}">
                    @error('start_date')
<span style="color: red">{{$message}}</span>
                    @enderror
                  </div>
                           <div class="form-group">
                    <label for="end_date">End Course date</label>
                    <input  type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date',$data->end_date) }}">
                    @error('end_date')
<span style="color: red">{{$message}}</span>
                    @enderror
                  </div>

                                <div class="form-group">
                    <label for="name">notes </label>
                    <input  type="text" class="form-control" id="name" name="notes" value="{{ old('end_date',$data->notes) }}">
                                </div>


                <div class="form-group" style="text-align: center">
                  <button type="submit" class="btn btn-primary">update Booking Course</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


@endsection

