<?php

namespace App\Http\Controllers;


use App\Basket;
use App\Product;
use App\Product_Category;
use App\User;
use App\Constant;
use Auth;
use App\Http\Requests;
use Session;
use Carbon\Carbon;
use Validator;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    protected $user;
    protected $constants;
    protected $baskets;
    protected $products;
    public function __construct(){
      $this->baskets = Basket::all();
      $this->constants = Constant::all();
      $this->user =  Auth::user();
      $this->products = Product::all();
      $this->user_product =  Auth::user();
    }
    public function profile($id){
        $basket = Basket::all();
        $user = User::find($id);
        $baskets = $this->user->baskets;
        return view('profile' , compact('user','baskets','basket'));
    }
    public function remove_users_products(Request $request)
    {
        $id = $request->id;
        $product= Product::find($id);
        $product->delete();
        return json_encode($product->id);
    }

    public function cnprofile($id){
      $user = $this->user;
      $baskets = $this->user->baskets;
      if($id == $this->user->id){
        return view('cnprofile',compact('user','baskets'));
      } else {
        return view('errors.503');
      }
    }

    public function change_profile(Request $request,$id){
      if(isset($_POST['change_profile'])){
                $user= User::find($id);
                $user->update($request->all());
                $this->user->type = $request->type;
                $this->user->save();
                return redirect()->action('ProfileController@profile', ['id' => Auth::user()->id]);
                return response()->json( $user );
      }
    }

    public function show_create_page($id)
    {

        $categories = Product_Category::all();
        $constants = $this->constants;
        $baskets = $this->user->baskets;
        if($id == $this->user->id){
            if($this->user->type != 0 && $this->user->id == Auth::user()->id ){
                return view('create_product',compact('categories','constants','baskets'));
            } else {
                return view('errors.503',compact('baskets'));
            }
        } else {
            return view('errors.503');
        }
    }
    public function create_product(Request $request,$id){
        $product = new Product;
        $file = $request->file('image');
        $filename = Auth::user()->id.'/'.date('YjgihisA').".jpg";

          if ($file) {
              Storage::disk('uploads')->put($filename, File::get($file));
          }
        $product_create =  $product->create([
            'image' => $filename,
            'title' => $request->title,
            'description' => $request->description,
            'product__category_id' => $request->product_category_id,
            'constant_id' => $request->constant_id,
            'count' => $request->count,
            'price' => $request->price,
            'date_limit' => $request->date_limit,
            'user_id' => Auth::user()->id
          ]);

        return redirect()->back()->with('product_name',"".Auth::user()->products->last()->title."")
                                 ->with('product_image',"".Auth::user()->products->last()->image."");
    }

  public function show_edit_page(Request $request,$id)
  {
            $constants = $this->constants;

            $product = Product::find($request->product_id);
            $user = $this->user;
            $baskets = $this->user->baskets;
            $categories = Product_Category::all();


        if($id == $this->user->id){
            if( $this->user->id == Auth::user()->id ){
                return view('edit',compact('product','constants','baskets','categories','user'));
            } else {
                return view('errors.503');
            }
        } else {
            return view('errors.503');
        }
// dd($user_product);
}
    public function editProduct(Request $request,$product_id)
    {
      $file = $request->file('image');
      $filename = Auth::user()->id.'/'.date('YjgihisA').".jpg";
      if(isset($_POST['update_product'])){
          if ($file) {
              Storage::disk('uploads')->put($filename, File::get($file));
          }
                $product= Product::find($request->product_id);
                $product->update($request->all());
                $product->update([
                  'image' => $filename
                ]);
                return redirect()->action('ProfileController@profile', ['id' => Auth::user()->id]);
                 return response()->json( $product );
      }
      //edit product


    }

    public function add_to_basket(Request $request)
    {
        $now = Carbon::now();
        $product = Product::find($request->product_id);
        $user = $this->user;
        $products = $this->products;
        $baskets = $this->baskets;

        if($now < $product->date_limit && $user->type == 2 || $user->type == 0){

            if($product->user->id == Auth::user()->id){
                return redirect('/basket');
            }
            foreach($baskets as $basket)
            {
              if($basket->user_id == Auth::user()->id)
              {
                if($basket->product_id == $request->product_id)
                {
                  $basket->count += 1;
                  $basket->save();
                  if($request->ajax())
                  {
                    $data = [$this->user->baskets->last(),$this->user->baskets->last()->product];
                    return json_encode($data);
                  }
                  else
                  {
                    return redirect()->back()->with('product_name', "".$this->user->baskets->last()->product->title."")
                    ->with('product_image', "".$this->user->baskets->last()->product->image."");
                  }
                }
              }
            }
            if($request){
              $ferq = $product->count - $request->count;
              $product->count = $ferq;
            } else {
              $ferq = -1;
            }
            if($ferq>=0){
              $product->save();
            }
            if($request->count == NULL)
            {
              $request->count = 1;
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
              if($request->ajax())
              {

                $data = [$this->user->baskets->last(),$this->user->baskets->last()->product];
                return json_encode($data);
              }
              else
              {
                return redirect()->back()->with('product_name', "".$this->user->baskets->last()->product->title."")
                ->with('product_image', "".$this->user->baskets->last()->product->image."");
              }
          }  else {
          echo 'bu malin muddeti bitdiyinden satila bilmez';
          return back();
        }

    }

    public function basket(){
        $baskets = $this->user->baskets;
        return view('basket',compact('baskets'));
    }
    public function remove_from_basket(Request $request)
    {
        $id = $request->id;
        $basket = Basket::find($id);
        $basket->delete();
        return json_encode($basket->id);
    }

    public function update_basket(Request $request)
    {
      $baskets = $this->baskets;
      foreach($baskets as $basket)
      {
        if($basket->user_id == Auth::user()->id)
        {
          $id = $request->id_.$basket->id;
          $basket = Basket::find($id);
          $count = $request->cart[$basket->id];
          $basket->update([
            'count' => $count
          ]);
        }
      }
      $baskets = $this->user->baskets;
      return back();
    }



}
