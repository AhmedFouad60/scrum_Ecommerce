<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsPhoto extends Model
{
    protected $fillable=['product_id','filename'];
    public function product(){
        $this->belongsTo('App\Models\products');
    }
}
