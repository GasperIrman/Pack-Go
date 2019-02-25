<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{

    public function model(){
        return $this->hasMany('App\RVModel');
    }

    public function country(){
    	return $this->belongsTo('App\Country');
    }
}
