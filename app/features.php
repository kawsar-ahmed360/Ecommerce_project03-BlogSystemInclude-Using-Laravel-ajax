<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class features extends Model
{
    protected $table = 'features';

    protected $fillable = [
       'Product_title',
       'product_image',
       'slug',
    ];
}
