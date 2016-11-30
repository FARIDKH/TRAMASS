@extends('layouts.main_layout')


@section('content')
    <section id="singleItem">
        <div class="container">
          <div class="row">
                <div class="pageDirections">
                  <div class="col-md-8 hyperlink">
                    <a href="#">Home</a> > <a href="#">Shop</a> > <a href="#">Basket</a>
                  </div>
                  <div class="col-md-4">

                  </div>
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
                          <h1>Oatmeal Wood Table Lamp</h1>
                          <span>$666.00</span>
                          <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                          <input type="number" name="number" value="1" min="1">
                          <button type="button" name="button">add to cart</button>
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
    		<div class="col-md-10 col-sm-12 col-xs-12 rightPage">
    			@if(!count($products))
    				<h1>No product was found</h1>
    			@endif
    			<ul>
    				@foreach($products as $producties)
    					<li>
    						<div class="product_and_quick_view">
    							<div class="product">
    								<div class="row product_top">
    									<div>
    										<img  src="/uploads/{{ $producties->image }}" alt="{{ $producties->title }}">
    									</div>
    									<div class="quick_view_little">
    										<i class="fa fa-eye" aria-hidden="true"></i>
    										<span id="quick_view_{{$producties->id}}">Quick view</span>
    									</div>
    									{{-- <div class="date_of_product">
    										<span><br></span>
    									</div> --}}
    								</div>
    								<div class="row product_bottom">
    									<span>
    									 	{{ $producties->title }}
    									</span><br>
    									<span class="price">
    										<span>{{ $producties->price +25 }} AZN </span> {{ $producties->price }} AZN
    									</span>
    									<div>
    										<span><a href="/add_to_basket/{{ $producties->id }}">ADD TO CART</a></span>
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
