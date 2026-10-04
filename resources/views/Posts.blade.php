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

        <a href="{{route('posts.create')}}">
        <button class="btn btn-secondary">Add</button>
    </a></h1>
    <a href="{{ route('logout') }}" style="direction: rtl">
      <button type="submit" class="btn btn-danger">
        Logout
    </button>
    </a>


{{-- <form action="{{ route('logout') }}" method="POST">//طريق ارسال الوج اوت من خلال بوست لكن يجب ان يكون الروت بوست route::post
    @csrf
 <button type="submit" class="btn btn-danger">
        Logout
    </button>
</form> --}}
    @if(session()->has('message'))


    <div id="messageSuccess" class="alert alert-success text-center w-25 mx-auto ">{{ session('message') }}</div>
    @endif
<table class="table table-striped table-bordered ">
<thead>
    <tr class="text-center table-dark" >
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Message</th>

    <th>Controll</th>
    </tr>
</thead>

<tbody>
    @foreach ($posts as $post )

<tr>
    <th>{{$post->name}}</th>
    <th>{{$post->email}}</th>
    <th>{{$post->phone}}</th>
    <th>{{$post->message}}</th>
    <th>
             <a href="{{ route('posts.edit',$post->id) }}">
        <button class="btn btn-success">Eide</button>
             </a>
              <a href="{{ route('posts.show',$post->id) }}">
                 <button class="btn btn-primary">show</button>
           </a>
           <form action="{{  route('posts.destroy',$post->id) }} " class="d-inline" method="POST">
@csrf
            @method('delete')

        <button class="btn btn-danger">Delete</button>
    </form>
    </th>
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
