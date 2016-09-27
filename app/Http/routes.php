<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','PagesController@home');
Route::get('/home','PagesController@home');
Route::get('/about','PagesController@about');

Route::get('/user_profile','AdminController@user');
Route::get('/admin','AdminController@index');
//Cities and Country part
Route::get('/admin/country','AdminController@country');
//County->city CRUD
Route::get('/admin/country/{id}/city','CountyCrud@city');
Route::get('/delete/{id}','CountyCrud@delete');
Route::get('/edit/{id}','CountyCrud@edit');
Route::post('/update/{id}','CountyCrud@update');
Route::post('/admin/country/{id}/city','CountyCrud@create');
//End of country->city CRUD

//End Cities and Country part

//how many users live in each city
Route::get('/peopleCount/{city_id}/', 'AdminController@people');




Route::auth();

Route::get('/register','AdminController@countries');

//we create usersupload
/*Route::post('/register','AdminController@userCreate');*/


Route::group(['middleware' => 'auth'],function(){

    Route::get('/profile/{id}/','ProfileController@profile');
    Route::get('/create_product/{id}','ProfileController@create_product');
    Route::post('/profile/{id}/','ProfileController@change_profile');

    Route::get('/cnprofile/{id}','ProfileController@cnprofile');
    Route::get('/product', 'PagesController@product');
    Route::get('/product_single', 'PagesController@product_single');




});

//Route::get('/home', 'HomeController@index');
