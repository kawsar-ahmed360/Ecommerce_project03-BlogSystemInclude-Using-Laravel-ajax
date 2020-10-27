<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class billings extends Model
{
    protected $table = 'billings';
    protected $fillable = [
    'user_id',
    'sale_id',
    'product_id',
    'product_price',
    'product_quentity',
     ];

     function products(){
     	 return $this->belongsTo('App\products','product_id');
     }

      

       
}
