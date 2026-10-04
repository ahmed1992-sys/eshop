@extends('Main_layout')
@section('title')
Edit Student
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
              <form role="form" action="{{ route('student.update',$data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">student Name</label>
                    <input autofocus type="text" class="form-control" id="name" name="name" value="{{ old('name',$data->name) }}">
                    @error('name')
<span style="color: red">{{$message}}</span>
                    @enderror
                  </div>
                        <div class="form-group">
                    <label for="name">phone number</label>
                    <input autofocus type="text" class="form-control" id="name" name="phone" value="{{ old('phone',$data->phone) }}">
                    @error('phone')
<span style="color: red">{{$message}}</span>
                    @enderror
                  </div>
                        <div class="form-group">
                    <label for="name">student address</label>
                    <input  type="text" class="form-control" id="name" name="address" value="{{ old('address',$data->address) }}">
                  </div>
    <div class="form-group">
                    <label for="name">Photo</label>
                    <img src="{{ asset('upload/'.$data->img) }}" alt="" style="width: 70px;height:70px">
                    <input  type="file" class="form-control" id="name" name="photo">
                  </div>
               <div class="form-group">
                    <label for="active">Activation Stutes </label>
<select name="active" id="active" class="form-control">
<option value="">Chooes A Stutes</option>
<option value="1" @if(old('active',$data->active)==1) selected @endif>Active</option>
<option value="0"@if(old('active',$data->active)==0 ) selected @endif >Not Active </option>
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
<option value="{{ $info->id }}" @if(old('country_id',$data->country_id==$info->id)) selected @endif >{{ $info->name }}</option>

@endforeach
@endif

</select>
             @error('country_id')
<span style="color: red">{{$message}}</span>
                    @enderror
                  </div>
                                <div class="form-group">
                    <label for="name">notes </label>
                    <input  type="text" class="form-control" id="name" name="nots" value="{{ old('nots',$data->nots) }}">
                                </div>
       <div class="form-group">
                    <label for="name">NationaltyID </label>
                    <input  type="text" class="form-control" id="name" name="nationalty_id" value="{{ old('nationalty_id',$data->nationalty_id) }}">
                        @error('nationalty_id')
<span style="color: red">{{$message}}</span>
                    @enderror
                  </div>
                                </div>

                <div class="form-group" style="text-align: center">
                  <button type="submit" class="btn btn-primary">update Student</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


@endsection
