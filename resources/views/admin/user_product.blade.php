@extends('admin.admin')

@section('content')
    <div class="container">
      <h1>USER_PRODUCT</h1>
      <table class="table table-bordered">
        <tr>
          <td>id</td>
          <td>title</td>
          <td>description</td>
          <td>price</td>
          <td>image</td>
          <td>created_at</td>
          <td>updated_at</td>
          <td> product_category_id</td>

        </tr>
        @foreach($products as $product)
        <tr>
          <td>{{$product->id}}</td>
          <td>{{$product->title}}</td>
          <td>{{$product->description}}</td>
          <td>{{$product->price}}</td>
          <td>{{$product->image}}</td>
          <td>{{$product->created_at}}</td>
          <td>{{$product->updated_at}}</td>
          <td>{{$product->product_category_id}}</td>

        </tr>
        @endforeach
      </table>



   </div>
@stop
