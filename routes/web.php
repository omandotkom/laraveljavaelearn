<?php

use App\Http\Controllers\Dosen\DosenParams;
use App\Kelas;
use App\User;
use Illuminate\Support\Facades\Route;
use App\UserClass;
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
use Illuminate\Support\Facades\Auth;
Route::get('/daftar','Auth\RegisterController@index')->name('daftar')->middleware('guest');
Route::get('/', function () {
    $instructors = null;
    $classes = null;
    $userclass = null;
    if (Auth::user()->role == "superadmin"){
        $instructors = User::select('id','name')->where('role','admin')->get();
    }else if (Auth::user()->role == "admin"){
        $classes = Kelas::where('user_id',Auth::user()->id)->get();
    }else if (Auth::user()->role == "student"){
        $userclass = UserClass::select("class_id")->where('user_id',Auth::user()->id)->first();
        
    }
    return view('index', ['includepage' => 'layouts.content', 'pagetype' => 'default','instructors' => $instructors,'classes'=>$classes,'userclass'=>$userclass]);
})->middleware('auth')->name('index2');
Route::get('/home/{mode?}', function ($mode = "default") {
    switch ($mode) {
        case "view":
            $title = "Lihat Soal";
            break;
        case "create":
            $title = "Buat Soal";
            break;
        case "score" :
            $title = "Penilaian";
        break;
        default:
            $title = "Dashboard";
            break;
    }
    return view('index', ['includepage' => 'layouts.content', 'pagetype' => $mode, 'title' => $title]);
})->middleware('auth')->name('index');
Route::get('/dosen',function(){
    $dosen = true;
    return view('auth.register',['dosen'=>$dosen]);
});
Route::get('/code', 'CodeController@show')->name('showcode');
Route::post('/question/save', 'QuestionController@store')->name('addquestion');
Route::get('/question/view/{id?}/{ischeck?}/{uid?}', 'QuestionController@show')->name('viewquestion');
Route::get('/question/delete/{id}','QuestionController@destroy')->name('deletequestion');
Route::post('/question/{id?}', 'QuestionController@save')->name('savequestion');
Route::get('/questions', 'QuestionController@showbyUser')->name('viewallquestions');
Route::post('/question/update', 'QuestionController@update')->name('updatequestion');
Route::get('/questiondetil/delete/{id}', 'QuestionController@deletequestiondetil')->name('deletequestiondetil');
Route::get('/viewquestionsanswer/{id?}/{save?}', 'QuestionController@viewanswerer')->name('viewanswerer');
Auth::routes();
Route::get('/c', 'CodeController@comptest');
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/answer/save', 'AnswerController@save')->name('saveanswer');
Route::get('/answer/correct/{answerid}/{correct}', 'AnswerController@correct')->name('answercorrect');
Route::post('/answer/collect', 'AnswerController@update')->name('collectanswer');
Route::post('/soalkey', 'QuestionController@keyprocess')->name('soalkeyprocess');

Route::post('/score/save', 'ScoreController@save')->name('savescore');
Route::get('/score', 'ScoreController@view')->name('viewscores');
Route::get('/user/{id?}', 'UserController@view')->name('viewuser');
Route::post('/user/save/{id?}', 'UserController@save')->name('updateprofile');
Route::post('/user/password/save', 'UserController@changepassword')->name('changepassword');
Route::get('/about', function () {
    return view('index', ['includepage' => 'layouts.about', 'title' => 'Tentang Saya']);
})->name("about");

Route::post('/logout/custom','Auth\LoginController@logout')->name("logoutcustom");

Route::post('/instructor/create','UserController@saveInstructor')->name('saveinstructor');
Route::get('/instructor','UserController@showInstructor')->name('showinstructor');
Route::get('/instructor/delete/{id}','UserController@deleteInstructor')->name("deleteinstructor");

Route::post('/class','ClassController@store')->name('storeclass');
Route::get('/class','ClassController@index')->name('indexclass');

Route::get('/materials/view/{id?}','MaterialController@index')->name('indexmaterial');
Route::get('/materials/delete/{id}','MaterialController@destroy')->name('deletematerial');
Route::post('/materials','MaterialController@store')->name('storematerial');


Route::get('/students/view/{id?}','UserClassController@index')->name('userclassindex');
Route::get('/students/changestatus/{id}/{status}','UserController@changestatus')->name('changestatus');

Route::get('/class/{id}/rule','ClassController@ruleindex')->name('ruleindex');
Route::post('/class/{id}/rule','ClassController@storerule')->name('storerule');

Route::get('/profile/instructor','UserController@viewdosen')->name('viewinstructorprofile');

Route::get('/help',function(){
    return view('index',['title'=>'Petunjuk dalam Menggunakan Website Ini','includepage'=>'layouts.help','content'=>'profile']);
})->name("help");
