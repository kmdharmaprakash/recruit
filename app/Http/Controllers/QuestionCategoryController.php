<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\QuestionCategory;
use Auth;

class QuestionCategoryController extends Controller
{
	public function questioncategory(){
    return view('questioncategory.questioncategory');

	}
	public function addCategory(Request $request){
		$this->validate($request , [
 			'category' => 'required'
 		]);
 		$category = new QuestionCategory;
 		$category->user_id = Auth::user()->id;
 		$category->category = $request->input('category');
 		$category->save();
 		return redirect('/questioncategory')->with('response', 'question category successfully');
	}
	public function categories(){
		$category = QuestionCategory::where('user_id',"=",Auth::user()->id)->get();
 		return view('categorytypes.categorytypes')->with(['category'=>$category]);
	}

}
