<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class abouts extends Model
{
    protected $table = 'abouts';

    protected $fillable = ['about_title','about_description'];
}
