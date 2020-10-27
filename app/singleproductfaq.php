<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class singleproductfaq extends Model
{
    protected $table ='singleproductfaq';

    protected $fillable =[
         'question',
       'quention_ans',
    ];
}
