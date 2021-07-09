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

Route::get('/test', function () {
    return view('landing');
});

// Route::get('/exam',function(){
// 	return view('/exam.create');
// });

Auth::routes();

Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('examinfo','ExaminfoController')->middleware('auth');
Route::resource('makequestion' , 'QuestionController')->middleware('auth');
Route::resource('student','StudentController')->middleware('auth');
Route::resource('answer','AnswerController')->middleware('auth');
Route::resource('result' , 'ResultController')->middleware('auth');
Route::resource('profile' , 'ProfileController')->middleware('auth');

Route::get('/exam/students/{exam_id}', 'ExaminfoController@show_students')->name('exam.students');


#admin routes
Route::resource('/admin', 'AdminController')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});


