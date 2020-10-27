<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddCatergory;
use App\subcategory;
use App\products;
use Carbon\Carbon;
use Image;

use App\product_galleries;
use Illuminate\Support\Str;


class ProductController extends Controller
{

    function addcategoy(){
    	$addcategoy = AddCatergory::OrderBy('category_name','asc')->get();
        $addsub = subcategory::OrderBy('sub_name','asc')->get();
    	return view('backend.product.create',compact('addcategoy','addsub'));
    }


    function categorypost(Request $Request){

     $slug = strtolower(str_replace(' ', '-', $Request->product_title));



     $check_slug = products::where('slug',$slug)->count();

     if ($check_slug >0) {
     	
     	$slug = $slug.'-'.time();//ami slug take .-. concate korlam and time() add kore dilam jate kore eita unique hoy

     }
          

     if ($Request->hasFile('product_thummel')) {
  	
     	$image = $Request->file('product_thummel');

     	$full_name = $slug.'.'.$image->getClientOriginalExtension();

     	Image::make($image)->resize(300, 330)->save(public_path('image/product_image/'.$full_name));


     	$product_id = products::insertGetId([
           'category_id'=>$Request->category_id,
		'subcategory_id'=>$Request->subcategory_id,
		'product_title'=>$Request->product_title,
		'product_summery'=>$Request->product_summery,
		'product_price'=>$Request->product_price,
		'slug'=>$slug,
		'product_description'=>$Request->product_description,
		'product_quentity'=>$Request->product_quentity,
		'product_thummel'=>$full_name,
		'created_at'=>Carbon::now(),
    	]);

        if ($Request->hasFile('product_gellary')) {
             
       $img2 = $Request->file('product_gellary');

       foreach ($img2 as $key => $items) {
            $full_nam2 = time().$key.'.'.$items->getClientOriginalExtension();

         Image::make($items)->resize(300, 330)->save(public_path('image/product_gellary/'.$full_nam2));

         product_galleries::insert([
        
        'product_id'=>$product_id,
        'product_gellary'=>$full_nam2,
        'created_at'=>Carbon::now(),

         ]);
       }

        
    }

    	return redirect()->back()->with('success','data successfully inerted');

    	
     }else{


     $product_id = products::insertGetId([
           'category_id'=>$Request->category_id,
		'subcategory_id'=>$Request->subcategory_id,
		'product_title'=>$Request->product_title,
		'product_summery'=>$Request->product_summery,
		'product_price'=>$Request->product_price,
		'slug'=>$slug,
		'product_description'=>$Request->product_description,
		'product_quentity'=>$Request->product_quentity,

		'created_at'=>Carbon::now(),
    	]);



         if ($Request->hasFile('product_gellary')) {
             
       $img2 = $Request->file('product_gellary');

       foreach ($img2 as $key => $items) {
            $full_nam2 = $time().$key.'.'.$items->getClientOriginalExtension();

         Image::make($items)->resize(300, 330)->save(public_path('image/product_gellary/'.$full_nam2));
          product_galleries::insert([
        
        'product_id'=>$product_id,
        'product_gellary'=>$full_nam2,
        'created_at'=>Carbon::now(),

         ]);

       }

        
    }


    	return redirect()->back()->with('success','data successfully inserted');
     }

    	
      
    }

    function productview(){
    	$datatow = products::all();

    	return view('backend.product.product_view',compact('datatow'));
    }






    function productedite($id){
    	$addcategoy = AddCatergory::OrderBy('category_name','asc')->get();
    	$addsub = subcategory::OrderBy('sub_name','asc')->get();
    	$dataedite = products::find($id);
      $multiple = product_galleries::where('product_id',$dataedite->id)->get();
   
        session(['id' => $id]);
    	return view('backend.product.product_edite',compact('dataedite','addcategoy','addsub','multiple'));

    }


    






    function productuppdsate(Request $Request){

       $id=  $Request->session()->get('id');

          $old_prod = products::find($id);

       
            

             $slug = $old_prod->slug;

                $old_immg = $old_prod->product_thummel;
  
                  if ($Request->hasFile('product_thummel')) {

                       $image = $Request->file('product_thummel');
             
                            $full_name = $slug.'.'.$image->getClientOriginalExtension();


                          if (file_exists(public_path('image/product_image/').$old_immg)) {
        
                       unlink(public_path('image/product_image/').$old_immg);
                    }
 
                Image::make($image)->resize(300, 330)->save(public_path('image/product_image/'.$full_name));

        $prodcut_update = products::find($id)->update([

          'category_id'=>$Request->category_id,
           'subcategory_id'=>$Request->subcategory_id,
              'product_title'=>$Request->product_title,
                'product_thummel'=>$full_name,
                 'product_summery'=>$Request->product_summery,
               'product_price'=>$Request->product_price,
           'product_description'=>$Request->product_description,
        'product_quentity'=>$Request->product_quentity,
       
        'updated_at'=>Carbon::now(),
        ]);



          



     return redirect()->route('add-product-viewss')->with('success','data success update');
        
     }else{


       products::find($id)->update([
           'category_id'=>$Request->category_id,
        'subcategory_id'=>$Request->subcategory_id,
        'product_title'=>$Request->product_title,
        'product_summery'=>$Request->product_summery,
        'product_price'=>$Request->product_price,
        'product_description'=>$Request->product_description,
        'product_quentity'=>$Request->product_quentity,
        'updated_at'=>Carbon::now(),
        ]);

         return redirect()->route('add-product-viewss')->with('success','data success update');

             
     }


     


    }

    function productdete($id){
          
      $imgdele = products::find($id);

      $img = $imgdele->product_thummel;


      if (file_exists(public_path('image/product_image/').$img)) {
        unlink(public_path('image/product_image/').$img);
       
       $imgdele->delete();

       return redirect()->back()->with('deleted','product successfully deleted');

      }else{
         $imgdele->delete();

       return redirect()->back()->with('deleted','product successfully deleted');
      }


            }

 

}
