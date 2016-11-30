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
    protected $product_categories;
    public function __construct(){
      $this->user = User::class;
      $this->product_categories = Product_Category::class;
      $this->products = Product::orderBy('id','desc')->get();
    }
    public function products()
    {
      $products = $this->products;
      $product_categories = Product_Category::all();      
      return view('new',compact('products','product_categories'));
    }
    public function home(){
      $products = $this->products;
      if(Auth::guest()){
        return view('home',compact('products'));
      } else {
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

    public function search()
    {
        $search = $_GET['search'];
        if($search){
          $results = Product::where('title','LIKE','%'.$search.'%')->orWhere('count','LIKE','%'.$search.'%')->get(); 
          return view('search',compact('results'));
        } else {
          return back();
        }

    }
}
  