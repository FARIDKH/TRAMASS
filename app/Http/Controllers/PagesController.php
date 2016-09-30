<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
// Butun modeller
use App\City;
use App\Basket;
use App\Country;
use App\Orders;
use App\Product;
use App\Product_Category;
use App\User;


class PagesController extends Controller
{
    protected $user;
    protected $products;
    public function __construct(){
      $this->user = User::class;
      $this->products = Product::all();
    }

    public function home(){
      if(Auth::guest()){
        return view('home');
      } else {
        $products = $this->products;
        return view('product',compact('products'));
      }
    }
    public function about(){
    	return view('about');
    }
    
  	public function product_single($id) {
      $product = Product::find($id);
  		return view('product_single',compact('product'));
    }

}
