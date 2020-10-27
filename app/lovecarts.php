<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lovecarts extends Model
{
    protected $table = 'lovecarts';

    protected $fillable = [


  'user_id',
  'product_id',
  'user_ip',
  'product_quentity',
 
    ];

    function products(){
    	return $this->belongsTo('App\products','product_id');
    }
}
