@extends('admin.admin')

@section('content')
    <div class="container">
      <h1>Cities</h1>
      <div class="col-md-8">
        <table class="table table-bordered">
          <tr>
            <th>Id</th>
            <th>Cities name</th>
            <th>User</th>
            <th>Option</th>

          </tr>
          @foreach($country->cities as $city)
    <tr>
            <th>{{$city->id}}</th>
            <th>{{$city->title}}</th>
            <th><a href="{{url('/peopleCount/'.$city->id)}}">List</a></th>
            <th>
            <a class="btn btn-success btn-edit" href="{{url("/edit/".$city->id)}}" >Edit</a>
            <a class="btn btn-success btn-danger" href="{{ url("/delete/".$city->id) }}" >Delete</a>
            </th>
     </tr>
            @endforeach
        </table>


      </div>

      <div class="col-md-4">
      <a href="/admin" class="btn btn-primary" type="button" >Back To Admin</a>
        <form class="form-horizontal" method="post" action="{{ url('/country/'.$country->id.'/city')}}" >
        {{ csrf_field() }}
        <div class="form-group">
          <label for="cityid">City Name: </label>
          <input type="text" class="form-control" id="cityid" placeholder="City" name="title">
        </div>

        <button type="submit" class="btn btn-info">Create</button>
      </form>


      </div>


    </div>

@endsection