<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class social_icons extends Model
{
   protected $table = 'social_icons';

    protected $fillable= ['social_icon','social_link'];
}
