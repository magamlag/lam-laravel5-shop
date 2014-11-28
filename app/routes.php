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

/*Route::get( 'blog/{slug}', function ( $slug ) {
	$post = Post::where( 'slug', $slug )->first();
	$date = $post->created_at;
	setlocale( LC_TIME, 'Europe/Kiev' );
	$date = $date->formatlocalized( '%A %d %B %Y' );
	return View::make( 'site.post' )->with( 'post', $post )->with( 'date', $date );
} )->before( 'userauth' );*/

/*Route::group( array( 'before' => 'auth' ), function () {
	Route::get( 'admin', 'AdminController@index' );
	Route::get( 'logout', 'AuthController@logout' );
	Route::resource( 'users', 'UserController' );
} );*/

/* Shop */
	Route::get( '/', [ 'uses' => 'StoreController@getIndex' ] );
	Route::controller( 'store', 'StoreController' );
//	Route::controller( 'store/checkout', 'StoreController@getCheckout' );
	Route::controller( 'admin/categories', 'CategoriesController' );
	Route::controller( 'admin/products', 'ProductsController' );
	Route::controller( 'users', 'NewAccountController' );
