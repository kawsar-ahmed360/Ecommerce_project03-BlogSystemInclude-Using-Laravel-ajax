<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sliders extends Model
{
    protected $table = 'sliders';

    protected $fillable = [
    'slider_name',
    'slider_summery',
    'slider_image',
    'slug',
    ];
}
