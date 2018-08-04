<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
        public function products(){
            $this->belongsToMany('App\Models\products')->withPivot('quantity');;
        }
}
