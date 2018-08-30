<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function edit($id){

        $user = User::findOrFail($id); //Get user with specified id

        return view('Website.Profile.edit',compact('user'));
    }
    public function update(Request $request,$id){
        $user = User::findOrFail($id); //Get role specified by id
//dd('test');
        //Validate name, email and password fields
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'required|min:6|confirmed'
        ]);
        $input = $request->only(['name', 'email', 'password']); //Retreive the name, email and password fields


        $user->fill($input)->save();

        if($request['image'] !=''){
            $user->picture=$request['image'];
            $user->save();
        }

//        dd($request->all(),$user,$input,$request['image']);

        return redirect()->route('profileEdit',$id)
            ->withInput()
            ->with('flash_message',
                'User successfully edited.');


    }
}
