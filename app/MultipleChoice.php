<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultipleChoice extends Model
{
     protected $fillable = ['name' ,'user_id','option_a', 'option_b','option_c','option_d','correctanswer','category'];

     protected $table = 'multiplechoices';
}
