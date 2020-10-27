<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shippings;
use App\sale;
use App\billings;
use App\cart;
use App\products;

use App\User;
use App\Mail\OrderShipped;
use Illuminate\support\facades\Auth;
use Illuminate\support\facades\Mail;

class paymentcontroller extends Controller
{
    
    function pymentmethod(Request $Request){
    



       $total =$Request->session()->get('total');
       $discounts =$Request->session()->get('discounts');

      
     $shipping_id = shippings::insertGetId([
        'user_id'=>Auth::user()->id,
        'first_name'=>$Request->first_name,
        'last_name'=>$Request->last_name,
        'comphany_name'=>$Request->comphany_name,
        'email'=>$Request->email,
        'phone'=>$Request->phone,
        'country_id'=>$Request->country_id,
        'address'=>$Request->address,
        'state_id'=>$Request->state_id,
        'zip_code'=>$Request->zip_code,
        'city_id'=>$Request->city_id,
        'notes'=>$Request->notes,
      ]);

    $sale_id = sale::insertGetId([
         'user_id'=>Auth::user()->id,
         'shipings_id'=>$shipping_id,
         'product_total'=>$total,
         'discount'=>$discounts,
     ]);


       $user_ip = $_SERVER['REMOTE_ADDR'];
        $carts = cart::where('user_ip',$user_ip)->get();


    foreach ($carts as $key => $cart) {

      if (billings::where('product_id',$cart->product_id)->exists()) {

        billings::where('product_id',$cart->product_id)->increment('product_quentity');
      }else{

        billings::insert([
        
        'user_id'=>Auth::user()->id,
        'sale_id'=>$sale_id,
        'product_id'=>$cart->product_id,
        'product_price'=>$cart->products['product_price'],
        'product_quentity'=>$cart->product_quentity,
    ]);
        
      }

      products::find($cart->product_id)->decrement('product_quentity',$cart->product_quentity);
      
      $cart->delete();

      


    	
    }


    \Stripe\Stripe::setApiKey('sk_test_Rj2bnoUuNJ2NA624lHLaSBWK00doZlfY5H');

\Stripe\Charge::create([
  'amount' => 1000,
  'currency' => 'usd',
   'source'=>$Request->stripeToken,
]);

 $Ordershiping=  billings::where('sale_id',$sale_id)->get();


 Mail::to(Auth::user()->email)->send(new OrderShipped($Ordershiping));

 return back();



  

 

 
    }
}
