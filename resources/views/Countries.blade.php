<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <h1>
        <a href="{{route('country.create')}}">
        <button class="btn btn-secondary">Add</button>
    </a></h1>
    @if(session()->has('message'))
<h1 id="messageSuccess" class="alert alert-success text-center w-25 mx-auto ">{{session('message')}}</h1>
@endif
<table class="table table-striped table-bordered " dir="rtl">
<thead>
    <tr class="text-center table-dark" >
    <th>Country Name</th>
    <th>Destination</th>
        <th>Countries</th>
        <th>Bloges</th>

    <th>Date&Time_Added</th>

    <th>Controll</th>
    </tr>
</thead>

<tbody>
    @foreach ($data as $data )

<tr class="text-end" >

    <td>{{$data->name}}</td>

  <td>  @if(!empty($data->destination))
{{$data->destination->destination}}
@endif
</td>
 <td>  @if(!empty($data->destination->recountry))
{{$data->destination->recountry->name}}
@endif
</td>
<td>

                @if(!empty($data->booking))
                    @foreach($data->booking as $book)
                      {{ $book->travel_name}} <br>
                         {{ $book->flight->name }} <br>
                    @endforeach
                @endif


</td>
     <td>{{$data->created_at}}</td>
    <td class="text-end">
        @if($data->trashed())
        <button class="btn btn-success" disabled>Edit</button>

                 <button class="btn btn-primary" disabled>Show</button>

        @else
              <a href="{{ route('country.edit',$data->id) }}">
        <button class="btn btn-success">Edit</button>
             </a>
              <a href="{{ route('country.show',$data->id) }}">
                 <button class="btn btn-primary">Show</button>
           </a>
           @endif
            @if($data->deleted_at!=null)
               <a href="{{ route('country.deleted',$data->id) }}">
                 <button class="btn btn-danger">End Delete</button>
           </a>
           @endif
               @if($data->deleted_at==null)
           <form action="{{  route('country.destroy',$data->id) }} " class="d-inline" method="POST">
              @csrf
            @method('delete')

        <button class="btn btn-warning">Soft Delete</button>
    </form>
        @endif

    @if($data->deleted_at!=null)
         <a href="{{ route('country.restore',$data->id) }}">
                 <button class="btn btn-danger">Cancel Deleted</button>
           </a>
    @endif
    </td>
    </tr>
    @endforeach

</tbody>
</table>
{{-- {{ $posts->links() }} --}}
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script>

    setTimeout(function() {
document.getElementById('messageSuccess').style.display='none';
    }, 3000);
</script>
</body>
</html>
