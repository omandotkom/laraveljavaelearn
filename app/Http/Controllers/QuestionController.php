<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Question;
use App\QuestionDetail;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request){
        $question = new Question();
        $question->user_id = Auth::user()->id;
        $question->name = $request->name;
        $question->key = $request->key;
        $question->save();
        return redirect()->route('viewquestion',$question->id);
    }
    public function show($id){
        $question = Question::findOrfail($id);
        return view('index', ['title' => 'Soal '.$question->id, 'content' => 'viewsoal','question' => $question]);
    }
    public function save(Request $request){
        $qd = new QuestionDetail();
        $qd->question_text = $request->questiontext;
        $qd->question_id = $request->qid;
        $qd->a = $request->a;
        $qd->b = $request->b;
        $qd->c = $request->c;
        $qd->d = $request->d;
        $qd->answer=  $request->answer;
        $qd->save();
        return back();
    }
}
