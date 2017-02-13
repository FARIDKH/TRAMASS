<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{




    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','city_id','surname' , 'address' ,'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function baskets(){
        return $this->hasMany(Basket::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }


}
