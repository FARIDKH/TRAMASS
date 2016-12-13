@extends('admin.admin')

@section('content')
    <div class="container">
      <div class="col-md-8">
        <form action="create_country" method="post">
          {{ csrf_field() }}
          <input type="text" class="form-control" name="title" placeholder="Country name"><br>
          <button type="submit" class="btn btn-success">CREATE COUNTRY</button>   
        </form>
      </div>
      
      <div class="col-md-8">
        <h1>Crud Country</h1>
        <table class="table table-bordered">
          <tr>
            <th>Id</th>
            <th>Country name</th>
            <th>City</th>
          </tr>
          @foreach($country as $count)
          <tr>
            <td>{{$count->id}}</td>
            <td><a href="{{url('country/'.$count->id.'/city')}}">{{$count->title}}</a></td>
            <td>
              @foreach($count->cities as $city)
              <li>{{$city->title}}</li>
              @endforeach
            </td>
          </tr>
          @endforeach
        </table>
      </div>
      <a href="/admin" class="btn btn-primary" type="button" >Back To Admin</a>
    </div>
  </body>
</html>
@stop