<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function brand(){
        return $this->hasMany('App\Brand');
    }

    public function city(){
    	return $this->hasMany('App\City');
    }
}
