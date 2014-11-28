<?php

class Checkout extends \Eloquent {
  protected $guarded  = [];
  public static $rules = [
      'email' => 'required|email|unique:users|min:5',
      'first_name' => 'required|min:5',
      'last_name' => 'required|min:5',
      'address' => 'required|min:5',
      'zip' => 'required|min:2',
      'country' => 'required',
      'phone' => 'required|between:8,14',
  ];
  protected $table = 'order';
  protected $fillable = [ 'email', 'first_name', 'last_name', 'address', 'zip', 'country', 'phone', 'description' ];


}