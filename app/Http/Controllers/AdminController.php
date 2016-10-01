<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_Category;
use App\Http\Requests;
use App\Constant;
use App\Country;
use App\City;
use App\User;
use App\Order;



class AdminController extends Controller
{
    public function index(){
        return view('admin.admin');
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
        $categories = Product_Category::all();
        return view('admin.product_category',compact('categories'));
    }
    public function store(Request $request,Product_Category $product_category)
    {
        $category = new Product_Category;
        $category->title=$request->title;
        $category->save();
        return back();

    }
    public function country(){


    	$country=Country::all();
        return view('admin.country',compact('country'));

    }

  /*  public function city($id){

    	$country=Country::find($id);
    	return view('admin.city', compact('country'));
    }*/

   /* public function delete($id){

    	$city=City::find($id);
    	$city->delete();
    	return back();
    }*/

  /* public function edit($id){

    	$city=City::find($id);
    	 return view('admin.edit', compact('city'));

    }*/

  /*  public function update(Request $request, $id){
    	$city=City::find($id);
    	$city->title=$request->input('title');
    	$city->update();
    	return redirect("/admin/country");
    }
*/
    /*public function create(Request $request, $id){

    	$country=Country::find($id);
    	$city = new City;

    	$city->title=$request->input('title');

    	$country->cities()->save($city);
    	return back();
    }*/

    public function countries(){
    	$countries=Country::all();
    	$users=User::all();
    	return view('auth.register', compact('countries','users'));
    }

/*   public function userCreate(Request $request){
    	$user = new User;

    	$user->name=$request->input('name');
    	$user->surname=$request->input('surname');
    	return $request->input('city');
    	$user->password=$request->input('password');

    	$user->email=$request->input('email');
    	$user->address=$request->input('address');

    	$user->type= 1;

    /*	$user->create([
    		'name' => $request->name,
    		'surname' => $request->surname,
    		'city_id' => $request->city_id,
    		'password' => $request->password,
    		'email' => $request->email,
    		'address' => $request->address
    		]);*/

   /* }*/


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
        $orders = Order::all();
        return view('admin.orders',compact('orders'));
    }
}
