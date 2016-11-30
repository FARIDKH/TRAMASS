<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Product_Category;

class ProductController extends Controller
{
	protected $products;
	public function __construct()
	{
		$this->products = Product::class;
	}
    public function filter(Request $request)
    {
        $product_categories = Product_Category::all();
        $price_range_from = $request->price_range_from;
        $price_range_to = $request->price_range_to;
        if($request->ajax())
        {
            $products = Product::where('price','<',$price_range_to)->where('price','>',$price_range_from)->get();
            return json_encode($products);            
        }

        if($request->product_category_id)
        {
            $products = Product::where('product__category_id' , '=',$request->product_category_id)->get();
             return view('new', compact('products','product_categories'));
        }

       

    }
}
