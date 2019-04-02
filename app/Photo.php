<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
   
    public function motorhome(){
    	return $this->belongsTo('App\Motorhome');
    }
}
