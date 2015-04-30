<?php
namespace App\Models;

class Category extends \Eloquent {
	protected $table = 'categories';
	protected $fillable = ['name'];
	public static $rules = ['name'=>'required|min:3'];

	public function products( ){
		return $this->hasMany( 'Product' );
	}
}