<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\singleproductfaq;
use carbon\carbon;

class SinglePorductFAQ extends Controller
{
    
    function create(){

    	return view('backend.single_product_FAQ.create_faq');
    }

    function createfaqpost(Request $Request){
  
  $role = [
 'question'=>'required',
 'quention_ans'=>'required',
  ];

  $this->validate($Request,$role);

 singleproductfaq::insert([
     'question'=>$Request->question,
      'quention_ans'=>$Request->quention_ans,
      'created_at'=>carbon::now(),
 ]);

 return redirect()->back()->with('success','data successfully inserted');

    }

    function createfaqview(){

    	$allview = singleproductfaq::all();

    	return view('backend.single_product_FAQ.view',compact('allview'));
    } 


    function createfaqedite($id){

    	$editeid =singleproductfaq::find($id);
         session(['id'=>$id]);
    	return view('backend.single_product_FAQ.edite',compact('editeid'));
    }

    function createfaqupdate(Request $Request){

    	$id = $Request->session()->get('id');

    	
        
        singleproductfaq::find($id)->update([
        	 'question'=>$Request->question,
             'quention_ans'=>$Request->quention_ans,
             'updated_at'=>carbon::now(),

        ]);

        return redirect()->route('createfaqview')->with('update','data successfully updated');

    }

    function createfaqdeleted($id){

    	singleproductfaq::find($id)->delete();

    	return redirect()->route('createfaqview')->with('delted','data successfully deleted');
    }

 
}
