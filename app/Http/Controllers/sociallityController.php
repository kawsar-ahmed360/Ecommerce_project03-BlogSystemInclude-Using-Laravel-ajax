<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\user;
use Illuminate\support\facades\auth;

class sociallityController extends Controller
{
    

     public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {


        $user = Socialite::driver('github')->user();

        $checkuser = User::where('provider_id',$user->getId())->where('email',$user->getEmail())->first();

        if ($checkuser) {

        	auth()->login($checkuser);
 
    

        }else{
        	 $login=User::insert([
          'name'=>$user->getName(),
          'email'=>$user->getEmail(),
          'provider_id'=>$user->getId(),
          'provider_name'=> 'github',
        ]);

        	 auth()->login($login);
        }

     
       return redirect('home');

      



    }





}
