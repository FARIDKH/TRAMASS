@extends('admin.admin')

@section('content')
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

@stop
