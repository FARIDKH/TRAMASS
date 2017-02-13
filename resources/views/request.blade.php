@extends('layouts.main_layout')

@section('content')

	

	@if(sizeof($orders) == 0)
		<div class="container">
			<h1>SIZƏ HƏR HANSİSA BİR TƏKLİF GƏLMƏYİB</h1>			
		</div>
	@endif


<section id="requests">
	@foreach($orders as $order)
			
				<div  class="container">
					{{ csrf_field() }}
					<div class="row">
						<div id="{{ $order->id }}" class="col-md-6">
							<div class="row">
								<h3>{{$order->buyer->user->name}} {{$order->buyer->user->surname}} adlı istifadəçi  
								{{ $order->buyer->count }}
								{{ $order->buyer->product->constant->title }}
								{{ $order->buyer->product->title }} almaq istəyir</h3>
							</div>
							
							<div class="row request-image">				
								<img src="uploads/{{ $order->buyer->product->image }}" alt="{{ $order->buyer->product->title }}">
							</div>
							<div class="row request-profit">
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


		@endforeach
			</section>
@stop

@section('script')
<script>
var _token = $('input[name=_token]');

$('.accept-request').click(function(event){
	event.preventDefault();
	var request = $(this).parent().parent();
	var id = request[0].id;
	$.ajax({
		url:'/accept_request',
		method:'POST',
		data:
		{
			_token:_token.val(),
			id:id
		},
		success:function(data)
		{
			request.slideUp('400',function(){
				$(this).fadeOut()
			})
		}
	})
})
$('.reject-request').click(function(event){
	event.preventDefault();
	var request = $(this).parent().parent();
	var id = request[0].id;
	$.ajax({
		url:'/reject_request',
		method:'POST',
		data:
		{
			_token:_token.val(),
			id:id
		},
		success:function(data)
		{
			request.slideUp('400',function(){
				$(this).fadeOut()
			})
		}
	})
})

</script>
@endsection