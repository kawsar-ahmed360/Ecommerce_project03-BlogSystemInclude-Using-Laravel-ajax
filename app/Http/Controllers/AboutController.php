<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\abouts;
use carbon\carbon;
use App\products;
use App\AddCatergory;
use App\cart;
use App\shippings;
use App\sale;
use App\billings;


class AboutController extends Controller
{

    
  



    function aboutcreate(){

    	return view('backend.about.create');
    }

    function aboutcreatepost(Request $Request){

    	$role = [
        'about_title'=>'required',
        'about_description'=>'required',
    	];

    	$this->validate($Request,$role);

       abouts::insert([
        'about_title'=>$Request->about_title,
        'about_description'=>$Request->about_description,
        'created_at'=>carbon::now(),
       ]);

       return redirect()->back()->with('success','data successfully inserted');
    }

    function aboutcreateview(){

    	$all = abouts::all();

    	return view('backend.about.view',compact('all'));
    }

    function aboutcreatedite($id){
    	$edite = abouts::find($id);
        session(['id'=>$id]);
    	return view('backend.about.edite',compact('edite'));
    }


    function aboutcreatupdate(Request $Request){
        
        $id = $Request->session()->get('id');

        abouts::find($id)->update([
         'about_title'=>$Request->about_title,
         'about_description'=>$Request->about_description,
         'updated_at'=>carbon::now(),
        ]);

        return redirect()->route('aboutcreateview')->with('update','data successfully updated');

    }
}
