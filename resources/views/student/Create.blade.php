@extends('Main_layout')
@section('title')
Add  Student
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
              <form role="form" action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">student Name</label>
                    <input autofocus type="text" class="form-control" id="name" name="name">
                    @error('name')
<span style="color: red">{{$message}}</span>
                    @enderror
                  </div>
                        <div class="form-group">
                    <label for="name">phone number</label>
                    <input autofocus type="text" class="form-control" id="name" name="phone">
                    @error('phone')
<span style="color: red">{{$message}}</span>
                    @enderror
                  </div>
                        <div class="form-group">
                    <label for="name">student address</label>
                    <input  type="text" class="form-control" id="name" name="address">
                  </div>
    <div class="form-group">
                    <label for="name">Photo</label>
                    <input  type="file" class="form-control" id="name" name="photo">
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

                   <div class="form-group">
                    <label for="active"> Country </label>
<select name="country_id" id="countr" class="form-control">
<option value="">Chooes your Country</option>
@if(!empty($country))
@foreach ($country as $info )
<option value="{{ $info->id }}" >{{ $info->name }}</option>

@endforeach
@endif

</select>
             @error('country_id')
<span style="color: red">{{$message}}</span>
                    @enderror
                  </div>
                                <div class="form-group">
                    <label for="name">notes </label>
                    <input  type="text" class="form-control" id="name" name="nots">
                                </div>
       <div class="form-group">
                    <label for="name">NationaltyID </label>
                    <input  type="text" class="form-control" id="name" name="nationalty_id">
                        @error('nationalty_id')
<span style="color: red">{{$message}}</span>
                    @enderror
                  </div>
                                </div>

                <div class="form-group" style="text-align: center">
                  <button type="submit" class="btn btn-primary">ADD Student</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


@endsection
