<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tramass Country Panel</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
    html,body,a{
    background-color: #00796B ;
    color:#eee;
    }
    
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Crud Country</h1>
      <div class="col-md-8">
        <table class="table table-bordered">
          <tr>
            <th>Id</th>
            <th>Country name</th>
            <th>City</th>
            <th>Type</th>
          </tr>
          @foreach($country as $count)
          <tr>
            <td>{{$count->id}}</td>
            <td><a href="{{url('/admin/country/'.$count->id.'/city')}}">{{$count->title}}</a></td>
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