<?php

namespace App\Http\Controllers;
use Hash;
use App\User;
use  Illuminate\support\facades\redirect;
use Illuminate\support\facades\Auth;

use Illuminate\Http\Request;

class PasswordChange extends Controller
{
    function passpage(){
    	return view('auth.passwords.passwordchange');
    }

    function changepass(Request $Request){

    	$password = Auth::User()->password;
    	$oldpass = $Request->oldpass;

    	if (Hash::check($oldpass,$password)) {
    		
    		$user = User::find(Auth::id());
    		$user->password = Hash::make($Request->password);
    		$user->save();

    		Auth::logout();

    		return redirect()->route('login')->with('data','data one');


    	}else{
    		return redirect()->back();
    	}
    }

}
