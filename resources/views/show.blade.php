<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>

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


<tr>
    <th>{{$data->name}}</th>
    <th>{{$data->email}}</th>
    <th>{{$data->phone}}</th>
    <th>{{$data->message}}</th>
    <th>

              <a href="{{ route('posts.index') }}">
                 <button class="btn btn-primary">back</button>
           </a>

    </th>
    </tr>

</tbody>
</table>
