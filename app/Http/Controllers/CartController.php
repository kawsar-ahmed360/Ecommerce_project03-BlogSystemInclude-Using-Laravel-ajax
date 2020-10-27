<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cart;
use carbon\carbon;
use App\_coupon;
use App\lovecarts;

class CartController extends Controller
{
    
  
function cart($coupon= ''){

	if ($coupon == '') {
		$discount = 0;
		  $user_ip = $_SERVER['REMOTE_ADDR'];
        $carts = cart::where('user_ip',$user_ip)->get();

        return view('fontend.cart',compact('carts','discount'));
	}else{

		if (_coupon::where('coupon_code',$coupon)->exists()) {

               $validity= _coupon::where('coupon_code',$coupon)->first()->validaty;
                
               if (carbon::now()->format('y-m-d') <= $validity) {
               	 $user_ip = $_SERVER['REMOTE_ADDR'];
                 $carts = cart::where('user_ip',$user_ip)->get();
                 $discount = _coupon::where('coupon_code',$coupon)->first()->coupon_discount;

                 session(['discounts'=>$discount]);
                 return view('fontend.cart',compact('carts','discount'));
               }else{

               	return "expride";
               }

			
		
		}else{
			return "nai";
		}

		 

	}
 
      
    }

    function cartdelete($cart_id){


    	$user_ip = $_SERVER['REMOTE_ADDR'];

    	cart::where('id',$cart_id)->where('user_ip',$user_ip)->delete();

    	return back();
    }

    function cartupdate(Request $Request){

         foreach ($Request->update_id as $key => $items) {
         	
         	  cart::find($items)->update([
              'product_quentity'=>$Request->product_quentity[$key],
              'updated_at'=>carbon::now()
         	  ]);
         }

         return back();

    }



    function lovecart($lovecart){

      $user_ip = $_SERVER['REMOTE_ADDR'];

      if (lovecarts::where('product_id',$lovecart)->where('user_ip',$user_ip)->exists()) {
        lovecarts::where('product_id',$lovecart)->where('user_ip',$user_ip)->increment('product_quentity');
        return back();
      }else{
       
       lovecarts::insert([
         'product_id'=>$lovecart,
         'user_ip'=>$user_ip,
       ]);

       return back();
     }

    }



  




}
