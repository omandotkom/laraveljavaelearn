<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/code/compile','CodeController@compileandrun')->name('compileandrun');
Route::post('/question/status/save','QuestionController@updatestatus')->name('updatequestionstatus');
Route::get('/answer/check/{question_id}/{user_id}','AnswerController@checkanswer')->name('checkanswer');
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
