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

Route::get('/products','PagesController@products');
Route::post('/products','ProductController@filter');
Route::get('/products/{product_category_id}','ProductController@filter');

Route::get('/','PagesController@home');
Route::get('/home','PagesController@home');
Route::get('/about','PagesController@about');




//End of country->city CRUD

//End Cities and Country part

//how many users live in each city
Route::get('/peopleCount/{city_id}/', 'AdminController@people');




Route::auth();

    Route::get('/register','AdminController@countries');

Route::group(['middleware' => 'admin'],function(){

    Route::get('/user_profile','AdminController@user');
    
    Route::post('/product_category','AdminController@store');
    Route::get('/product_category','AdminController@product_category');
    Route::get('/user_product/{id}', 'AdminController@user_product');
    Route::get('/user_delete/{id}', 'AdminController@user_delete');
    Route::get('/constant', 'AdminController@constant');
    Route::post('/create_constant', 'AdminController@create_constant');
    Route::get('/orders', 'AdminController@orders');
    //Cities and Country part
    Route::get('/country','AdminController@country');
    //County->city CRUD
    Route::post('/create_country','AdminController@create_country');
    Route::get('/country/{id}/city','CountyCrud@city');
    Route::get('/delete/{id}','CountyCrud@delete');
    Route::get('/edit/{id}','CountyCrud@edit');
    Route::post('/update/{id}','CountyCrud@update');
    Route::post('/country/{id}/city','CountyCrud@create');
    Route::get('/product_category_delete/{id}','ProductCategoryController@destroy');
    
});



//we create usersupload
/*Route::post('/register','AdminController@userCreate');*/

    Route::get('/','PagesController@home');
Route::group(['middleware' => 'auth'],function(){
    Route::get('/tramass/admin','AdminController@index');
    Route::post('/tramass/admin','AdminController@login');


    Route::get('/profile/{id}/','ProfileController@profile');
    Route::post('/profile/{id}/','ProfileController@change_profile');
    Route::get('/add_to_basket/{id}','ProfileController@add_to_basket');
    Route::post('/addingBasket','ProfileController@add_to_basket');
    Route::post('/remove_from_basket','ProfileController@remove_from_basket');
    Route::post('/remove_users_products','ProfileController@remove_users_products');
    Route::post('/update_basket','ProfileController@update_basket');
    Route::get('/profile/{id}/product/{product_id}/edit','ProfileController@show_edit_page');
    Route::post('/profile/{id}/product/{product_id}/edit','ProfileController@editProduct');
    Route::get('/basket','ProfileController@basket');

    Route::post('/basket','ProfileController@basket');

    // //// //// //// //// //// //

    Route::get('/request','RequestController@show_requests');
    // Route::get('/add_request/{id}','RequestController@add_request');
    Route::get('/reject_request/{id}','RequestController@reject_request');
    Route::get('/accept_request','RequestController@accept_request');



    // // //// //// //// //// ////     // // //// //// //// //// ////
    Route::post('/add_request','RequestController@add_request');


    // // //// //// //// //// ////     // // //// //// //// //// ////



    Route::get('/create_product','ProfileController@show_create_page');
    //Route::get('creatingProduct' , 'ProfileController@create_product');
    Route::post('/create_product/{id}','ProfileController@create_product');
    Route::get('/cnprofile','ProfileController@cnprofile');
    Route::get('/product_single/{id}', 'PagesController@product_single');


    Route::get('/search', 'PagesController@search');



});




//Route::get('/home', 'HomeController@index');
