<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class countries extends Model
{
    protected $table = 'countries';

    protected $fillable = [
     'sortname',
     'name',
     'phonecode',
    ];
}
