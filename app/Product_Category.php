<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Category extends Model
{
	protected $table = 'product__categories';
	protected $fillable = [
       'title'
    ];
    public function products(){
        return $this->hasMany(Product::class);
    }
}
