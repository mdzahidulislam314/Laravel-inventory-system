<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      'name','cat_id','sup_id','code','store_room','store_route','image','buy_date','expire_date','buying_price','selling_price'
    ];

  public function Supplier()
  {
      return $this->belongsTo('App\Supplier');
  }
  public function category()
  {
      return $this->belongsTo('App\Category');
  }
}
