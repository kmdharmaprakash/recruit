<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionCategory;
use Auth;
use App\MultipleChoice;
use App\TextQuestion;
use App\TrueOrFalse;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class AllQuestionController extends Controller
{
    public function addquestions(){
    	return view('Addquestion.addquestion');
    }
    public function multiplechoice(){
    	$categories = QuestionCategory::where('user_id','=',Auth::user()->id)->get();
    	//return $categories;
    	//exit();
    	return view('AddQuestion.multiplechoice',['categories'=>$categories]);
    }
    public function Multiple(Request $request){
    		$this->validate($request,[
   			'question' 		=> 'required',
   			'option_a' 		=> 'required',
   			'option_b' 		=> 'required',
   			'option_c' 		=> 'required',
   			'option_d' 		=> 'required',
   			'category'      => 'required',
   			'correctoption' => 'required',
   		]);

   		$multiplechoice = new MultipleChoice;
   		$multiplechoice->question = $request->input('question');
   		$multiplechoice->user_id  = Auth::user()->id;
   		$multiplechoice->option_a = $request->input('option_a');
   		$multiplechoice->option_b = $request->input('option_b');
   		$multiplechoice->option_c = $request->input('option_c');
   		$multiplechoice->option_d = $request->input('option_d');
   		$multiplechoice->correctoption = $request->input('correctoption');
   		$multiplechoice->category = $request->input('category');

   		//print_r($addquestion);
   		$multiplechoice->save();
        return redirect('multiplechoice')->with('response','question added successfully');
    }
    public function trueorfalse(){
    	$categories = QuestionCategory::where('user_id','=',Auth::user()->id)->get();
      return view('AddQuestion.trueorfalse',['categories'=>$categories]);
    }

    public function addTorF(Request $request){
      $this->validate($request,[
        'question'    => 'required',
        'select'    => 'required',
        'category'    => 'required',
      ]);

      $trueorfalse = new TrueOrFalse;
      $trueorfalse->user_id  = Auth::user()->id;
      $trueorfalse->question = $request->input('question');
      $trueorfalse->select = $request->input('select');
      $trueorfalse->category = $request->input('category');
      //return $trueorfalse;
      //exit();
      $trueorfalse->save();
      return redirect('trueorfalse')->with('response','question added successfully');
    }

    public function textquestion(){
      $categories = QuestionCategory::where('user_id','=',Auth::user()->id)->get();
      return view('AddQuestion.textquestion',['categories'=>$categories]);
    }

    public function addText(Request $request){

         $this->validate($request,[
        'question'    => 'required',
        'answer'    => 'required',
        'category'    => 'required',
      ]);

      $textquestion = new TextQuestion;
      $textquestion->user_id  = Auth::user()->id;
      $textquestion->question = $request->input('question');
      $textquestion->answer = $request->input('answer');
      $textquestion->category = $request->input('category');
      //return $trueorfalse;
      //exit();
      $textquestion->save();
      return redirect('textquestion')->with('response','question added successfully');      
    }
   
}
