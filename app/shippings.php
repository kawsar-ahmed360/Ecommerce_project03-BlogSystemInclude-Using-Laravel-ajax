<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shippings extends Model
{
       protected $table = 'shippings';

    protected $fillable =[
    'user_id',
    'first_name',
     'last_name',
     'comphany_name',
     'email',
     'phone',
     'country_id',
     'address',
     'state_id',
     'zip_code',
     'city_id',
     'notes',
     'payment_status',
    ];
}
