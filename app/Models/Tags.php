<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table='tags';
    protected $fillable = [
        'tag_name'
    ];
    public $timestamps = false;

    public function products(){
        return $this->belongsToMany('App\Models\products','product_tags','product_id','tag_id');
    }

}
