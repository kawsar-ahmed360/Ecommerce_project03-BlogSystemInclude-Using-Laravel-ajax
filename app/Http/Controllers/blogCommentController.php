<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blogcomments;
use carbon\carbon;
use Image;

class blogCommentController extends Controller
{

	function postcomment(Request $Request){

        $blogslug =$Request->session()->get('blogslug');

		$role = [
         'name'=>'required',
         'email'=>'required',
         'commenter_image'=>'required',
         'comment'=>'required',
         
		];

		$this->validate($Request,$role);

		$slug = strtolower(str_replace(' ', '-', $Request->name));

		$checkslug = blogcomments::where('slug',$slug)->count();

		if ($checkslug>0) {
			
			$slug = $slug.'-'.time();
		}


		if ($Request->hasFile('commenter_image')) {
			
			$image = $Request->file('commenter_image');

			$full_name = $slug.'.'.$image->getClientOriginalExtension();

             Image::make($image)->resize(300, 330)->save(public_path('image/commenter_image/'.$full_name));

           blogcomments::insert([
         'name'=>$Request->name,
         'email'=>$Request->email,
         'comment'=>$Request->comment,
         'commenter_image'=>$full_name,
         'slug'=>$slug,
         'blogslug'=>$blogslug,
         'created_at'=>carbon::now(),
          ]);

           return back();
 

		}else{

        blogcomments::insert([
         'name'=>$Request->name,
         'email'=>$Request->email,
         'comment'=>$Request->comment,
         'slug'=>$slug,
         'created_at'=>carbon::now(),
          ]);

        return back();

		}



		}

		function postcommentview(){

			$allview =blogcomments::paginate(4);

			return view('backend.blog_comment.view',compact('allview')); 
		}

		function postcommentdelete($id){
        blogcomments::find($id)->delete();

        return redirect()->route('postcommentview')->with('delted','comment successfully deleted');

		}
    
}
