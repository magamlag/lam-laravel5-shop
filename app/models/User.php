<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Laravel\Cashier\BillableTrait;
use Laravel\Cashier\BillableInterface;


class User extends Eloquent implements UserInterface, RemindableInterface, BillableInterface {

	use UserTrait, RemindableTrait, BillableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	/**
	 * Specify what fields should be implemented for subscription
	 *
	 * @var string
	 */
	protected $dates = [ 'trial_ends_at', 'subscription_ends_at' ];

	public static $rules = array(
			'username' => 'required|min:2|unique:users',
			'email'    => 'required|email|unique:users',
			'password' => 'required|alpha_num|min:5',
			'tel'      => 'between:8,12'
	);
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array( 'password', 'remember_token' );
	protected $fillable = array( 'username', 'email', 'tel' );

	public function getAuthIdentifier() {
		return $this->getKey();
	}

	public function getAuthPassword() {
		return $this->password;
	}

	public function getReminderEmail() {
		return $this->email;
	}

	public function getRememberToken() {
		return $this->remember_token;
	}

	public function setRememberToken( $value ) {
		$this->remember_token = $value;
	}

	public function getRememberTokenName() {
		return 'remember_token';
	}

	public function post() {
		return $this->hasMany( 'Post' );
	}

	public function isAdmin() {
		return (int) $this->admin == 1;
	}
}
