<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrueOrFalse extends Model
{
    protected $fillable = ['question','user_id','select','category'];
    protected $table = 'trueorfalses';
}
