@extends('layouts.main_layout')

@section('content')


<section id="productsingle"  style="transition:all 0.3s ease">
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


</section>
@endsection
