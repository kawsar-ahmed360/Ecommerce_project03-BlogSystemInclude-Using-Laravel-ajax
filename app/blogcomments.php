<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blogcomments extends Model
{
    protected $table = 'blogcomments';

    protected $fillable = [
          'name',
          'email',
          'commenter_image',
          'comment',
          'slug',
          'blogslug',
    ];

    function blogs(){
    	return $this->belongsTo('App\blogs','blogslug');
    }
}
