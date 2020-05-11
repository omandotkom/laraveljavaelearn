<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Question;
use App\QuestionDetail;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function update(Request $request){
        
        $question = Question::findOrFail($request->soalid);
        $question->name = $request->name;
        $question->key = $request->key;
        $question->save();
        return back();
    }
    public function store(Request $request)
    {
        
        $question = new Question();
        $question->user_id = Auth::user()->id;
        $question->name = $request->name;
        $question->key = $request->key;
        $question->save();
        return redirect()->route('viewquestion', $question->id);
    }
    public function show($id)
    {
        $question = Question::findOrfail($id);
        return view('index', ['title' => 'Soal #' . $question->id, 'content' => 'viewsoal', 'question' => $question]);
    }
    public function showbyUser()
    {
        $question = Question::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->simplePaginate(20);
        return view('index', ['title' => 'Daftar Soal', 'content' => 'questionlist', 'questions' => $question]);
    }
    public function updatestatus(Request $request)
    {
        $question = Question::findOrFail($request->id);
        if ($request->status == true) {
            $question->status = "open";
        } else {
            $question->status = "closed";
        }
        $question->save();
        return response($question,200);
    }
    public function save(Request $request)
    {
        $qd = new QuestionDetail();
        $qd->question_text = $request->questiontext;
        $qd->question_id = $request->qid;
        $qd->a = $request->a;
        $qd->b = $request->b;
        $qd->c = $request->c;
        $qd->d = $request->d;
        $qd->answer =  $request->answer;
        $qd->save();
        return back();
    }
}
