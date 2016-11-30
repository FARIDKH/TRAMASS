@extends('layouts.main_layout')

@section('content')


{{-- <section id="productsingle"  style="transition:all 0.3s ease">
<div class="container-fluid">
	<div class="container">




		@foreach($basket as $basket_info)

			@if($basket_info->status == 0)
			<div class="row">

				@if(isset($ferq))
					@if($ferq<0)
						<script>
							setTimeout(function(){
								document.getElementsByClassName('alert_message')[0].setAttribute("class", "hidden");
							}, 3000);
						</script>
						@else
					@endif

				@endif




				<div  class="peanutbtn">
	             <h1 class="pull-left" style="min-width:200px">{{ $basket_info->product->title }} by {{ $basket_info->product->user->name }} {{$basket_info->product->user->surname }}</h1>
	             <button class=" profit pull-right btn btn-success"><i class="fa fa-line-chart " aria-hidden="true"></i><a href="">PROFIT SIMULATION</a> </button>
					</div>
					<br>
					<br>
					<br>
					<hr class="pull-right" width="70%">
					<div class="row">
						<div class="col-md-5 col-xs-12">
							<div>
								<img  class="img img-responsive" src="/uploads/{{$basket_info->product->image}}" alt="">
							</div>
						</div>
						<div class="col-md-7 col-xs-12">
							<div class="hectar">
								<h2>{{ $basket_info->price / 10 }} AZN / Hectar</h2>
								<br>

								<ul>
									<li><i class="fa fa-calendar"></i>Contract Period : <span style="color:#777777;" > <b>6 months</b> </span> </li>
									<li><i class="fa fa-map-marker"></i> Location : <span style="color:#417630;"><b> {{  $basket_info->product->user->city->title  }} </b></span></li>
									<li><i class="fa fa-dollar"></i> Expected Return : <span style="color:#777777;"><b> 9-13% per 6 months</b></span></li>
									<li><i class="fa fa-clock-o"></i>Harvest Period : <span style="color:#777777;"><b>After 6 month</b></span> </li>
								</ul>
								<br>

								<p style="color:red; font-size:1.2em;margin-left: 25px;"><b>Out of stock</b> </p>
								<br>
								<a type="submit" href="/add_request/{{ $basket_info->id }}" class="notify pull-right btn btn-success"> Buy It </a>
							</div>
						</div>
					</div>
					<br>
					<br>
					<br>
					<br>
					<br>
					<div class="row" >
						<div class="col-md-12 col-xs-12 textt">
							<p class="p1">{{  $basket_info->product->description   }}</p>
						</div>
					</div>


				</div>
			@endif
		@endforeach

	</div>
</div>


</section> --}}

<section id="basket">
	<div class="container-fluid">
		<div class="col-md-12">
			<h1>Shopping Cart</h1>
			<div class="col-md-8">
				<form action="/update_basket" method="post">	
					{{ csrf_field() }}
					<table class="basket">	
						@foreach($baskets as $basket)								
							<tr id="{{ $basket->id }}">
								<input type="hidden" name="id" value="{{ $basket->id }}">
								<input type="hidden" name="id_{{ $basket->id }}" value="{{ $basket->id }}">
								<td class="product-ignore">
									<i type="submit" class="fa fa-times"></i>
								</td>
								<td class="product-image">
									<div>
										<img src="uploads/{{ $basket->product->image }}" alt="{{ $basket->product->title }}">
									</div>
								</td>
								<td class="product-title">
									<span>{{ $basket->product->title }}</span>
								</td>
								<td class="product-price">
									<span>{{ $basket->product->price }} AZN</span>
								</td>
								<td class="product-count">
									<input type="number" name="cart[{{ $basket->id }}]" id="product-count-{{ $basket->id }}" min="1" value="{{ $basket->count }}">
								</td>
								<td class="product-total-price">
									<span>{{ $basket->product->price *  $basket->count }}  AZN</span>
								</td>
							</tr>
						@endforeach						
					</table>
					<button type="submit" name="update_basket" class="update-basket">UPDATE CART</button>	
				</form>						
			</div>
			<div class="col-md-4 cart-total">
				<div>
					<div class="row">
						<h3>
							CART TOTALS
						</h3>
						<hr>						
					</div>
					<div class="row">
						<h3>
							SUBTOTAL
						</h3>
						<span>
							$300.00
						</span>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="row">
								<h3>
									SHIPPING
								</h3>
							</div>
						</div>
						<div class="col-md-9">
							<div class="row">								
								<input type="radio" name="method[1]">
								<label for="method[1]">FLAT RATE: $12.00</label>
							</div>
							<div class="row">								
								<input type="radio" name="method[1]">
								<label for="method[1]">FLAT RATE: $12.00</label>
							</div>
							<div class="row">								
								<input type="radio" name="method[1]">
								<label for="method[1]">FLAT RATE: $12.00</label>
							</div>
							<div class="row">								
								<input type="radio" name="method[1]">
								<label for="method[1]">FLAT RATE: $12.00</label>
							</div>
						</div>
						
					</div>
					<div class="row cart-total-price">
						<hr>
						<h3>
							TOTAL	
						</h3>
						<span>
							$300.00
						</span>
					</div>
					<div class="row proceed">
						<a href="#">PROCEED TO CHECKOUT</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	var _token = $('input[name=_token]');
	var id = $('input[name=id]');

	$(document).ready(function(){
		$('.product-ignore i').click(function(){
			var a =$(this).parent().parent();
			$.ajax({
				url:'/remove_from_basket',
				method:'POST',
				dataType:'JSON',
				data:{
					_token:_token.val(),
					id:id.val()
				},
				success:function()
				{
					a.fadeOut();
				}
			})
		})
		

		// $('.update-basket').click(function(event){
		// 	var cart = [];
		// 	@foreach($baskets as $basket)

		// 	cart[{{$basket->id }}] = $('input[name="cart[{{$basket->id }}]]"').val()

		// 	@endforeach
		// 	event.preventDefault()
		// 	$.ajax({
		// 		url:'/update_basket',
		// 		method:'POST',
		// 		data:{
		// 			_token:_token.val(),
		// 			id:id.val(),	
		// 			@foreach($baskets as $basket)
		// 			cart[{{$basket->id}}] :$('#product-count-{{$basket->id}}').val(),
		// 			@endforeach						
		// 		},
		// 		success:function(data)
		// 		{
		// 			console.log(data)
		// 		}
		// 	})
		// })
	});
</script>

@endsection
