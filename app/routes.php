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
/*Route::get( 'register', 'AuthController@getRegister' );
Route::post( 'register', 'AuthController@postRegister' );
Route::post( 'search', 'HomeController@search' );*/

Route::get( 'signin', 'NewAccountController@getSignin' );
Route::post( 'signin', 'NewAccountController@postSignin' );
/* Shop */
Route::get( '/', [ 'uses' => 'StoreController@getIndex' ] );
Route::controller( 'store', 'StoreController' );
//	Route::controller( 'store/checkout', 'StoreController@getCheckout' );
Route::post( 'store/contact', 'StoreController@postContact' );
Route::controller( 'admin/categories', 'CategoriesController' );
Route::controller( 'admin/products', 'ProductsController' );
Route::controller( 'users', 'NewAccountController' );
