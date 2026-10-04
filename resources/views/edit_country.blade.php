<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>


 <form action="{{ route('country.update',$data->id) }}" method="post">

    @csrf
         @method('put')

    <div class="mb-3">
    <label for="exampleInputUsercountry1" class="form-label">Username</label>
    <input type="text" name='country' class="form-control" id="exampleInputUsercountry1" aria-describedby="country" value="{{ $data->name }}">
@error('country')
        <div  class="form-text text-danger" >{{$message}}</div>

    @enderror




  <button type="submit" class="btn btn-primary">update</button>
</form>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
