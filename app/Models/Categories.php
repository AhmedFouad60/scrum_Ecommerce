<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Categories extends Model
{
    use NodeTrait;

    protected $table = 'categories';

    /**
     * @var array
     */
    protected $fillable = [
        'title', 'parent_id',
    ];

//    public function products(){
//
//        return $this->belongsToMany('App\Models\products','products_categories');
//    }

    public function products(){
        return $this->hasMany('App\Models\products','category_id');
    }

}
