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
      $this->user_product =  Auth::user();
      $this->product_categories = Product_Category::class;
      $this->products = Product::orderBy('id','desc')->get();
    }
    public function products()
    {
      $products = $this->products;
      $product_categories = Product_Category::all();
      if(Auth::guest()){
        return view('new' , compact('product_categories' , 'products'));
      } else {
        $baskets = $this->user_product->baskets;
        return view('new'  ,compact('products','baskets', 'product_categories'));
      }
      return view('new' ,compact('products','product_categories','baskets'));
    }

    public function home(){
      $products = $this->products;

      if(Auth::guest()){
        return view('home',compact('products'));
      } else {
        $baskets = $this->user_product->baskets;
        return view('home'  ,compact('products','baskets'));
      }

    }
    public function about(){
        $baskets = $this->user_product->baskets;
      if(Auth::guest()){
        return view('about',compact('products' , 'baskets'));
      } else {
        return view('about'  ,compact('products','baskets'));
      }
      $baskets = $this->user_product->baskets;
    	// return view('about' , compact('baskets'));
    }

    public function product_single($id) {
        $baskets = $this->user_product->baskets;
        $products = $this->products;
        $product = Product::find($id);

        if ($product)   {
          # code...
        }else {
          if ($id == 0) {
            $product = Product::find(sizeof($products));
          }
          if ($id > sizeof($products)) {
              $product = Product::find(1);
          }
        }

    		return view('product-info',compact('product','products','baskets'));
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
