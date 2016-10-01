<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $fillable = [

   	'seller_id' ,'buyer_id'

   ];

   // public function user(){
  	
   //      return $this->belongsTo(User::class);

   // }

   public function seller()
   {
      return $this->belongsTo(User::class);
   }
   public function buyer()
   {
      return $this->hasOne(Basket::class);
   }

   // public function basket(){

   // 	    return $this->hasOne(Basket::class);

   // }
}
