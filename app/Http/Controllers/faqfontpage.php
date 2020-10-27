<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\faqfontpages;
use carbon\carbon;

class faqfontpage extends Controller
{
    
    function faqfontpage(){

    	return view('backend.FAQ_fontpage.create');
    }

    function faqfontpagepost(Request $Request){

    	$role = [
         'question_font'=>'required',
         'quention_ans_font'=>'required',
    	];

    	$this->validate($Request,$role);

    	faqfontpages::insert([
          'question_font'=>$Request->question_font,
          'quention_ans_font'=>$Request->quention_ans_font,
          'created_at'=>carbon::now(),
    	]);

    	return redirect()->back()->with('success','data successfully inserted');
    }

    function faqfontpageview(){

    	$allview = faqfontpages::paginate(4);

    	return view('backend.FAQ_fontpage.view',compact('allview'));
    }

    function faqfontpagedelete($id){
      
      faqfontpages::find($id)->delete();

      return redirect()->route('faqfontpageview')->with('delted','data successfully delted');

    }

    function faqfontpageedite($id){

    	$edite = faqfontpages::find($id);
      session(['id'=>$id]);
    	return view('backend.FAQ_fontpage.edite',compact('edite')); 
    }

    function faqfontpageupdate(Request $Request){
  
    $id = $Request->session()->get('id');
    
    faqfontpages::find($id)->update([
          'question_font'=>$Request->question_font,
          'quention_ans_font'=>$Request->quention_ans_font,
          'updated_at'=>carbon::now(),
    ]);

    return redirect()->route('faqfontpageview')->with('update','data successfully updated');


    }



}
