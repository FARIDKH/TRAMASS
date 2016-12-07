@extends('layouts.main_layout')


@section('content')
    <section id="singleItem">
        <div class="container">
          <div class="row">
                  <div class="productDirections" >
                    <a href="/product_single/{{  $product->id - 1 }}" class="fa fa-angle-left "></a>
                    <a href="/product_single/{{  $product->id + 1 }}" class="fa fa-angle-right "></a>
                  </div>

              <div class="col-md-12 itemPage">
                    <div class="vertical-Images-list col-md-2">
                      <ul class="vertical-Images">
                        <li class="itemImages"><img src="/uploads/{{ $product->image }}" alt=""></li>
                        <li class="itemImages"><img src="/uploads/{{ $product->image }}" alt=""></li>
                        <li class="itemImages"><img src="/uploads/{{ $product->image }}" alt=""></li>
                      </ul>
                    </div>
                    <div class="mainImage col-md-6">
                          <img src="/uploads/{{ $product->image }}" alt="">
                    </div>
                    <div class="mainInfo col-md-4">
                        <form action="/add_to_basket/{{ $product->id }}" method="post">
                            {{csrf_field()}}
                            <h1>{{ $product->title }}</h1>
                            <span>${{ $product->price }}</span>
                            <p>{{$product->description}}</p>
                            @if($product->user->id == Auth::user()->id)

                            @else 
                                <input type="number" name="count" value="1" min="1">
                                <button type="submit" name="button" >add to cart</button>
                            @endif
                        </form>
                    </div>
              </div>
          </div>
        </div>
    </section>
    <section id="socialNetworkList">
        <div class="container-fluid">
            <div class="row socialNetwork">
                  <div class="socialIcons">
                    <a href="" class="fa fa-facebook fa-2x" aria-hidden="true"></a>
                    <a href="" class="fa fa-pinterest fa-2x" aria-hidden="true"></a>
                    <a href="" class="fa fa-twitter fa-2x" aria-hidden="true"></a>
                    <a href="" class="fa fa-instagram fa-2x" aria-hidden="true"></a>
                    <a href="" class="fa fa-youtube fa-2x" aria-hidden="true"></a>
                  </div>
            </div>
        </div>
    </section>
    <section id="relatedProducts">
        <div class="container-fluid">
            <div class="row">
                <div class="heading">
                  <h1>Related Products</h1>
                </div>
                <hr>
            </div>
        </div>
    </section>
@endsection
