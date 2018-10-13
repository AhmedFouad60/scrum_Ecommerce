<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\categoryResource;
use App\Http\Resources\productDetailResource;
use App\Http\Resources\productResource;
use App\Models\Categories;
use App\Models\products;
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

    public function singleProduct($id){

        $product=products::find($id);

        if($product){
            return $this->apiResponse(new productDetailResource($product),null,200);
        }
        return $this->apiResponse(null,"can not find this product ",442);

    }

}
