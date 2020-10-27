<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blogs extends Model
{
    protected $table = 'blogs';

    protected $fillable = [
     'blog_category',
     'blog_title',
     'blog_description',
     'blog_image',
     'slug',
     'user_id'
    ];


    function AddCatergory(){
    	return $this->belongsTo('App\AddCatergory','blog_category');
    }

    function user(){
    return $this->belongsTo('App\user','user_id');
    }
}
