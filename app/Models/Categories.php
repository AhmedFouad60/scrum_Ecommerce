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

    public function products(){

        return $this->belongsToMany('products','products_categories');
    }

}
