<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class replaymessages extends Model
{
    protected $table = 'replaymessages';

    protected $fillable = [
         'name',
        'email',
        'message',
    ];
}
