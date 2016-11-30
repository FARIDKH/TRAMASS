@extends('layouts.main_layout')

@section('content')
<script>
	var totalPrice = 0;
</script>
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
									<span>{{ $basket->product->price *  $basket->count }}</span>AZN
								</td>
								<script>
									 var totalPrice = totalPrice + {{ $basket->product->price *  $basket->count }}
								</script>
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
						<span class="total-price">
							
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
		$('.total-price').text(totalPrice + " AZN")
		$('.product-ignore i').click(function(){
			var a =$(this).parent().parent();
			var	$this = $(this);
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
					var x = a.find($('.product-total-price span'))
					totalPrice = totalPrice - x.text()
					console.log(x.text())
					a.fadeOut();
					$('.total-price').text(totalPrice + " AZN")
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
