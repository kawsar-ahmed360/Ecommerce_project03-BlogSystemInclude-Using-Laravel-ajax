<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contacts;
use carbon\carbon;
use App\replaymessages;
use App\Mail\Cliendreplay;
use Illuminate\support\facades\Mail;

class Contactpage extends Controller
{
    function aboutpost(Request $Request){
     
     $role = [
           'fname'=>'required',
           'email'=>'required',
           'subject'=>'required',
           'msg'=>'required',
     ];

     $this->validate($Request,$role);

     contacts::insert([
        'fname'=>$Request->fname,
        'email'=>$Request->email,
        'subject'=>$Request->subject,
        'msg'=>$Request->msg,
        'created_at'=>carbon::now(),
     ]);

     return redirect()->back();

    }


    function aboutpostview(){
    	$allmess = contacts::all();

    	return view('backend.message.view',compact('allmess'));
    }

    function aboutpostdelete($id){

    	contacts::find($id)->delete();

    	return redirect()->route('aboutpostview')->with('delted','message successfully deleted');
    }


    function aboutpostupdate($id){
    

  $seenunseen= contacts::find($id);

 
  if ($seenunseen->role ==1) {
    
     $seenunseen->increment('role');

  }elseif ($seenunseen->role ==2) {
      
      $seenunseen->decrement('role');
  }

  
   return back();
    
     

    }

    function aboutpostreplay($id){

        $replay = contacts::find($id);;

        return view('backend.message.replayform',compact('replay'));
    }

    function aboutpostreplaypost(Request $Request){

     replaymessages::insert([
     

       'name'=>$Request->name,
       'email'=>$Request->email,
       'message'=>$Request->message,

     ]);


  $mail = replaymessages::get();

  Mail::to($Request->email)->send(new Cliendreplay($mail));

     return redirect()->route('aboutpostview');


    }

 

  
}
