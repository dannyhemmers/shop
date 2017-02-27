<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'MainController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('impressum', function(){
  return view('impressum');
});

Route::post('finishconfig', 'OrderController@addToCart');

Route::get('drohne/{id}', 'ArticleController@show');
Route::get('configure', 'ArticleController@configure');
Route::get('shoppingcart', 'OrderController@listCart')->name('shoppingcart');

Route::post('destroycart', function(){
  Cart::destroy();
  return redirect()->route('shoppingcart');
});