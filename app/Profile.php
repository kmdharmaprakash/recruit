<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    
   protected $fillable = [
    	'name' ,'user_id' ,'lastname', 'designation', 'companyname' , 'profilepic',
    ];
}
