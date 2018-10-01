<?php

namespace App\Http\Controllers;

use App\Http\Requests\reviewRequest;
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
            //store the review
            $review=review::create($request->all());

        }
        return response()->json(['success'=>'Your review added']);

    }
    public function show($id)
    {
        //
    }
}
