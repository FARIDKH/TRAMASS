@extends('layouts.main_layout')

@section('content')


<section>
	<div class="row product_intro">
		<h1>Shop All Products</h1>
	</div>
</section>



<div id="left_side_filter">
	<div class="nav-search">
		<div class="">
			<h4>FILTER BY PRICE</h4>
			From
			<input type="range" min="1" max="500" step="1" value="1" class="product_price_from" name="product_price">
			To
			<input type="range" min="501" max="1000" step="1" value="500" class="product_price_to" name="product_price">
			<span class="price_range_from"></span>
			-
			<span class="price_range_to"></span>
			<span class="price_filter"></span>
			<span id="price_filter">FILTER</span>
		</div>

	</div>
	<div class="product_category">
		<h4>
			PRODUCT CATEGORIES
		</h4>
		<ul>

			<div class="product_count_in_category">
				45
			</div>
			<li>Alma</li>
		</ul>
	</div>
	<div class="active-nav">
		<i class="fa fa-caret-left" aria-hidden="true"></i>
	</div>
</div>



<section id="products">
	<div class="container">
		<div class="row">
			<ul class="nav navbar-nav">
				<li class="dropdown">
			        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Default Sorting
			        <span class="caret"></span></a>
			        <ul class="dropdown-menu">
			          	<li><a href="#">Default Sorting</a></li>
			          	<li><a href="#">Default Sorting</a></li>
			          	<li><a href="#">Default Sorting</a></li>
			          	<li><a href="#">Lorem ipsum dolor sit </a></li>
			          	<li><a href="#">Lorem ipsum dolor Sorting </a></li>
			        </ul>
			  	</li>
		    </ul>
		</div>
		<div class="col-md-2 hidden-sm hidden-xs leftPage">
			<h4>
				FILTER BY PRICE
			</h4>
			From
			<input type="range" min="1" max="500" step="1" value="1" class="product_price_from" name="product_price">
			To
			<input type="range" min="501" max="1500" step="1" value="501" class="product_price_to" name="product_price">
			<span class="price_range_from"></span>
			-
			<span class="price_range_to"></span>
			<span id="price_filter">FILTER</span>
			<hr>
			<div class="hidden-sm hidden-xs product_category">
				<h4>
					PRODUCT CATEGORIES
				</h4>
				<ul>
					<div class="product_count_in_category">
						45
					</div>
					<li>Alma</li>
				</ul>
			</div>
		</div>
		<div class="col-md-10 col-sm-12 col-xs-12 rightPage">
				@foreach($products as $product)
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
							<div class="date_of_product">
								<span>25 <br> 	DAY</span>
							</div>
						</div>
						<div class="row product_bottom">
							<span>
							 	{{ $product->title }}
							</span><br>
							<span class="price">
								<span>{{ $product->price +25 }} AZN </span> {{ $product->price }} AZN
							</span>
							<div>
								<form action="/add_to_basket/{{ $product->id }}" method="post">
										{{ csrf_field() }}
										<span><a type="submit" name="submit" href="/add_to_basket/{{ $product->id }}">ADD TO CART</a></span>

							</form>
							</div>
						</div>
					</div>
				</div>
				@endforeach

		 </div>
	</div>



</section>
<div class="background_filter"></div>
<section id="quick_view">

	@foreach($products as $product)

			<div id="product_single_quick_view_{{ $product->id }}" class="product_single_quick_view  hidden-sm hidden-xs ">			<div class="col-md-6 product_single_quick_view_left">
					<div>
						<img  src="/uploads/{{ $product->image }}" alt="{{ $product->title }}">
					</div>
				</div>
				<div class="col-md-6 product_single_quick_view_right">
					<i class="fa fa-times" aria-hidden="true"></i>
					<div class="row">
						<h1>{{ $product->title }}</h1>
					</div>
					<div class="row">
						<span>{{ $product->price }} AZN </span><br>
						<p>
							{{ $product->description }} AZN
						</p>
					</div>
					<form action="/add_to_basket/{{ $product->id }}" method="post">

					<div class="row">
						<input type="number" min="1">
					</div>
					<div class="row">
								{{ csrf_field() }}
						<a  type="submit" name="submit" href="/add_to_basket/{{ $product->id }}" style="color:red;">ADD TO CART</a>
					</form>

					</div>
				</div>
			</div>

	@endforeach

</section>


<script>

	var isLessThanScreen;

	$(document).ready(function(){
		var price_range_from = $(".price_range_from")
		var price_range_to = $(".price_range_to")


		price_range_from.text("$1");
		price_range_to.text("$500");
		$('.product_price_from').change(function(){
			var price = $(this).val();
			$(".price_range_from").text("$" + price);
			console.log('hi')
		})
		$('.product_price_to').change(function(){
			var price = $(this).val();
			$(".price_range_to").text("$" + price);
		})

		$('.background_filter').css({
			height : $(window).height()
		})
		$(window).resize(function() {
	  		$('.background_filter').css({
				height : $(window).height()
			})
			if($(window).width() < 780)
			{
				$('.product').css({
					width : $(window).width()/2.5
				});
				isLessThanScreen = true;
			} else {
				$('.product').css({
					width : '170px'
				});
				isLessThanScreen = false;
			}
		});
		if($(window).width() < 780)
		{
			$('.product').css({
				width : $(window).width()/2.5
			});
			isLessThanScreen = true;
		} else {
			$('.product').css({
				width : '170px'
			});
			isLessThanScreen = false;
		}





		$('.product').hover(function(){
			$(this).find('.quick_view_little').css({
				'opacity':1
			});
			$(this).find('.product_bottom span:nth-child(3)').css({
				"transform" : "translateY(-20px)",
				'opacity' : 0
			})

			$(this).find(".product_bottom div").css({
				"transform" : "translateY(-20px)",
				'opacity' : 1
			})

		}, function(){
			$(this).find('.quick_view_little').css({
				'opacity':0
			});
			$(this).find('.product_bottom span:nth-child(3)').css({
				"transform" : "translateY(0px)",
				'opacity' : 1
			})
			$(this).find('.product_bottom div').css({
				"transform" : "translateY(0px)",
				'opacity' : 0
			})

		});


		@foreach($products as $product)
		$('#quick_view_{{$product->id}}').click(function(){
			$('.background_filter').fadeIn();
			$('#product_single_quick_view_{{ $product->id }}').fadeIn();
		})
		@endforeach


		$('.fa-times').click(function(){
			$('.background_filter').fadeOut();
			$('.product_single_quick_view').fadeOut()
		});

		$(document).keyup(function(e) {
			if (e.keyCode === 27)   $('.fa-times').click();
		});

		$('.active-nav').click(function(){
			$('#left_side_filter').css({
				transform : 'translateX(0px)'
			});
			$(this).css({
				opacity:0
			});

		});


		// $('section:not(#left_side_filter)').click(function(){
		// 	// $('#left_side_filter').css({
		// 	// 	transform : 'translateX(-275px)'
		// 	// });
		// 	// $('section:not(#left_side_filter)').css({
		// 	// 	transform : 'translateX(0px)'
		// 	// });
		// 	if(isLessThanScreen)
		// 	{
		// 		$('.active-nav').css({
		// 				opacity:1
		// 		});

		// 	}
		// });


	});




</script>

@stop
