<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');\

Route::group(['middleware' => 'userlogin'],function(){
	Route::get('/profile','ProfileController@profile');

Route::post('/editprofile','ProfileController@editProfile');

Route::get('/questioncategory','QuestionCategoryController@questioncategory');
Route::post('/addcategory','QuestionCategoryController@addCategory');
Route::get('/categorytypes','QuestionCategoryController@categories');

Route::get('/addquestions','AllQuestionController@addquestions');
Route::get('/multiplechoice','AllQuestionController@multiplechoice');
Route::post('/addmultiplechoice','AllQuestionController@Multiple');
Route::get('/trueorfalse','AllQuestionController@trueorfalse');
Route::post('/addtrueorfalse','AllQuestionController@addTorF');

Route::get('/textquestion','AllQuestionController@textquestion');
Route::post('/addtextquestion','AllQuestionController@addText');

Route::get('/allquestions','QuestionViewer@allquestions');
Route::get('/seeallMultiple','QuestionViewer@allMultiple');
Route::get('/seealltorf','QuestionViewer@allTorF');
Route::get('/seealltextq','QuestionViewer@allTextQ');
});

