<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\features;
use carbon\carbon;
use Image;

class featercontroller extends Controller
{
    function createfeature(){
    	return view('backend.feature.create');
    }

    function createfeaturepost(Request $Request){

    	$role = [
             'Product_title'=>'required',
             'product_image'=>'required',

    	];

    	$this->validate($Request,$role);

    $slug = strtolower(str_replace(' ','-', $Request->Product_title));

    $chek_slug =features::where('slug',$slug)->count();

    if ($chek_slug >0) {
            
            $slug = $slug.'-'.time();
      }        


    	if ($Request->hasFile('product_image')) {
             
             $image = $Request->file('product_image');

             $full_image = $slug.'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(300, 330)->save(public_path('image/feature_image/'.$full_image));
         
             features::insert([
              
              'Product_title'=>$Request->Product_title,
              'product_image'=>$full_image,
              'slug'=>$slug,
              'created_at'=>carbon::now(),

             ]);

             return redirect()->back()->with('success','data successfully inserted');

 
    	}else{
    		features::insert([
              
              'Product_title'=>$Request->Product_title,
              'slug'=>$slug,
               'created_at'=>carbon::now(),
             ]);
    		return redirect()->back()->with('success','data successfully inserted');
    	}
    }


    function createfeatureview(){

    	$dataall = features::all();

    	return view('backend.feature.view',compact('dataall'));
    }

    function createfeatureedie($id){

    	$edite = features::find($id);
         session(['id'=>$id]);
    	return view('backend.feature.edite',compact('edite'));
    }

    function createfeatuupdaet(Request $Request){

     $id =$Request->session()->get('id');
      $editeid = features::find($id);
     $slug = $editeid->slug;

     $oldimage =$editeid->product_image;
     

       if ($Request->hasFile('product_image')) {
       	$image = $Request->file('product_image');
       	$full_name1 = $slug.'.'.$image->getClientOriginalExtension();
      
          if (file_exists(public_path('image/feature_image/').$oldimage)) {
          	 unlink(public_path('image/feature_image/').$oldimage);
          }

          Image::make($image)->resize(300, 330)->save(public_path('image/feature_image/'.$full_name1));

          features::find($id)->update([
            'Product_title'=>$Request->Product_title,
            'product_image'=>$full_name1,
            'updated_at'=>carbon::now(),
          ]);

          return redirect()->route('createfeatureview')->with('update','data update successfully');

       }else{

       	 features::find($id)->update([
            'Product_title'=>$Request->Product_title,
            'updated_at'=>carbon::now(),
          ]);

          return redirect()->route('createfeatureview')->with('update','data update successfully');

       }
    

    }

    function createfeatudelete($id){

    	$delteid = features::find($id);

    	$delteimage = $delteid->product_image;

    	if (file_exists(public_path('image/feature_image/').$delteimage)) {
    		unlink(public_path('image/feature_image/').$delteimage);

    		features::find($id)->delete();

    		return redirect()->route('createfeatureview')->with('delted','data update successfully');
    	}else{
    		features::find($id)->delete();

    		return redirect()->route('createfeatureview')->with('delted','data update successfully');
    	}
    }
}
