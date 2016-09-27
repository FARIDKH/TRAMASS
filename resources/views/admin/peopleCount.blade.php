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

      form{
        margin-top: 30px;
      }
     
    </style>
  </head>
  <body>
    <div class="container">
      <h1>{{$city->title}} userleri</h1>
      <div class="col-md-8">
        <table class="table table-bordered">
          <tr>
            <th>Id</th>
            <th>People name</th> 
            <th>People surname</th>
            <th>password</th>
            <th>email</th>
            <th>adress</th>
            <th>type</th>

          </tr>
         
    

            @foreach($city->users as $people)
            <tr>
            <td>{{$people->id}}</td>
            <td>{{$people->name}}</td>
            <td>{{$people->surname}}</td>
            <td>{{$people->password}}</td>
            <td>{{$people->email}}</td>
            <td>{{$people->address}}</td>
            <td>
            @if($people->type==1)
              Admin
            @elseif($people->type==2)
              Satici/Alici
            @elseif($people->type==3)
                Alici
            @endif
            </td>
            </tr>
            @endforeach
            
     
           
        </table>

        
      </div>

   


    </div>
  </body>
</html>