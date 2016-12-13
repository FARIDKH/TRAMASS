@extends('admin.admin')

@section('content')
    <div class="container">
      <h1>Crud Grid</h1>
      <div class="col-md-8">
        <h3>Create Category</h3>
        <form class="form-group" action="" method="post">
          {{ csrf_field() }}
          <input type="text" name="title" class="form-control"><br>
          <input type="submit" class="btn btn-success" name="submit" value="CREATE">
        </form>
        <table class="table table-bordered">
            <tr>
              <th>Id</th>
              <th>Category Name</th>
              <th colspan="2">ACTION</th>
            </tr>

            @foreach($categories as $category)
              <tr>
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->title }}</td>
                  <td><a href="/product_category_delete/{{$category->id}}" class="btn btn-default">DELETE</a></td>
              </tr>
            @endforeach
        </table>


      </div>
      <a href="/" class="btn btn-primary" type="button">Back To index</a>
    </div>  
@stop
