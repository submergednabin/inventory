<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = ['status','category_name'];

    public function products(){
    	return $this->hasMany('App\Models\Product');
    }

    
}
