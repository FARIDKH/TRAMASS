<?php

namespace App\Http\Controllers;


use App\Basket;
use App\Product;
use App\Product_Category;
use App\User;
use App\Constant;
use Auth;
use App\Http\Requests;
use Carbon\Carbon; 


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    protected $user;
    protected $constants;
    protected $baskets;
    public function __construct(){
      $this->baskets = Basket::all();
      $this->constants = Constant::all();
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
        $constants = $this->constants;
        if($id == $this->user->id){
            if($this->user->type == 1 && $this->user->id == Auth::user()->id ){
                return view('create_product',compact('categories','constants'));
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


        $filename = Auth::user()->id.'/'.date('jYhisA').".jpg";
        if ($file) {
            Storage::disk('uploads')->put($filename, File::get($file));
        }

        $product->create([
          'image' => $filename,
          'title' => $request->title,
          'description' => $request->description,
          'product_category_id' => $request->product_category_id,
          'constant_id' => $request->constant_id,
          'count' => $request->count,
          'price' => $request->price,
          'date_limit' => $request->date_limit,
          'user_id' => Auth::user()->id
        ]);
        return back();
    }




    public function add_to_basket(Request $request,$id)
    {

        $now = Carbon::now();
        $product = Product::find($id);
        $user = $this->user;
        if($now < $product->date_limit){
            if($request){
              $ferq = $product->count - $request->count;
              $product->count = $ferq;
            } else {
              $ferq = 5;
            }


            


            if($ferq>=0){
              $product->save();
            }
            if($ferq<0){
               $basket = $this->user->baskets;
               return view('basket',compact('basket','ferq'));
            } else {
                  $basket = new Basket;
                  $basket->create([
                              'order_id' => NULL,
                              'user_id' => Auth::user()->id,
                              'product_id' => $product->id,
                              'status' => NULL,
                              'price' => $product->price,
                              'count' => $request->count,
                          ]);
              }
              

                  if($product->user->id == Auth::user()->id){
                      return redirect('/basket');
                  }

                
              

              return redirect('/basket');
            }  else {
          return 'bu mal artiq satila bilmez';
        }

    }
    public function basket(){
        $basket = $this->user->baskets;
        return view('basket',compact('basket'));
    }


}
