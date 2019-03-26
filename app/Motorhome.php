<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motorhome extends Model
{
    public function rent(){
        return $this->hasMany('App\Rent');
    }

    public function model(){
    	return $this->belongsTo('App\RVModel');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function reviews(){
        return $this->hasMany('App\MotorhomeReview');
    }
}
