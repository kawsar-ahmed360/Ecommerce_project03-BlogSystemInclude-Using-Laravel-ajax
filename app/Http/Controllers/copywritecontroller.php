<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\copywrites;
use carbon\carbon;

class copywritecontroller extends Controller
{
    function create(){

    	return view('backend.copywrite.create');
    }

    function insert(Request $Request){

    	$role = [
         'copywrite_Add'=>'required'
    	];

    	$this->validate($Request,$role);
      
      copywrites::insert([
       'copywrite_Add'=>$Request->copywrite_Add,
       'created_at'=>carbon::now()
      ]);

      return redirect()->back()->with('success','copywrites successfully inerted');

    }

    function copywriteview(){

    	$allview = copywrites::all();

    	return view('backend.copywrite.view',compact('allview'));
    }



    function copywriteedite($id){

    	$edite = copywrites::find($id);
        session(['id'=>$id]);
    	return view('backend.copywrite.edite',compact('edite'));
    }

    function copywriteupdate(Request $Request){

    	$id = $Request->session()->get('id');

    	copywrites::find($id)->update([
         'copywrite_Add'=>$Request->copywrite_Add,
         'updated_at'=>carbon::now()
    	]);

    	return redirect()->route('copywriteview')->with('update','data successfully updated');

    }



}
