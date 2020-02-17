<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use App\MultipleChoice;
use App\AllQuestion;
use App\TrueOrFalse;
use App\TextQuestion;


class QuestionViewer extends Controller
{
    public function allquestions(){
    	
    	return view('allquestions.allquestions');
    }
    public function allMultiple(){

    /*	$ques['ques'] =Addquestion::paginate(5); //paginate used for pagination, to set a link in blade page to multiple pages
    	return view('questioncategory.allquestions',$ques);*/


    		$user_id=Auth::user()->id;
            //$ques = Addquestion::all();
            $ques = MultipleChoice::where('user_id','=',Auth::user()->id)->paginate(10); //query used for display data match with user id and tabl user id
            //we can also give ->get() to display all data,
            //if we use ->paginate() pagination occur in blade,in blade we want to give links()

            //return $ques;
            //exit();    
    		/*$ques = DB::table('users')->join('addquestions',
    			'users.id',"=",'addquestions.user_id')
    			->select('users.*','addquestions.*')
    			->where(['addquestions.user_id' => $user_id])
    			->first();
    			return view('questioncategory.allquestions',['ques' => $ques]);*/
    		  //->get();
    			//return $ques;
    			//exit();
    	       return view('allquestions.allmultiple')->with(['ques' => $ques]); 

    	//return view('allquestions.allmultiple');
    }
    public function allTorF(){
    	$user_id = Auth::user()->id;
    	$torf = TrueOrFalse::where('user_id','=',Auth::user()->id)->paginate(5);
    	return view('allquestions.alltrueorfalse')->with(['torf'=>$torf]);
    }
    public function allTextQ(){
    	    	$user_id = Auth::user()->id;
    	$text = TextQuestion::where('user_id','=',Auth::user()->id)->paginate(5);
    	return view('allquestions.alltextquestion')->with(['text'=>$text]);
    }
}
