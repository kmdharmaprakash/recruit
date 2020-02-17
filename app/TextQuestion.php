<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextQuestion extends Model
{
    protected $fillable = ['question','user_id','category','answer'];
    protected $table = 'textquestions';
}
