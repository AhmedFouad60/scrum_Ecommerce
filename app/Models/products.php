<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
       'quantity','manufacturer','title','price','weight','small_description','large_description','longitude','latitude'
    ];



    public function categories(){
        return $this->belongsToMany('App\Models\Categories','products_categories','product_id','category_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function Tags(){
        return $this->belongsToMany('App\Models\Tags','product_tags','product_id','tag_id');
    }

    public function orders(){
        return $this->belongsToMany('App\Models\Orders')->withPivot('quantity');
    }

    public function coupons(){
        return $this->belongsToMany('App\Models\Coupons','product_coupons','product_id','coupon_id');
    }
    public function photos()
    {
        return $this->hasMany('App\Models\ProductsPhoto','product_id');
    }
    public function reviews(){
        return $this->hasMany('App\Models\review','product_id');
    }


}
