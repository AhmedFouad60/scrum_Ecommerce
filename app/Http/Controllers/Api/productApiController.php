<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\categoryResource;
use App\Http\Resources\productResource;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class productApiController extends Controller
{
    use ApiResponseTrait;
    public function home(){
        $categories=Categories::all();
        return $this->apiResponse( categoryResource::collection($categories),null,200);
    }

    public function categoryProducts($id){

        $category=Categories::find($id);

        if($category){

            $categoryProducts=$category->products;
            return $this->apiResponse(productResource::collection($categoryProducts),null,200);
        }

        return $this->apiResponse(null,"can not find category with this ID",442);
    }

}
