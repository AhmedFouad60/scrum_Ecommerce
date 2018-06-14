<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';

    protected $fillable = [
       'quantity','manufacturer','title','price','weight'
    ];



    public function categories(){
        return $this->belongsToMany('App\Models\Categories','products_categories');
    }
}
