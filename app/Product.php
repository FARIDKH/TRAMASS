<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   protected $fillable = [
	    'description', 'count', 'price', 'image', 'title','user_id','product_category_id' , 'constant_id','date_limit'
   ];

   public function user(){
     return $this->belongsTo(User::class);
   }

   public function constant(){
      return $this->belongsTo(Constant::class);
   }

   public function basket(){
      return $this->hasOne(Basket::class);
   }

   public function product_category()
   {
      return $this->belongsTo(Product_Category::class);
   }
}
