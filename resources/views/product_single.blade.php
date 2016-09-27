@extends('layouts.main_layout')


@section('content')
<section id="productsingle">
<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class=" peanut col-md-9 col-xs-12">
				<div  class="peanutbtn">
                   <h1 class="pull-left" style="min-width:200px">{{ $product->title }} by {{ $product->user->name }} {{ $product->user->surname }}</h1>
                   <button class=" profit pull-right btn btn-success"><i class="fa fa-line-chart " aria-hidden="true"></i><a href="">PROFIT SIMULATION</a> </button>


				</div>
				<br>
				<br>
				<br>
				<hr class="pull-right" width="70%">
				<div class="row">
					<div class="col-md-5 col-xs-12">
						<div>
							<img  class="img img-responsive" src="/img/11.jpg" alt="">
						</div>
					</div>
					<div class="col-md-7 col-xs-12">
						<div class="hectar">
							<h2>{{ $product->price / 10 }} AZN / Hectar</h2>
							<br>

							<ul>
								<li><i class="fa fa-calendar"></i>Contract Period : <span style="color:#777777;" > <b>6 months</b> </span> </li>
								<li><i class="fa fa-map-marker"></i> Location : <span style="color:#417630;"><b>{{ $product->user->address }}</b></span></li>
								<li><i class="fa fa-dollar"></i> Expected Return : <span style="color:#777777;"><b> 9-13% per 6 months</b></span></li>
								<li><i class="fa fa-clock-o"></i>Harvest Period : <span style="color:#777777;"><b>After 6 month</b></span> </li>
							</ul>
							<br>

							<p style="color:red; font-size:1.2em;margin-left: 25px;"><b>Out of stock</b> </p>
							<br>

							<a href="/add_to_basket/{{ $product->id }}" class="notify pull-right btn btn-success">Add To Cart</a >
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
						<p class="p1">{{ $product->description  }}</p>
					</div>
				</div>


			</div>
			<div class="col-md-3 col-xs-12">
				<div class="seeOther">
					<h3>See Other Plantation</h3>
					<ul >
						<li>Olive </li>
						<li>Date Palm </li>
						<li>Durian</li>
						<li>Longan</li>
						<li>Banana</li>
						<li>Deli Water Apple </li>
						<li>Fragrant Roots </li>
						<li>Avocado</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>


</section>
@endsection
