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
    return view('index');
})->middleware('auth');
Route::get('/code','CodeController@show')->name('showcode');
Route::post('/question/save','QuestionController@store')->name('savequestion');
Route::get('/question/{id}','QuestionController@show')->name('viewquestion');
Route::post('/question/id','QuestionController@save')->name('savequestion');
Auth::routes();
Route::get('/c','CodeController@comptest');
Route::get('/home', 'HomeController@index')->name('home');
