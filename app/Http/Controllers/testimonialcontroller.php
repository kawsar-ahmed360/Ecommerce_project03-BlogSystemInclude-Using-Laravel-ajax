<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\testimonials;
use carbon\carbon;
use Image;

class testimonialcontroller extends Controller
{
    function create(){
    	return view('backend.testimonial.create');
    }

    function testimonialinsert(Request $Request){

    	$role = [
   'cliend_comment'=>'required',
    'cliend_name'=>'required',
    'client_profession'=>'required',
    'client_image'=>'required',

    	];

    	$this->validate($Request,$role);

    	$slug = strtolower(str_replace(' ', '-', $Request->cliend_name));

    	$chekc_slug = testimonials::where('slug',$slug)->count();

    	if ($chekc_slug>0) {
    		
    		$slug = $slug.'-'.time();
    	}

    	if ($Request->hasFile('client_image')) {

    		$image = $Request->file('client_image');
    		
    		$full_name = $slug.'.'.$image->getClientOriginalExtension();

    		Image::make($image)->resize(300, 330)->save(public_path('image/testimonial_image/'.$full_name));

    		testimonials::insert([
            
            'cliend_comment'=>$Request->cliend_comment,
            'cliend_name'=>$Request->cliend_name,
            'client_profession'=>$Request->client_profession,
            'client_image'=>$full_name,
            'slug'=>$slug,
            'created_at'=>carbon::now(),

      		]);

      		return redirect()->back()->with('success','data successfully inserted');


    	}else{

    		testimonials::insert([
            
            'cliend_comment'=>$Request->cliend_comment,
            'cliend_name'=>$Request->cliend_name,
            'client_profession'=>$Request->client_profession,
            'slug'=>$slug,
              'created_at'=>carbon::now(),

      		]);

      		return redirect()->back()->with('success','data successfully inserted');

    	}


    }


    function testimonialview(){
    	$all =testimonials::get();

    	return view('backend.testimonial.view',compact('all'));
    }

    function testimonialedite($id){
      
      $edite = testimonials::find($id);
      session(['id'=>$id]);
      return view('backend.testimonial.edite',compact('edite'));
    }

    function testimonialupdate(Request $Request){
        
        $id = $Request->session()->get('id');

        $old_pro = testimonials::find($id);

        $slug = $old_pro->slug;

        $old_image = $old_pro->client_image;

        if ($Request->hasFile('client_image')) {
         
         $image = $Request->file('client_image');

         $full_name = $slug.'.'.$image->getClientOriginalExtension();

         if (file_exists(public_path('image/testimonial_image/').$old_image)) {
         	 unlink(public_path('image/testimonial_image/').$old_image);
         }

         Image::make($image)->resize(300, 330)->save(public_path('image/testimonial_image/'.$full_name));

         testimonials::find($id)->update([
          

            'cliend_comment'=>$Request->cliend_comment,
            'cliend_name'=>$Request->cliend_name,
            'client_profession'=>$Request->client_profession,
            'client_image'=>$full_name,

         ]);

         return redirect()->route('testimonialview')->with('update','data successfully updated');

        }else{

        	  testimonials::find($id)->update([
          

            'cliend_comment'=>$Request->cliend_comment,
            'cliend_name'=>$Request->cliend_name,
            'client_profession'=>$Request->client_profession,
           

         ]);

        return redirect()->route('testimonialview')->with('update','data successfully updated');

        }
    }

    function testimonialdelted($id){

    	$old_pro = testimonials::find($id);

    	$old_image =$old_pro->client_image;

    	if (file_exists(public_path('image/testimonial_image/').$old_image)) {
    		unlink(public_path('image/testimonial_image/').$old_image);

    		testimonials::find($id)->delete();

    		return redirect()->route('testimonialview')->with('delted','data successfully delted');
    	}else{

    		testimonials::find($id)->delete();

    		return redirect()->route('testimonialview')->with('delted','data successfully delted');
    	}


    }
}
