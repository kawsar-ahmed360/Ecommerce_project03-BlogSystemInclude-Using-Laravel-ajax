<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_visitors extends Model
{
    protected $table= 'product_visitors';

    protected $fillable =[
      'product_id',
      'visitor',
      'user_ip',
    ];
}
