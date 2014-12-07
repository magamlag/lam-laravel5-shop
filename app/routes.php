<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//Route::post( 'search', 'HomeController@search' );

/* User Auth & Registration */
Route::get( 'signin', 'NewAccountController@getSignin' );
Route::post( 'signin', 'NewAccountController@postSignin' );
Route::controller( 'users', 'NewAccountController' );

/* Admin Auth */
Route::get( 'login', 'AuthController@getLogin' );
Route::post( 'login', 'AuthController@postLogin' );
Route::get( 'logout', 'AuthController@logout' );

/* Shop - Front end */
Route::get( '/', [ 'uses' => 'StoreController@getIndex' ] );
Route::controller( 'store', 'StoreController' );
//	Route::controller( 'store/checkout', 'StoreController@getCheckout' );
Route::post( 'store/contact', 'StoreController@postContact' );

/* Admin Panel */
Route::group( [ 'before' => 'auth', 'prefix' => 'admin' ], function () {
  Route::get( '/', 'AdminController@index' );
  Route::controller( 'categories', 'CategoriesController' );
	Route::controller( 'products', 'ProductsController' );
  Route::resource( 'users', 'UserController' );
} );
