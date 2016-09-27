<?php

namespace App\Http\Controllers;


use App\Basket;
use App\Product;
use App\Product_Category;
use App\User;
use Auth;
use App\Http\Requests;
use DB;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    protected $user;

    public function __construct(){
      $this->user =  Auth::user();
    }
    public function profile($id){
        $user = User::find($id);
        return view('profile' , compact('user'));
    }

    public function cnprofile($id){
      $user = $this->user;

      if($id == $this->user->id){
        return view('cnprofile',compact('user'));
      } else {
        return view('errors.503');
      }
    }

    public function change_profile(){
      if(isset($_POST['change_profile'])){

              if(isset($_POST['seller_status'])){
                  $this->user->type = 1;
              } else {
                  $this->user->type = 0;
              }
          $this->user->save();
          return redirect()->action('ProfileController@profile', ['id' => Auth::user()->id]);
      }
    }

    public function show_create_page($id)
    {

        $categories = Product_Category::all();
        if($id == $this->user->id){
            if($this->user->type == 1 && $this->user->id == Auth::user()->id ){
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

        $filename = Auth::user()->id . '/';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        $product->create([
          'title' => $request->title,
          'description' => $request->description,
          'price' => $request->price,
          'image' => $filename,
          'product_category_id' => $request->product_category_id,
          'user_id' => Auth::user()->id
        ]);
        return back();
    }

    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }



    public function add_to_basket($id)
    {

        $product = Product::find($id);
        $user = $this->user;
        foreach($user->products as $product_info){
            if($product->id == $product_info->id){

            } else {

                $basket = new Basket;
                $basket->create([
                            'order_id' => NULL,
                            'user_id' => Auth::user()->id,
                            'product_id' => $product->id,
                            'status' => NULL,
                            'price' => $product->price,
                            'count' => 1
                        ]);

                }

          }
          return redirect('/basket');
    }

    public function basket(){
        $basket = $this->user->baskets;
        return view('basket',compact('basket'));
    }

}
