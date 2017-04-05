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

//Vordefinierte Routen des Auth-Systems (Login, Registrierung usw.)
Auth::routes();

//Standardroute (Shop Hauptseite)
Route::get('/', 'MainController@index');

//Aufruf von Artikeln nach Kategorie
Route::get('category/{name}', 'CategoryController@show');

//Aufruf des Impressums
Route::get('impressum', function(){
  return view('impressum');
});

//Aufruf der AGB
Route::get('agb', function(){
  return view('agb');
});

//Aufruf der About Us Seite
Route::get('aboutus', function(){
  return view('aboutus');
});

//Rufe einzelnen Artikel anhand ID auf
Route::get('article/{id}', 'ArticleController@show');

//Konfigurator aufrufen
Route::get('configure', 'ArticleController@configure');

//Warenkorb aufrufen
Route::get('shoppingcart', 'OrderController@listCart')->name('shoppingcart');

//"Zur Kasse" aufrufen
  Route::get('checkout', function(){
  return view('checkout');
});

//Admin-Panel (Durch middleware nur für Admins aufrufbar)
Route::get('admin', 'AdminController@show')->middleware('admin');

//Bestellung abschicken
Route::post('submitorder', 'OrderController@order');

//Artikel zum Warenkorb hinzufügen
Route::post('addToCart', 'OrderController@addToCart');
Route::post('addToCartAJAX', 'OrderController@addToCartAJAX');

//Warenkorb löschen
Route::post('destroycart', function(){
  Cart::destroy();
  return redirect()->route('shoppingcart');
});
