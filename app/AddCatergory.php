<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddCatergory extends Model
{
	 use SoftDeletes;
	protected $table = '_category';
     protected $fillable = ['category_name',];
}
