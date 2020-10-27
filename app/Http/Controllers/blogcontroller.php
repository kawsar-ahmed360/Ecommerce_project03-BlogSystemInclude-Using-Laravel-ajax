<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddCatergory;
use App\blogs;
use Image;
use carbon\carbon;

class blogcontroller extends Controller
{
   function blogcontroller(){
    $category = AddCatergory::get();
   	return view('backend.blogPost.create',compact('category'));
   } 

   function blogpsot(Request $Request){
     
     $role = [
   'blog_category'=>'required',
   'blog_title'=>'required',
   'blog_description'=>'required',
   'blog_image'=>'required',
     ];

     $this->validate($Request,$role);

     $slug = strtolower(str_replace(' ', '-', $Request->blog_title));

     $check_slug = blogs::where('slug',$slug)->count();

     if ($check_slug>0) {
      	 $slug = $slug.'.'.time();
      }

      if ($Request->hasFile('blog_image')) {
       	 $image = $Request->file('blog_image');

       	 $full_name = $slug.'.'.$image->getClientOriginalExtension();

       	 	Image::make($image)->resize(800, 500)->save(public_path('image/blog_image/'.$full_name));
            
            blogs::insert([
           'blog_category'=>$Request->blog_category,
           'blog_title'=>$Request->blog_title,
           'blog_description'=>$Request->blog_description,
           'blog_image'=>$full_name,
           'slug'=>$slug,
           'created_at'=>carbon::now(),
            ]);

            return redirect()->back()->with('success','blog data successfully inserted');

       }else{

        blogs::insert([
           'blog_category'=>$Request->blog_category,
           'blog_title'=>$Request->blog_title,
           'blog_description'=>$Request->blog_description,
           'slug'=>$slug,
           'created_at'=>carbon::now(),
            ]);

        return redirect()->back()->with('success','blog data successfully inserted');

       } 
    
   }


   function blogview(){

   	$allvoiew = blogs::paginate(5);

   	return view('backend.blogPost.view',compact('allvoiew'));
   }

   function blogedite($id){

   	$edite = blogs::find($id);
   	$category = AddCatergory::get();
    session(['id'=>$id]);
   	return view('backend.blogPost.edite',compact('edite','category'));
   }


   function blogupdate(Request $Request){
   
   $id = $Request->session()->get('id');

   $old_pro = blogs::find($id);

   $slug = $old_pro->slug;
   $old_image = $old_pro->blog_image;

   if ($Request->hasFile('blog_image')) {
   	 $image = $Request->file('blog_image');

   	 $full_name = $slug.'.'.$image->getClientOriginalExtension();

   	 if (file_exists(public_path('image/blog_image/').$old_image)) {
   	 	 unlink(public_path('image/blog_image/').$old_image);
   	 }

     Image::make($image)->resize(580,400)->save(public_path('image/blog_image/'.$full_name));

     blogs::find($id)->update([
     
           'blog_category'=>$Request->blog_category,
           'blog_title'=>$Request->blog_title,
           'blog_description'=>$Request->blog_description,
           'blog_image'=>$full_name,
           'slug'=>$slug,
           'created_at'=>carbon::now(),

     ]);

     return redirect()->route('blogview')->with('update','blog post successfully update');

   }else{
   
        blogs::find($id)->update([
     
           'blog_category'=>$Request->blog_category,
           'blog_title'=>$Request->blog_title,
           'blog_description'=>$Request->blog_description,
           'Updated_at'=>carbon::now(),

     ]);

     return redirect()->route('blogview')->with('update','blog post successfully update');

   }

   }


   function blogdelete($id){

   	$old_pro = blogs::find($id);

   	$old_image = $old_pro->blog_image;

   	 if (file_exists(public_path('image/blog_image/').$old_image)) {
   	 	 unlink(public_path('image/blog_image/').$old_image);

   	 	 blogs::find($id)->delete();

   	 	  return redirect()->route('blogview')->with('delted','blog post successfully update');

   	 }else{

       blogs::find($id)->delete();

   	 	  return redirect()->route('blogview')->with('delted','blog post successfully update');

   	 }


   }









}
