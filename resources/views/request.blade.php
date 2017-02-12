@extends('layouts.main_layout')

@section('content')

	

	@if(sizeof($orders) == 0)
		<div class="container">
			<h1>SIZƏ HƏR HANSİSA BİR TƏKLİF GƏLMƏYİB</h1>			
		</div>
	@endif

	@foreach($orders as $order)
			<section id="requests">
				<div class="container">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<h3>{{$order->buyer->user->name}} {{$order->buyer->user->surname}} adlı istifadəçi  
								{{ $order->buyer->count }}
								{{ $order->buyer->product->constant->title }}
								{{ $order->buyer->product->title }} almaq istəyir</h3>
							</div>
							
							<div class="row request-image">				
								<img src="uploads/{{ $order->buyer->product->image }}" alt="{{ $order->buyer->product->title }}">
							</div>
							<div class="row">
								<h4>Toplam qazanc : {{ $order->buyer->price * $order->buyer->count }} MANAT</h4>		
							</div>				
							<div class="row text-left">
								<a class="accept-request btn btn-success">QƏBUL ET</a>
								<a class="reject-request btn btn-warning">QƏBUL ETMƏ</a>
							</div>
							<hr>
						</div>
					</div>
					
				</div>
			</section>

		@endforeach

@stop

@section('script')
<script>

var _token = $('input[name=_token]');

var request = [
	@foreach($orders as $order)
		{{ $order->id }} ,
	@endforeach
];

console.log(request)
$('.accept-request').click(function(event){
	event.preventDefault();
	$.ajax({
		url:'/accept_request',
		method:'POST',
		data:
		{
			_token:_token.val(),
			request:request,
		},
		success:function(data)
		{
			console.log(data)
			
		}
	})
})

</script>
@endsection