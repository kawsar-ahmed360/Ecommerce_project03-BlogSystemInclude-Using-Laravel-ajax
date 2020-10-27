<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product_reviews;
use carbon\carbon;

class productReviewController extends Controller
{
    function product_reviewpost(Request $Request){

      $slug = $Request->session()->get('slug');
 
     $role = [
       'a'=>'required',
      'name'=>'required',
      'email'=>'required',
      'massage'=>'required',
     ];

     $this->validate($Request,$role);

     product_reviews::insert([
      'a'=>$Request->a,
      'name'=>$Request->name,
      'email'=>$Request->email,
      'massage'=>$Request->massage,
      'slug'=>$slug,
      'created_at'=>carbon::now(),
     ]);

     return back();
     
    }

    function product_reviewview(){

    	$allview = product_reviews::paginate(4);

    	return view('backend.product_review.view',compact('allview'));
    }

    
}
