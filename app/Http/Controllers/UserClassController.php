<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UserClass;
use App\Kelas;
use App\Question;
use Illuminate\Support\Facades\DB;
class UserClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
        //
        if (Auth::user()->role == "admin") {
            $kelas = Kelas::where('user_id', Auth::user()->id)->first();
            //$userclasses = UserClass::where('class_id', $kelas->id)->get();
            $students = DB::select("select users.name,users.id, users.status, userclasses.created_at, 
            (select count(scores.id) from scores where scores.user_id=users.id) as answers from userclasses join users 
            on userclasses.user_id = users.id left join scores on scores.user_id=users.id where userclasses.class_id =".$kelas->id." group by id");
            
            $totalQuiz = Question::select("id")->where('class_id',$kelas->id)->count();
            return view('index', ['title' => 'Seluruh Siswa', 'includepage' => 'layouts.students', 'content' => 'profile', 'students' => $students,'totalquiz'=>$totalQuiz]);
        } else { 
            if ($id === null){
                return abort("Internal error");
            }
            
            $kelas = Kelas::where('user_id', $id)->first();
            $totalQuiz = Question::select("id")->where('class_id',$kelas->id)->count();
            $students = DB::select("select users.name,users.id, users.status, userclasses.created_at, 
            (select count(scores.id) from scores where scores.user_id=users.id) as answers from userclasses join users 
            on userclasses.user_id = users.id left join scores on scores.user_id=users.id where userclasses.class_id =".$kelas->id." group by id");
            
            return view('index', ['title' => 'Seluruh Siswa', 'includepage' => 'layouts.students', 'content' => 'profile', 'students' => $students,'totalquiz'=>$totalQuiz]);
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
