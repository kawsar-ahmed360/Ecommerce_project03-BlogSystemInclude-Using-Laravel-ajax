<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blogpostviews extends Model
{
    protected $table = 'blogpostviews';

    protected $fillable = [
   'user_id',
   'blog_id',
   'user_ip',
   'viewcount',
    ];

    function blogs(){
    	return $this->belongsTo('App\blogs','blog_id');
    }
}
