<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Country;
use App\City;

class AdminController extends Controller
{
    public function index(){
        return view('admin.admin');
    }
    public function user(){
        return view('admin.user');
    }

    public function country(){


    	$country=Country::all();
        return view('admin.country',compact('country'));

    }

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

    	$country->cities()->save($city);
    	return back();
    }

    public function countries(){
    	$countries=Country::all();
    	return view('auth.register', compact('countries'));
    }

}
