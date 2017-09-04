<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = ['fullname','address','phone','email','status'];

    public function products(){
    	return $this->hasMany('App\Models\Product');
    }
}
