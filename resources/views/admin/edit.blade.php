
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tramass Admin Panel</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
      html,body{
      	padding-top:5%;
      	padding-left: 10%;       
      }
      form{
      	margin-top: 20px;
      }
    </style>
  </head>
  <body>
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



  </body>
</html>
