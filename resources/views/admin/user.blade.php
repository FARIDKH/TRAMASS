@extends('admin.admin')

@section('content')
    <div class="container">
      <h1>Crud Grid</h1>
      <div class="col-md-8">
        <table class="table table-bordered">
          <tr>
            <th>Id</th>
            <th>Name Surname</th>
            <th>City</th>
            <th>Products</th>
            <th>Type</th>
            <th>UserDelete</th>
          </tr>
          @foreach($users as $user)

          <tr>
            <td>
                {{$user->id}}
            </td>
            <td>
              {{$user->name}} {{$user->surname}}
            </td>
            <td>
              {{$user->city_id}}
            </td>
            <td>
            <a href="/user_product/{{$user->id}}">BAX</a>
            </td>
            <td>
              {{$user->type}}
            </td>
            <td>
               <a href="/user_delete/{{$user->id}}">delete</a>
            </td>
            </tr>
          @endforeach

        </table>
      </div>
      <a href="/" class="btn btn-primary" type="button" >Back To index</a>
    </div>
@stop
