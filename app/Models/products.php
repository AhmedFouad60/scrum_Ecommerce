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
        return $this->belongsToMany('App\Models\Categories','products_categories','category_id','product_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\user','user_id');
    }
}
