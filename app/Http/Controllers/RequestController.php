<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use App\Basket;
use App\Order;

class RequestController extends Controller
{
	public function add_request(Request $request)
	{
		$data = $request->products;
		foreach ($data as $key => $value) 
		{
			$basket = Basket::find($value);
			$basket->status = 0;
			$seller_id =  $basket->product->user->id;
			$order = new Order;
			$order->seller_id = $seller_id;
			$order->buyer_id = Auth::user()->id;
			$order->save();
			$basket->order_id = $order->id;
			$basket->save();
		}		
		
	}
    public function show_requests()
    {
		$baskets = Auth::user()->baskets;
		$orders = Order::where('seller_id',Auth::user()->id)->get();
		$basket = Basket::all();

    	return view('request',compact('basket','baskets','orders'));
    }
	public function accept_request($id)
	{
		$basket = Basket::find($id);
		$order = new Order;
		$order->seller_id =  $basket->product->user->id;
		$order->buyer_id = $basket->user_id;
		$order->save();
		$basket->status = 2;
		$basket->order_id = $order->id;
		$basket->save();
		return redirect('/home');
	}

	public function reject_request($id)
	{
		$basket = Basket::find($id);
		$basket->status = 3;
		$basket->save();
		return back();
	}




}
