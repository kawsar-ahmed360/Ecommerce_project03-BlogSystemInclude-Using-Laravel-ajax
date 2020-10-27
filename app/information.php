<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class information extends Model
{
    protected $table ='information';

    protected $fillable = [
                  'email',
                  'phone_number',
                  'address',
                  
    ];
}
