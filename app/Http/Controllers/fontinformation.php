<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\information;
use carbon\carbon;

class fontinformation extends Controller
{
        function create(){

    	return view('backend.information.create');
    }

    function infoinsert(Request $Request){

    	$role =[
           'email'=>'required|email',
           'phone_number'=>'required',
           'address'=>'required',
        
    	];

    	information::insert([
                  'email'=>$Request->email,
                  'phone_number'=>$Request->phone_number,
                  'address'=>$Request->address,
                  
                  'created_at'=>carbon::now(),
    	]);

    	return redirect()->back()->with('success','information successfully inserted');


    }


    function infoview(){

    	$allviw = information::all();

    	return view('backend.information.view',compact('allviw'));
    }

    function infoedite($id){
    session(['id'=>$id]);
    $edite =information::find($id);

    return view('backend.information.edite',compact('edite'));
    }

 
   function infoupdate(Request $Request){

    $id = $Request->session()->get('id');
    
    information::find($id)->update([
    'email'=>$Request->email,
    'phone_number'=>$Request->phone_number,
    'address'=>$Request->address,
    'updated_at'=>carbon::now()
    ]);

    return redirect()->route('infoview')->with('update','data successfully updated');

   }

}
