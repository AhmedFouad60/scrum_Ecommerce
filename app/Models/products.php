<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $fillable = [
       'quantity','manufacturer','title','price','weight'
    ];
}
