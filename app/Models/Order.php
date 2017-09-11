<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['fullname','address','phone_number','order_status','invoice_id','status'];

    public function orderItems(){
    	return $this->hasMany('App\Models\OrderItem');
    }
}
