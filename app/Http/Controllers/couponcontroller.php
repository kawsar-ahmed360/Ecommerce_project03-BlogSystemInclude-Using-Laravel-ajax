<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\_coupon;
use carbon\carbon;

class couponcontroller extends Controller
{
    function insert(){
    	return view('backend.coupon.create');
    }


    function couponpost(Request $Request){
            

            $role = [
              'coupon_code'=>'required',
              'coupon_discount'=>'required|numeric',
             'validaty'=>'required',
            ];

            $this->validate($Request,$role);


            _coupon::insert([
              'coupon_code'=>$Request->coupon_code,
              'coupon_discount'=>$Request->coupon_discount,
              'validaty'=>$Request->validaty,
              'created_at'=>carbon::now(),
            ]);

            return redirect()->back()->with('success','data sucesfully inserted');

    }

    function couponview(){

    	$couponview = _coupon::all();

    	return view('backend.coupon.viewcoupon',compact('couponview'));
    }


    function coupondelted($id){

    	$delte = _coupon::find($id);
    	  $delte->delete();

    	return redirect()->route('couponview')->with('delted','data sucesfully deleted');
    }
}
