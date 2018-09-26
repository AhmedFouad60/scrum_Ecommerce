<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsPhoto extends Model
{
    protected $hidden = [
        'id','product_id','created_at','updated_at'
    ];
    protected $fillable=['product_id','filename'];
    public function product(){
        $this->belongsTo('App\Models\products');
    }
}
