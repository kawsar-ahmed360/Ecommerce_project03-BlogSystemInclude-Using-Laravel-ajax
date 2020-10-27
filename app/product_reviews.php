<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_reviews extends Model
{
    protected $table = 'product_reviews';
    protected $fillable = [
      
      'a',
      'name',
      'email',
      'massage',
      'slug',

    ];

    function products(){
    	return $this->belongsTo('App\products','slug');
    }
}
