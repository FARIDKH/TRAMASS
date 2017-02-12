<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\Http\Requests;
use App\Constant;
use App\Country;
use App\City;
use App\User;
use App\Order;
use Auth;


class AdminController extends Controller
{
    public function index(){
      return view('admin.adminLogin');
    }
    public function login(Request $request)
    {     
        $user = User::where('email','=',$request->email)->get();
        $password = $request->password;
        if(sizeof($user))
        {
          if(password_verify($password,$user[0]->password))
          {
            if($user[0]->admin)
            {
              return view('admin.admin')->with('adminIsLoggedIn',true);
            } else {
              return back();
            }        
          }
        } else {
          return back();
        }
    }



    public function user() {
  		$users = \DB::table('users')->orderby('id', "DESC")->get();
  		return view('admin.user', ['users' => $users]);
  	}

  	public function user_product($id) {
  		$products = \DB::table('products')->where('user_id', '=', $id)->orderby('id', "DESC")->get();
  		return view('admin.user_product', ['products' => $products]);
  	}
  	public function user_delete($id) {
  		if (\DB::table('users')->where('id', $id)->delete()){
        return redirect()->back();
  			if (\DB::table('products')->where('user_id', '=', $id)->delete()) {

  				return redirect()->back();

  			} else {
  				print 'have same error';

  			}

  		}

  	}


    public function product_category(){
        $categories = ProductCategory::all();
        return view('admin.product_category',compact('categories'));
    }
    public function store(Request $request,ProductCategory $product_category)
    {
        $category = new ProductCategory;
        $category->title=$request->title;
        $category->save();
        return back();

    }
    public function country(){


    	$country=Country::all();
        return view('admin.country',compact('country'));

    }

    public function create_country(Request $request)
    {
      $country = new Country;
      $country->create([
          'title' => $request->title
        ]);
      return back();
    }


    public function countries(){
    	$countries=Country::all();
    	$users=User::all();
    	return view('auth.register', compact('countries','users'));
    }


    public function people($city_id){


    	$city=City::find($city_id);
    	return view('admin.peopleCount', compact('city'));


    }

    public function create_constant(Request $request)
    { 
        $constant = new Constant;
        $constant->title=$request->title;
        $constant->save();
        return back();
    }
    public function constant(Request $request){
        
        $constants = Constant::all();
        return view('admin.constant',compact('constants'));
    }  

    public function orders(){
        $orders = Order::orderBy('id','desc')->get();
        return view('admin.orders',compact('orders'));
    }
}
