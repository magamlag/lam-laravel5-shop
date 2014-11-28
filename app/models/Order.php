<?php
class Order
    extends Eloquent
{
  protected $table = "order";

  protected $guarded = ["id"];

  protected $softDelete = true;

  public function user()
  {
    return $this->belongsTo("User");
  }

  public function orderItems()
  {
    return $this->hasMany("OrderItem");
  }

  public function products()
  {
    return $this->belongsToMany("Product", "order_item");
  }
}