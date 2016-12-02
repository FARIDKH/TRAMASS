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
	function add_request($id)
	{
		$basket = Basket::find($id);
		$basket->status = 1;
		$basket->save();
		return back();
	}
    public function show_requests()
    {
			$baskets = $this->user_product =  Auth::user()->baskets;
			$basket = Basket::all();
    	return view('request',compact('baskets','baskets'));
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
