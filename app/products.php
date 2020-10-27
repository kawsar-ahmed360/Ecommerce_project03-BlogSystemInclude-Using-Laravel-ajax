<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{

	
    

    	protected $table = 'products';
	protected $fillable = ['category_id','subcategory_id','product_title','product_summery','product_price','slug','product_description','product_quentity','product_thummel'];



  function AddCatergory(){
  	return $this->belongsTo('App\AddCatergory','category_id');
  }

  function subcategory(){
  	return $this->belongsTo('App\subcategory','subcategory_id');
  }

  
}
