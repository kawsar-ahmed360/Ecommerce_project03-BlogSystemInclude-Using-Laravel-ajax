<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class imgcontroller extends Controller
{
    
    function image(){
    	return view('image.image');
    }

    function imagepost(Request $Request){



    	$image = $Request->file('image');


       $data= array();

    	foreach ($image as $image) {

    	 	$image_ext = strtolower($image->getClientOriginalName());

    		$image_name = hexdec(uniqid());

    		$image_full = $image_name.'.'.$image_ext;

    		$location = 'public/image/';

    		$location_path = $location.$image_full;

    		$image->move($location,$location_path);
           
           $data['image'] = $location_path;
    	

    
    	 }

    	  DB::table('ultimage')->insert(['image'=>implode('|',$data)]);


          return redirect()->back()->with('sucess','image uplorad sucess');
    		
    		
    	

    }

    function showone(){

    	$images =  DB::table('ultimage')->SELECT('*')->get();
    	return view('image.showimage',compact('images'));
    }
}
