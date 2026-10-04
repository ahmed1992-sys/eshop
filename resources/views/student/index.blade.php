@extends('Main_layout')
@section('title')
Student Data
@endsection
@section('content')
   <!-- /.row -->

          <div class="col-12 " style="background-color:white;padding:10px">
            <div class="card">
              <div class="card-header">

                <h3 class="card-title" style="text-align:center;float:none">Student Data</h3>
<a href="{{ route('ar') }}">ar</a>
<a href="{{ route('en') }}">en</a>
     <a href="{{ route('student.create') }}">

        <button class="btn btn-info" style="margin-right:1000px">{{ __('mycustm.ADDNEW') }} </button>
              </a>
              <div class="col-md-3 text-center">
                <label for="searchByName">search about students</label>
                <input type="text" id="searchByName" placeholder="search about students"  class="form-control" name="search">
              </div>
               @if(Session::has('erorr'))
             <div class="alert alert-danger text-center w-25 m-auto" role="alert">  {{Session::get('erorr')}}</div>
                @endif

                 @if(Session::has('seccess'))
             <div class="alert alert-success text-center w-25 m-auto" role="alert">  {{Session::get('seccess')}}</div>
                @endif
              </div>
              <!-- /.card-header -->

              <div class="card-body table-responsive p-0" id="ajax_responce_div">
                @if(@isset($data) and @!empty($data))
                <table class="table table-striped table-bordered " dir="rtl">
<thead>
    <tr class="text-center table-dark" >
    <th>Student Name</th>
    <th>Phone</th>
        <th>Address</th>
        <th>Img</th>
        <th>Active</th>
        <th>Country</th>
        <th>Nots</th>
        <th>NationaltyTD</th>
        <th>Created_at</th>
        <th>Updated_At</th>
    <th>Controller</th>
    </tr>
</thead>


                  <tbody>
                    @foreach ($data as $info )
                <tr class="text-end">
                      <td>{{ $info->name }}</td>
                                            <td>{{ $info->phone }}</td>
                      <td>{{ $info->address }}</td>
                      <td><img src="{{ asset('upload/'.$info->img) }}" style="width: 70px;height:70px"></td>

                      <td>
                    @if ($info->active==1)
                           Activation
                    @else
                             NotActivation
                      @endif
                    </td>
                  <td>  {{ $info->country_name }}</td>
 <td>{{ $info->nots }}</td>
<td>{{ $info->nationalty_id }}</td>
                     <td>{{ $info->created_at }}</td>

                     <td>{{ $info->updated_at }}</td>

                     <td class="text-end">
                       <a href="{{ route('student.edit',$info->id) }}">
                       <button class="btn btn-success me-1">Edit</button><br class="me-1 p-0"><br>
             </a>
               <a href="{{ route('student.deleted',$info->id) }}">
                 <button class="btn btn-danger">Delete</button>
                </a>
                     </td>
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
@section('scripts')
<script>
$(document).ready(function(){
  $(document).on('input',"#searchByName",function(e){
 var name=$(this).val();
// console.log(name);
//alert(name);

    jQuery.ajax({
        url:'{{ route('student.ajax_search_student') }}',
    type:'post',
    dataType:'html',
    cache:false,
    data:{'_token':'{{ csrf_token() }}',name:name},
    success:function(data){
$('#ajax_responce_div').html(data);
    },
    error:function(){

    },
})





  })




})
</script>

@endsection
