@extends('admin.admin')

@section('content')
	<div class="container">
      <h1>Constants</h1>
      <div class="col-md-8">
        <h3>Create Constants</h3>
        <form class="form-group" action="/create_constant" method="post">
          {{ csrf_field() }}
          <input type="text" name="title" class="form-control"><br>
          <input type="submit" class="btn btn-success" name="submit" value="CREATE">
        </form>
        <table class="table table-bordered">
            <tr>
              <th>Id</th>
              <th>Category Name</th>
            </tr>

            @foreach($constants as $constant)
              <tr>
                  <td>{{ $constant->id }}</td>
                  <td>{{ $constant->title }}</td>
              </tr>
            @endforeach
        </table>


      </div>
      <a href="/" class="btn btn-primary" type="button">Back To index</a>
    </div>
@stop