@extends('layouts.main_layout')


@section('content')


<section id="product">
<div class="container-fluid">
<div class="container">
	<div class="row h2">
		<form method="get" action="/search" >
			
			<div class="form-group col-md-3 pull-right">
				<h3 for="search">SEARCH</h3>
				<input type="text" name="search" class="form-control" id="search">
			</div>
		</form>	
		<h2>All products</h2>
	</div>
	<br>
		@foreach($products as $product)
			
				<div class="col-md-3 col-xs-12 product">
					<div style="background-color:white" class="elsen text-center">
						<img  src="/uploads/{{ $product->image }}" alt="{{ $product->title }}">
						<h4 >{{ $product->title }} by {{ $product->user->name }} {{ $product->user->surname }}</h4>
						<p class=" p">{{ $product->price }} AZN / {{ $product->constant->title }}</p>
						<b  style="font-size:11pt; color:#787878">Return : 20%-30% per year</b>
						<div class="hoverr">
							<h2 style="margin-top:80px;">{{ $product->title }}</h2>
							<form action="">
								<a href="/product_single/{{  $product->id }}" class="btn btnn">INVEST NOW</a>
							</form>
						</div>
					</div>
				</div>
			
		@endforeach
	
	
</div>

</div>

</section>


@endsection
