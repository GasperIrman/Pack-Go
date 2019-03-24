<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotorhomeReview extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function motorhome(){
    	return $this->belongsTo('App\Motorhome');
    }
}
