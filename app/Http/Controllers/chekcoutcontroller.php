<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\countries;
use App\cities;
use App\states;
use App\cart;
use App\products;
class chekcoutcontroller extends Controller
{



    function __construct(){

    	$this->Middleware('auth');
    }
    

    function checkout(Request $Request){

      
    	$country = countries::OrderBy('name','asc')->get();
        $userdata = auth::user();

           $user_ip = $_SERVER['REMOTE_ADDR'];
         $cartsin = cart::where('user_ip',$user_ip)->get();


         $total = 0;
         $quen=0;
         
         foreach ($cartsin as $key => $value) {
         	$total +=$value->products['product_price'] * $value->product_quentity;
          
              $quen += $value->product_quentity;

                  }


         session(['total'=>$total]);

         $discount = $Request->session()->get('discounts');


    	return view('fontend.checkout',compact('userdata','country','total','quen','discount'));
    }

    function countryget($country_id){

    	$state = states::where('country_id',$country_id)->get();
    	return response()->json($state);
    }


     function statetryget($state_id){

    	$city = cities::where('state_id',$state_id)->get();
    	return response()->json($city);
    }






}
