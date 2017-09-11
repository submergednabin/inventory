<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    protected $fillable = ['product_id','total_stock','product_flg','status','product_in_out_amount'];

    public function products(){
    	return $this->belongsTo('App\Models\Product');
    }
}
