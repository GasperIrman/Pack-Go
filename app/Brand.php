<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
   public function rent(){
        return $this->hasMany('App\RVModel');
    }
}
