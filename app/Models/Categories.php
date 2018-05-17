<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Categories extends Model
{
    use NodeTrait;
    /**
     * @var array
     */
    protected $fillable = [
        'title', 'parent_id',
    ];
}
