<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class product_galleries extends Model
{
    use SoftDeletes;

    protected $table = 'product_galleries';

    protected $fillable = ['product_id','product_gellary'];
    

    }

