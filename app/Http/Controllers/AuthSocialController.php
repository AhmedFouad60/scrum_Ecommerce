<?php

namespace App\Http\Controllers;

use App\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class AuthSocialController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

//        dd($user);

//// All Providers
//        $user->getId();
//        $user->getNickname();
//        $user->getName();
//        $user->getEmail();
//        $user->getAvatar();

        $selectProvider=Provider::where('provider_id',$user->getId())->first();

        if(!$selectProvider){ //new user

            $user_other_account=User::where('email',$user->getEmail())->first();
            if(!$user_other_account){ //this is the first time register to the website
                $newUser= new User();
                $newUser->name=$user->getName();
                $newUser->email=$user->getEmail();
                $newUser->save();
            }//   he/she register with other social media
                //This will be a registration process
                $newProvider=new Provider();
                $newProvider->provider_id=$user->getId();
                $newProvider->provider=$provider;
                if(!$user_other_account){
                    $newProvider->user_id=$newUser->id;
                    $newProvider->save();
                }else{
                    $newProvider->user_id=$user_other_account->id;
                    $newProvider->save();
                }

        }else{
            //Already registered before  ->Make him/her login
            $loginUser=User::find($selectProvider->user_id);
            auth()->login($loginUser );
            return Redirect('/home');
        }



        return Redirect('/login');




    }
}
