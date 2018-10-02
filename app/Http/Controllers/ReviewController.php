<?php

namespace App\Http\Controllers;

use App\Http\Requests\reviewRequest;
use App\Models\products;
use App\Models\review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //TODO:: [website part] => store review with Ajax and show it in the single product

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
           'title'=>'required',
            'description'=>'required',
            'score'=>'required|integer',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }else{
            $product_id=$request['product_id'];
            //store the review
            $review=review::create($request->all());


        }
        return response()->json(['success'=>'Your review added','product_id'=>$product_id]);

    }
    public function show($id)
    {
        //
    }
    public function latest($id){

        $product = products::findOrFail($id);
//        dd($product->reviews);
        if ($product){
            $reviews=$product->reviews;
             return view('Website.Products.Partials.ReviewShow',compact('reviews'));

        }
        return '';


    }
}
