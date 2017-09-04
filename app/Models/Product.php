<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['item_name','vendor_id','category_id','image','sku','cost_price','selling_price','status','unit_id'];

    public function productCategories(){
    	return $this->belongsTo('App\Models\ProductCategory');
    }

    public function units(){
    	return $this->belongsTo('App\Models\Unit');
    }

    /*public function vendors(){
    	return $this->belongsTo('App\Models\Vendor');
    }*/

}
