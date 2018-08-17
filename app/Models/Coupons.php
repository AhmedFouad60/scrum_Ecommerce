<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupons extends Model
{
    protected $fillable = [
        'name', 'description', 'code','type','discount','start_date','end_date','fired'
    ];


    public function products(){
        return $this->belongsToMany('App\Models\products','product_coupons','product_id','coupon_id');
    }


}
