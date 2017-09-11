<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id','product_id','quantity','price','discount_price'];

    public function orders(){
    	return $this->belongsTo('App\Models\Order');
    }
    public function products(){
    	return $this->belongsTo('App\Models\Product');
    }
}
