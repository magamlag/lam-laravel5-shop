<?php
namespace App\Http\Controllers;
use App\Models\User;
use View, Validator;
use Request;

/**
 * Class NewAccountController
 *
 * Register/SignIn/SignOut
 */
class NewAccountController extends Controller {
	public function __construct() {
		parent::__construct();
		$this->beforeFilter( 'csrf', array( 'on' => 'post' ) );
	}

	public function getNewaccount() {
		return View::make( 'users.newaccount' );
	}

	public function postCreate() {
		$validator = Validator::make( Request::all(), User::$rules );

		if ( $validator->fails() ) {
			return Redirect::to( 'users/newaccount' )
					->with( 'message', 'Something went wrong' )
					->withErrors( $validator )
					->withInput();
		}
		$user           = new User;
		$user->username = Request::input( 'username' );
		$user->email    = Request::input( 'email' );
		$user->password = Hash::make( Request::input( 'password' ) );
		if ( Request::input( 'tel' ) ) {
			$user->tel = Request::input( 'tel' );
		}
		$user->save();

		return Redirect::to( 'users/signin' )
				->with( 'message', 'Your account has been created successfully. Please sign in' );
	}

	public function getSignin() {
		return View::make( 'users.signin' );
	}

	public function postSignin() {
		if ( Auth::attempt( array( 'email' => Request::input( 'email' ), 'password' => Request::input( 'password' ) ) ) ) {
			return Redirect::to( '' )
					->with( 'message', 'Thanks for signin in' );
		}
		return Redirect::to( 'users/signin' )
				->with( 'message', 'Your email/password combination was incorrect' );
	}

	public function getSignout() {
		Auth::logout();
		return Redirect::to( 'users/signin' )
				->with( 'message', 'You have been signed out' );
	}
}