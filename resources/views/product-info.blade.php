@extends('layouts.main_layout')


@section('content')
    <section id="singleItem">
        <div class="container">
          <div class="row">
                  <div class="productDirections" >
                    <a href="/product_single/{{  $product->id + 1 }}" class="fa fa-angle-left "></a>
                    <a href="/product_single/{{  $product->id - 1 }}" class="fa fa-angle-right "></a>
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
                            <input type="number" name="count" value="1" min="1">
                            <button type="submit" name="button" >add to cart</button>
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
    <section id="products">
    	<div class="container-fluid">
    		<div class="col-md-12 col-sm-12 col-xs-12 rightPage">
    			@if(!count($products))
    				<h1>No product was found</h1>
    			@endif
    			<ul>
    				@foreach($products as $product)
    					<li>
    						<div class="product_and_quick_view">
    							<div class="product">
    								<div class="row product_top">
    									<div>
    										<img  src="/uploads/{{ $product->image }}" alt="{{ $product->title }}">
    									</div>
    									<div class="quick_view_little">
    										<i class="fa fa-eye" aria-hidden="true"></i>
    										<span id="quick_view_{{$product->id}}">Quick view</span>
    									</div>
    									{{-- <div class="date_of_product">
    										<span><br></span>
    									</div> --}}
    								</div>
    								<div class="row product_bottom">
    									<span>
    									 	{{ $product->title }}
    									</span><br>
    									<span class="price">
    										<span>{{ $product->price +25 }} AZN </span> {{ $product->price }} AZN
    									</span>
    									<div>
    										<span><a href="/add_to_basket/{{ $product->id }}">ADD TO CART</a></span>
    									</div>
    								</div>
    							</div>
    						</div>
    					</li>
    				@endforeach
    			</ul>
    		</div>
    	</div>
    </section>
@endsection
