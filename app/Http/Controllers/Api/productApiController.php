<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\productResource;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class productApiController extends Controller
{
    use ApiResponseTrait;
    public function home(){
        $categories=Categories::all();
        return $this->apiResponse( productResource::collection($categories),null,200);
    }
}
