<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\AddCatergory;
use App\cart;
use App\shippings;
use App\sale;
use App\billings;
use App\product_visitors;
use carbon\carbon;
use App\blogcomments;
use App\social_icons;
use App\blogs;
use App\User;
use App\blogpostcounts;
use App\blogpostviews;
use App\product_reviews;
use Illuminate\support\facades\auth;


class fontController extends Controller
{
    function font(){
        $item = products::get();
        
        
      

       if (billings::where('product_id',products::with('id'))) {
          $bestsel = billings::limit(8)->inRandomorder()->get();
       }


    	return view('fontend.main',compact('item','bestsel'));
    }

    function about(){

      $product_id = products::get('id');

     

     $billings_id = billings::get('product_id');

     if (billings::where($billings_id,$product_id)) {

       $viewbestpro = billings::limit(4)->inRandomorder()->get();
      
     }

    	return view('fontend.about',compact('viewbestpro'));
    }

    function contact(){
    	return view('fontend.contact');
    }

    function blogs(){

      $blogview = blogs::paginate(6);
      $User = User::all();
    	return view('fontend.blog',compact('blogview','User'));
    }



    function blogsdetails($slug){

         $blogdetais = blogs::where('slug',$slug)->first();

           session(['blogslug'=>$blogdetais->slug]);

             $all = blogcomments::where('blogslug',$blogdetais->slug)->paginate(4);
  

        $social = social_icons::get();

      $user = User::all();

      //..............resent post...........

     

     $resentproduct=blogs::orderBy('id', 'desc')->take(5)->get();

      //..............resent post........
       
      $user_ip = $_SERVER['REMOTE_ADDR'];

      $viewcount = blogpostviews::where('blog_id',$blogdetais->id)->where('user_ip',$user_ip)->first();

      if ($viewcount) {
        blogpostviews::increment('viewcount');
      }else{

        blogpostviews::insert([
        'blog_id'=>$blogdetais->id,
        'user_ip'=>$user_ip,
        'viewcount'=>1,
        ]);


      }

      $blogpostviews = blogpostviews::get();


      $next = blogs::where('slug','>',$slug)->first();

     
    	return view('fontend.blog_details',compact('blogdetais','social','all','user','resentproduct','blogpostviews','next'));
    }

     



    function shop(){
        $category = AddCatergory::OrderBy('category_name','asc')->get();
        $allpro = products::all();
    	return view('fontend.shop',compact('category','allpro'));
    }

    function shopcard(){
    	return view('fontend.shopping_cart');
    }

    function single($slug){


      $single =  products::where('slug',$slug)->first();


       session(['slug'=>$single->slug]);
       
      $itema = products::where('category_id',$single->category_id)->limit(4)->inRandomorder()->get();

      //............product view count..

      $ip_Add =  $_SERVER['REMOTE_ADDR'];

      $visitor = product_visitors::where('product_id',$single->id)->where('user_ip',$ip_Add)->first();

      if ($visitor) {

         product_visitors::increment('visitor');

      }else{

         product_visitors::insert([
       'product_id'=>$single->id,
       'visitor'=>1,
       'user_ip'=>$ip_Add,
      ]);

      }

      $viewadd = product_visitors::get();

      //........view count end 


      //............review count.........
      

      
    $ceckreview= billings::where('user_id',Auth::User()->id ?? ' ')->where('product_id',$single->id)->exists();


      $prodcut_reviewss= product_reviews::where('slug',$single->slug)->get();
    
   
  
        return view('fontend.single',compact('single','itema','viewadd','ceckreview','prodcut_reviewss'));
    }





    function singlecard($product_id){
  

      $ip_Add =  $_SERVER['REMOTE_ADDR'];

      if (cart::where('product_id',$product_id)->where('user_ip',$ip_Add)->exists()) {
         
         cart::where('product_id',$product_id)->where('user_ip',$ip_Add)->increment('product_quentity');
      }else{

          cart::insert([

           'product_id'=>$product_id,
           'user_ip'=>$ip_Add,
           'created_at'=>carbon::now(),
      ]);

      }


      return back();

        


    }


   function cart(){
 
        $user_ip = $_SERVER['REMOTE_ADDR'];
        $carts = cart::where('user_ip',$user_ip)->get();

        return view('fontend.cart',compact('carts'));
    }

    function wishlist(){

      return view('fontend.wishlist');
    }


    function faqpage(){
      return view('fontend.faq');
    }



    

  



    
  

   
}
