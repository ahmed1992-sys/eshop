<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="">Informtion Country
     </h1>





<table class="table table-striped table-bordered ">
<thead>
    <tr class="text-center table-dark" >
    <th>Country Name</th>
    <th>Date&Time_Added</th>

    <th>Controll</th>
    </tr>
</thead>

<tbody>


<tr class="text-center">
    <td>{{$data->name}}</td>

     <td>{{$data->created_at}}</td>
    <td>
              <a href="{{ route('country.index',) }}">
        <button class="btn btn-success">back</button>
             </a>

    </td>
    </tr>

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
