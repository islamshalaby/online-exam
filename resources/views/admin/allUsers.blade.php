@extends('layouts.app')

@section('content')


<div class="container">
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">User Type</th>
      <th scope="col">Edit User</th>


    </tr>
  </thead>
  <tbody>

  @foreach($user as $myUser)

    <tr>
      <th >{{$myUser->id}}</th>
      <th>{{$myUser->name}}</td>
      <th>{{$myUser->email}}</td>
      <th>{{$myUser->type_name}}</td>

      <td> <a href="/admin/{{$myUser->id}}/edit" class="btn btn-primary">Edit</a> </td>



    
    </tr>
    @endforeach
  </tbody>
</table>

</div>
@endsection