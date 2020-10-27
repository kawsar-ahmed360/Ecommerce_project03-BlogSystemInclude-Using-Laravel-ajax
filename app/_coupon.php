<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class _coupon extends Model
{
    protected $table = '_coupon';

    protected $fillable = [
     'coupon_code',
     'coupon_discount',
     'validaty',
    ];
}
