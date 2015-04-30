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
Route::get('github', 'AuthController@redirectToProvider');
Route::get('github/callback', 'AuthController@handleProviderCallback');
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


/*Route::get('social/{action?}', array("as" => "hybridauth", function($action = "")
{
  // check URL segment
  if ($action == "auth") {
    // process authentication
    try {
      Hybrid_Endpoint::process();
    }
    catch (Exception $e) {
      // redirect back to http://URL/social/
      return Redirect::route('hybridauth');
    }
    return;
  }
  try {
    // create a HybridAuth object
    $socialAuth = new Hybrid_Auth(app_path() . '/config/hybridauth.php');
    // authenticate with Twitter
    $provider = $socialAuth->authenticate("twitter");
    // fetch user profile
    $userProfile = $provider->getUserProfile();
    $accessToken = $provider->getAccessToken();
    dd($accessToken);
  }
  catch(Exception $e) {
    // exception codes can be found on HybBridAuth's web site
    return $e->getMessage();
  }
  // access user profile data
  echo "Connected with: <b>{$provider->id}</b><br />";
  echo "As: <b>{$userProfile->displayName}</b><br />";
  echo "<pre>" . print_r( $userProfile, true ) . "</pre><br />";

  // logout
  $provider->logout();
}));*/
