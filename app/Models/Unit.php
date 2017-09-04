<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = ['unit_name','status'];

    public function products(){
    	return $this->hasMany('App\Models\Product');
    }
}
