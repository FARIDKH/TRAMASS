@extends('admin.admin')

@section('content')


<div class="container">
	<table class="table table-bordered">
		<tr>
			<th>ID</th>
			<th>SELLER NAME</th>
			<th>BUYER NAME</th>
			<th>TRANSACTION DATE</th>
		</tr>
		@foreach($orders as $order)
			<tr>
				
				<td>{{ $order->id }}</td>
				<td>{{ $order->seller->name }}</td>
				<td>{{ $order->buyer->user->name }}</td>
				<td>{{ $order->created_at}}</td>
			</tr>
		@endforeach
	</table>
</div>

@stop
