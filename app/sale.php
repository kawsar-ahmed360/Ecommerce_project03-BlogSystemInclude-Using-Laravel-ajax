<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    
    protected $table ='sale';

    protected $fillable = [
    'user_id',
    'shipings_id',
    'product_total',
    'discount',
    ];

   
}
