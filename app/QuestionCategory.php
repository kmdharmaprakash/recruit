<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
   protected $fillable = ['category'];
   protected $table = 'categories';
}
