<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\social_icons;
use carbon\carbon;

class fontsocialcontroller extends Controller
{
    
    function createicon(){
    	return view('backend.social_icon.create');
    }



    function createiconpost(Request $Request){

    	$role = [
        'icon_name'=>'required|is_numeric'
    	];

       social_icons::insert([
     'social_icon'=>$Request->social_icon,
     'social_link'=>$Request->social_link,
     'created_at'=>carbon::now(),
       ]);

       return redirect()->back()->with('success','data sucessfully inserted');
    }


    function createiview(){

    	$viewall = social_icons::all();

    	return view('backend.social_icon.viewicon',compact('viewall'));
    }

    function socila_iconedite($id){

    	$edite = social_icons::find($id);
         session(['id'=>$id]);
    	return view('backend.social_icon.edite',compact('edite'));
    }


    function socila_iconeupdate(Request $Request){
       
       $id = $Request->session()->get('id');

        social_icons::find($id)->update([
          'social_icon'=>$Request->social_icon,
           'social_link'=>$Request->social_link,
           'updated_at'=>carbon::now(),
        ]);

        return redirect()->route('createiview')->with('update','data successfully updated');

    }



   function socila_icondelte($id){
   
   social_icons::find($id)->delete();

   return redirect()->back()->with('delted','data sucessfully delted');

   }


   




}
