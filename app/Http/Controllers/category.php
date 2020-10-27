<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddCatergory;

class category extends Controller
{
    

    function addcategoy(){

    	return view('backend.category.create');
    }

    function categorypost(Request $Request){

    	$role =[
          'category_name'=>'required|min:5'
    	];

    	$this->validate($Request,$role);

    	AddCatergory::create($Request->all());

    	return redirect()->back()->with('success','data suceessfully inserted');


    }

    function categoryview(){

    	$data = AddCatergory::all();

    	return view('backend.category.view_category',compact('data'));
    }

    function edite($id){

        $dataedi = AddCatergory::find($id);

        return view('backend.category.edite',compact('dataedi'));
    }


    function categoryUpdate(Request $Request,$id){

        $role = [
    'category_name'=>'required|min:5'
        ];

        $this->validate($Request,$role);

      AddCatergory::find($id)->update($Request->all());

       

       return redirect()->back()->with('success','data suceessfully update');
    }

    function categorydelete($id){

        AddCatergory::find($id)->delete();

        return redirect()->back()->with('delted','data delted');
    }

    function categorysoft(){

        $softda = AddCatergory::onlyTrashed()->get();

        return view('backend.category.softdelte',compact('softda'));
    }

    function permanetdelte($id){

        AddCatergory::onlyTrashed()->find($id)->forceDelete();

        return redirect()->back()->with('perde','data delted');
    }

    function restore($id){

        AddCatergory::onlyTrashed()->find($id)->restore();

        return redirect()->back()->with('rester','data resore');
    }
}
