@extends('layouts.main_layout')

@section('content')

<section id="basket">
	<div class="container-fluid">
		<div class="col-md-12">
			<h1>Shopping Cart</h1>
			<form action="/update_basket" method="post">
				<div class="col-md-8">					
						{{ csrf_field() }}
						@if(!sizeof($baskets))
							<h2>SIZIN BASKETINIZ BOSHDUR</h2>
							<a class="" href="/products">MƏHSULLARA BAX</a>
						@endif
						<table class="basket">	
							@foreach($baskets as $basket)
								@if($basket->status == 5)								
								<tr id="{{ $basket->id }}" class="basket-product">
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
										<input type="number" name="cart[{{$basket->id}}]" class="count-of-product" min="1" value="{{ $basket->count }}">
									</td>
									<td class="product-total-price">
										<span>{{ $basket->product->price *  $basket->count }}</span> AZN
									</td>
								</tr>
								@endif
							@endforeach		
							@if(sizeof($baskets) > 1)
								<button type="submit" name="update_basket" class="update-basket">UPDATE CART</button>	
							@endif				
						</table>
						
										
				</div>
				<div class="col-md-4 cart-total">
					<div>
						<div class="row">
							<h3>
								CART TOTALS
							</h3>
							<hr>						
						</div>
						<div class="row cart-total-price">
							<h3>
								TOTAL	
							</h3>
							<span class="total-price">
								
							</span>
						</div>
						<div class="row proceed">
							<a href="" id="proceedToCheckout">PROCEED TO CHECKOUT</a>
						</div>
						<div style="display:none" class="row text-center success-message">
							<p>TEKLIFLER GONDERILDI</p>
						</div>
					</div>
				</div>
			</form>	
		</div>
	</div>
</section>

<script>
	var _token = $('input[name=_token]');
	
	var basket_products = new Object;
	var basket_product_list = []

	for(i=0;i<$('.basket-product').length;i++)
	{
		basket_product_list.push($('.basket-product')[i].id)
	}	


	$('.basket-product').mouseenter(function(){
		var basketIndex = basket_product_list.indexOf(this)
	})
	var total = 0;
	var newTotal;
	var counts = []
	for(i=0;i<$('.basket-product').length;i++)
	{
		
		count = parseInt($('.basket-product .product-total-price span')[i].innerText) / parseInt($('.basket-product .product-price span')[i].innerText)
		counts.push(count)
	}
	function totalPriceOfProduct()
	{
		for(i=0;i<$('.product-total-price span').length;i++)
		{
			basket_products[i] =  $('.product-total-price span')[i].outerText	
			total += parseInt(basket_products[i])
		}	

	}
	totalPriceOfProduct()
	
	$('#proceedToCheckout').click(function(event){
		event.preventDefault();
		$this = $(this);
		$.ajax({
			url:'/add_request',
			method:'POST',
			data:
			{
				_token:_token.val(),
				products:basket_product_list,
				counts:counts
			},
			success:function(data)
			{
				$this.fadeOut()
				$('.success-message').fadeIn()
				
			}
		})
	})

	function newTotalChange()
	{
		$('.count-of-product').on('keyup mouseup',function(event){	
			product_info = $(this).parent().parent()
			var indexOfProductInBasket = basket_product_list.indexOf(product_info[0].id)

			value = $(this).val(),
			price_of_this_product = product_info.find($('.product-price'))
			total_price_of_this_product = product_info.find($('.product-total-price span'))
			total_price_of_this_product.text(value * parseInt(price_of_this_product.text()))
			basket_products[indexOfProductInBasket] = value * parseInt(price_of_this_product.text())
			newTotal = 0;
			counts[indexOfProductInBasket] = value;
			for(var productPrice in basket_products)
			{
				if(basket_products.hasOwnProperty(productPrice))
				{

					newTotal += parseFloat(basket_products[productPrice])
				}
			}
			$('.total-price').text(newTotal + " AZN")
		})
	}
	newTotalChange()
	$(document).ready(function(){
		$('.total-price').text(total + " AZN")
		$('.product-ignore i').click(function(){
			var a =$(this).parent().parent();
			id = a.find($('input[name=id]'))
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
					var indexInArray = basket_product_list.indexOf(x.parent().parent()[0].id)
					if(indexInArray > -1 )
					{
						basket_product_list.splice(indexInArray, 1)
					}
					delete basket_products[indexInArray]
					if(newTotal)
					{
						newTotal = newTotal -  x.text()
						$('.total-price').text(newTotal + " AZN")						
					} else 
					{
						total = total  - x.text()
						$('.total-price').text(total + " AZN")
					}
					newTotalChange()
					a.fadeOut(400,function(){
						basket_count = parseInt($('.fa-cart-plus span').text())							
						basket_count -= 1;
						$('.fa-cart-plus span').text(basket_count)
					});
				}
			})
		})
	});

	
</script>

@endsection
