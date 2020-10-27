<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class faqfontpages extends Model
{
    protected $table = 'faqfontpages';

    protected $fillable = [
             'question_font',
             'quention_ans_font',
    ];
}
