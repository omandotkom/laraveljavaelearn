<?php

use Illuminate\Support\Facades\Route;

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
    return view('index',['includepage'=>'layouts.content']);
})->middleware('auth')->name('index');
Route::get('/code','CodeController@show')->name('showcode');
Route::post('/question/save','QuestionController@store')->name('addquestion');
Route::get('/question/{id?}/{ischeck?}/{uid?}','QuestionController@show')->name('viewquestion');
Route::post('/question/id','QuestionController@save')->name('savequestion');
Route::get('/questions','QuestionController@showbyUser')->name('viewallquestions');
Route::post('/question/update','QuestionController@update')->name('updatequestion');
Route::get('/questiondetil/delete/{id}','QuestionController@deletequestiondetil')->name('deletequestiondetil');
Route::get('/viewquestionsanswer/{id}','QuestionController@viewanswerer')->name('viewanswerer');
Auth::routes();
Route::get('/c','CodeController@comptest');
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/answer/save','AnswerController@save')->name('saveanswer');
Route::get('/answer/correct/{answerid}/{correct}','AnswerController@correct')->name('answercorrect');
Route::post('/answer/collect','AnswerController@update')->name('collectanswer');
Route::post('/soalkey','QuestionController@keyprocess')->name('soalkeyprocess');

Route::post('/score/save','ScoreController@save')->name('savescore');
Route::get('/score','ScoreController@view')->name('viewscores');
Route::get('/user','UserController@view')->name('viewuser');
Route::post('/user/save','UserController@save')->name('updateprofile');
Route::post('/user/password/save','UserController@changepassword')->name('changepassword');