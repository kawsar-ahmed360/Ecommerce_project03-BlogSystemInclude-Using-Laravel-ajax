<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddCatergory;
use App\subcategory;
class Subcategorsy extends Controller
{
     function addcategoy(){
    	$data = AddCatergory::OrderBy('category_name','asc')->get();
    	return view('backend.subcategory.create',compact('data'));
    }

    function categorypost(Request $Request){

    	$role = [
       "sub_name"=>'required|min:5'
    	];

    	$this->validate($Request,$role);

        subcategory::create($Request->all());

        return redirect()->back()->with('success','data inserted');
    }


    function categoryview(){
    	$dataone = subcategory::all();

    	return view('backend.subcategory.viewsub',compact('dataone'));
    }
}
