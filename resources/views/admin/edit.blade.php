@extends('admin.admin')

@section('content')

   <div class="col-md-4 col-md-offset-2">
      <a href="/admin" class="btn btn-primary" type="button" >Back To Admin</a>
        <form class="form-horizontal" method="post" action="{{url('/update/'.$city->id)}}" >
        {{ csrf_field() }}
        <div class="form-group">
          <label for="cityid">City Name: </label>
          <input type="text" class="form-control" id="cityid" placeholder="City" name="title" value="{{$city->title}}">
        </div>

        <button type="submit" class="btn btn-info">Update</button>
      </form>


      </div>



@stop
