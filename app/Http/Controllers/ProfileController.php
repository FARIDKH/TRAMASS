<?php

namespace App\Http\Controllers;


use App\Basket;
use App\Product;
use App\Product_Category;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

class ProfileController extends Controller
{
    public function profile($id){
        $user = User::find($id);
        return view('profile' , compact('user'));
    }

    public function cnprofile($id){
      $user = Auth::user();

      if($id == $user->id){
        return view('cnprofile',compact('user'));
      } else {
        return view('errors.503');
      }
    }

    public function change_profile(){
      if(isset($_POST['change_profile'])){
          $user = Auth::user();
              if(isset($_POST['seller_status'])){
                  $user->type = 1;
              } else {
                  $user->type = 0;
              }
          $user->save();
          return redirect()->action('ProfileController@profile', ['id' => Auth::user()->id]);
      }
    }

    public function show_create_page($id)
    {
        $user = Auth::user();
        $categories = Product_Category::all();
        if($id == $user->id){
            if($user->type == 1){
                return view('create_product',compact('categories'));
            } else {
                return view('errors.503');
            }
        } else {
            return view('errors.503');
        }
    }
    public function create_product(Request $request,$id){
        $product = new Product;
        $file = $request->file('image');
        $destinationPath = 'img';
        $file->move($destinationPath,$file->getClientOriginalName());


        $product->create([
          'title' => $request->title,
          'discription' => $request->discription,
          'price' => $request->price,
          'image' => $request->image,
          'product_category_id' => $request->product_category_id,
          'user_id' => Auth::user()->id
        ]);
        return back();
    }
    public function basket($id)
    {
        $basket = Basket::find($id);
        dd($basket->products());
        // if(!$basket->status){
        //   return $basket->order_id = NULL;
        // } else {
        //   return $basket->order_id = $basket->order()->id;
        // }

        return $basket;
    }

}
