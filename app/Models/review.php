<?php

namespace  App\Models;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $fillable=[
        'title','description','score','product_id','user_id'

    ];
    protected $hidden=[
        'product_id','user_id'
    ];
}
