<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Country;
use App\City;

class CountyCrud extends Controller
{
    //
      public function city($id){

    	$country=Country::find($id);
    	return view('admin.city', compact('country'));
    }

     public function delete($id){

    	$city=City::find($id);
    	$city->delete();
    	return back();
    }
     public function edit($id){

    	$city=City::find($id);
    	 return view('admin.edit', compact('city'));

    }
      public function update(Request $request, $id){
    	$city=City::find($id);
    	$city->title=$request->input('title');
    	$city->update();
    	return redirect("/admin/country");
    }

public function create(Request $request, $id){

    	$country=Country::find($id);
    	$city = new City;

    	$city->title=$request->input('title');

    	$country->city()->save($city);
    	return back();
    }






}
