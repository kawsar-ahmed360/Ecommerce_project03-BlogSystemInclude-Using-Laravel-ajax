<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $table = 'cart';

    protected $fillable = [
    'product_id',
    'product_quentity',
    'user_id',
    'user_ip',
    ];

    function products(){
    	return $this->belongsTo('App\products','product_id');
    }
}
