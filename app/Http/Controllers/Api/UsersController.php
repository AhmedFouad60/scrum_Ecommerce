<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;


class UsersController extends Controller
{
    use ApiResponseTrait;

    public function signup(Request $request){
        //validation
        $validate=Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',

        ]);
        if($validate->fails()){
            return $this->apiResponse(null,$validate->errors(),442);
        }


        $user= User::create($request->all());

        if ($user) {
            $token = JWTAuth::fromUser($user);

            return response()->json([compact('token')]);

        }

        $this->unKnowError();
    }

}
