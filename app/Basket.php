<?php

namespace App;

use App\Http\Controllers\Auth;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
     protected $fillable = [
       'order_id','user_id','product_id' , 'status' , 'price' , 'count'
     ]; 

     public function user(){
        return $this->belongsTo(User::class);
     }
     public function order(){
        return $this->hasOne(Order::class);
     }
     public function product(){
        return $this->belongsTo(Product::class);
     }
}
