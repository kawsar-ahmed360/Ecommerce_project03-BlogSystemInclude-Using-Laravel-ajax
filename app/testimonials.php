<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testimonials extends Model
{
    protected $table = 'testimonials';

    protected $fillable = [
  'cliend_comment',
  'cliend_name',
  'client_profession',
  'client_image',
  'slug',
    ];
}
