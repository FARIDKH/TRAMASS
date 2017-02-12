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
		$counts = $request->counts;			
		foreach ($data as $key => $value) 
		{
			$basket = Basket::find($value);
			$basket->status = 0;
			$basket->count = $counts[$key];
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
		$orders = Order::where('seller_id',Auth::user()->id)->orderBy('id','desc')->get();
		$basket = Basket::all();
    	return view('request',compact('basket','baskets','orders'));
    }
    public function accept_request()
    {
    	
    }
	public function reject_request($id)
	{
		$basket = Basket::find($id);
		$basket->status = 3;
		$basket->save();
		return back();
	}




}
