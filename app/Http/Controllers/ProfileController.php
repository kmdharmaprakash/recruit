<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use App\User;
use App\Profile;
use App\Home;
use Auth;


class ProfileController extends Controller
{
    public function profile(){
    	return view('profiles.profile');
    }

    public function editProfile(Request $request){
    	//return $request->input('name');

    	
    	$this->validate($request,[
    		'name' => 'required',
    		'lastname' => 'required',
    		'designation' => 'required',
    		'companyname' => 'required',
    		'profilepic'  => 'required',
    	]);
	    //return 'validation passed';
	    $profiles = new Profile; //create obj
	    $profiles->name = $request->input('name');
	    $profiles->user_id = Auth::User()->id; 
	    $profiles->lastname = $request->input('lastname');
 		$profiles->designation = $request->input('designation');
 		$profiles->companyname = $request->input('companyname');

 		/*return Auth::user();
 		exit();*/

 		if($request->has('profilepic')){ //want to use $request because of laravel version 6
 			
 			$file = $request->file('profilepic');  //here also
 			$file->move(public_path().'/uploads/',$file->getClientOriginalName());
 			$url = URL::to("/").'/uploads/'.$file->getClientOriginalName();


			/*return $url;
			exit();*/
 		}

        $profiles->profilepic = $url;
        $profiles->save();
        return redirect('/profile')->with('response','profile added successfully');  //here and db userid
        
        //return Auth::User();
        //exit();
	  
    }
}
