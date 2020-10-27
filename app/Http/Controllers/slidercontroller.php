<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sliders;
use carbon\carbon;
use Image;

class slidercontroller extends Controller
{
    function createslider(){
    	return view('backend.slider.create');
    }

    function createsliderpost(Request $Request){

    	$role = [
       'slider_name'=>'required',
       'slider_summery'=>'required',
       'slider_image'=>'required',
    
    	];

    	$this->validate($Request,$role);

    	$slug = strtolower(str_replace(' ','-', $Request->slider_name));

    	$chekc_slug = sliders::where('slug',$slug)->count();

    	if ($chekc_slug>0) {
    		$slug = $slug.'-'.time();
    	}

    	if ($Request->hasFile('slider_image')) {
    		$image = $Request->file('slider_image');
    	    $full_name = $slug.'.'.$image->getClientOriginalExtension();

    	   Image::make($image)->resize(2050, 1000)->save(public_path('image/slider_image/'.$full_name));

    	   sliders::insert([
           'slider_name'=>$Request->slider_name,
           'slider_summery'=>$Request->slider_summery,
           'slider_image'=>$full_name,
           'slug'=>$slug,
           'created_at'=>carbon::now(),
    	   ]);

    	   return redirect()->back()->with('success','data successfully inserted');


    	}else{

    		sliders::insert([
           'slider_name'=>$Request->slider_name,
           'slider_summery'=>$Request->slider_summery,
           'slug'=>$slug,
           'created_at'=>carbon::now(),
    	   ]);

    	    return redirect()->back()->with('success','data successfully inserted');

    	}


    }

    function createslideview(){

    	$viewall = sliders::all();
    	return view('backend.slider.view',compact('viewall'));
    }


    function createslideedite($id){
        
        $edite = sliders::find($id);
        session(['id'=>$id]);
        return view('backend.slider.edite',compact('edite'));
    }


    function createslidrupdate(Request $Request){

    	$id = $Request->session()->get('id');

    	$old_product = sliders::find($id);

    	$slug = $old_product->slug;

    	$old_img = $old_product->slider_image;



    	if ($Request->hasFile('slider_image')) {
    		
    		$image = $Request->file('slider_image');


    		$full_name = $slug.'.'.$image->getClientOriginalExtension();

    		if (file_exists(public_path('image/slider_image/').$old_img)) {
    			
    			unlink(public_path('image/slider_image/').$old_img);
    		}
 



          Image::make($image)->resize(300, 330)->save(public_path('image/slider_image/'.$full_name));


    		sliders::find($id)->update([
         'slider_name'=>$Request->slider_name,
         'slider_summery'=>$Request->slider_summery,
         'slider_image'=>$full_name,
         'updated_at'=>carbon::now(),
    		]);

    		return redirect()->route('createslideview')->with('update','data successfully update');


    	}else{

    		sliders::find($id)->update([
         'slider_name'=>$Request->slider_name,
         'slider_summery'=>$Request->slider_summery,
         'updated_at'=>carbon::now(),
    		]);

    		return redirect()->route('createslideview')->with('update','data successfully update');

    	}

    }

    function createslidrdelete($id){

    	$old_product = sliders::find($id);

    	$old_img = $old_product->slider_image;

    	if (file_exists(public_path('image/slider_image/').$old_img)) {
    		unlink(public_path('image/slider_image/').$old_img);

    		sliders::find($id)->delete();

    		return redirect()->route('createslideview')->with('delted','data successfully deleted');
    	}else{

    		sliders::find($id)->delete();

    		return redirect()->route('createslideview')->with('delted','data successfully deleted');
    	}

    }
}
