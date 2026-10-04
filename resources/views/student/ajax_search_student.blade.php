
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
