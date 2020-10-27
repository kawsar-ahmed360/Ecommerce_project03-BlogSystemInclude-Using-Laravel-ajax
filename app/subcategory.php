<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    protected $table = '_subcategory';

    protected $fillable = ['sub_name','category_id'];
}
