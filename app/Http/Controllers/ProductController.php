<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\ProductCategory;
use Auth;

class ProductController extends Controller
{
    protected $products;
	protected $user;
	public function __construct()
	{
        $this->user = Auth::user();
		$this->products = Product::class;
	}
    public function filter(Request $request)
    {
        $product_categories = ProductCategory::all();
        $price_range_from = $request->price_range_from;
        $price_range_to = $request->price_range_to;
        if(!Auth::guest())
        {
            $baskets = Auth::user()->baskets;
        }
        if($request->ajax())
        {
            $products = Product::where('price','<',$price_range_to)->where('price','>',$price_range_from)->get();            
            return view('new'  ,compact('products','baskets', 'product_categories'));
        }

        if($request->product_category_id)
        {
            $products = Product::where('product_category_id' ,'=',$request->product_category_id)->orderBy('id','desc')->get();
            return view('new', compact('products','product_categories','baskets'));
        }



    }
}
