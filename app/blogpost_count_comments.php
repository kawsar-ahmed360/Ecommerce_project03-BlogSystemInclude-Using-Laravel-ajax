<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blogpost_count_comments extends Model
{
    protected $table ='blogpost_count_comments';

    protected $fillable = [
   'user_id',
   'blogslug',
   'comment_count',
    ];
}
