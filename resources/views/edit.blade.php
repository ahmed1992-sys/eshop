<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>


 <form action="{{ route('posts.update',$data->id) }}" method="post">

    @csrf
         @method('put')

    <div class="mb-3">
    <label for="exampleInputUsername1" class="form-label">Username</label>
    <input type="text" name='name' class="form-control" id="exampleInputUsername1" aria-describedby="Username" value="{{ $data->name }}">
@error('name')
        <div id="emailHelp" class="form-text text-danger" >{{$message}}</div>

    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->email }}">
@error('email')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>

    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPhohe1" class="form-label">Phohe </label>
    <input type="number"name='phone' class="form-control" id="exampleInputPhohe1" aria-describedby="Phohe" value="{{ $data->phone }}">
    @error('phone')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>

    @enderror

  </div>
  <div class="mb-3">
    <label for="exampleInputMessage1" class="form-label">Message </label>
    <input type="text" name='message' class="form-control" id="exampleInputMessage1" aria-describedby="Message" value="{{ $data->message }}">
@error('message')
        <div id="emailHelp" class="form-text text-danger">{{$message}}</div>

    @enderror
  </div>

  <button type="submit" class="btn btn-primary">update</button>
</form>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
