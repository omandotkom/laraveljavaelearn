<?php

namespace App\Http\Controllers;

use App\Answer;
use App\QuestionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Questiondetails;
use Symfony\Component\HttpFoundation\Response;

class AnswerController extends Controller
{
    public function save(Request $request)
    {
        if (Answer::where('user_id', Auth::user()->id)->where('question_detail_id', $request->idquestion)->exists()) {
            $ans = Answer::where('user_id', Auth::user()->id)->where('question_detail_id', $request->idquestion)->first();
        } else {
            $ans = new Answer();
        }

        $ans->user_id = Auth::user()->id;
        $ans->question_detail_id = $request->idquestion;
        $ans->question_id = QuestionDetail::findOrFail($request->idquestion)->question->id;
        if (!$request->answertype) {
            //essay / code based

            $ans->answer = $request->editorghost;
            $ans->filename = $request->filename;
        } else {
            $ans->answer = $request->answer;
            $cor = QuestionDetail::findOrFail($request->idquestion);
            if (strtolower($cor->answer) == strtolower($request->answer)) {
                $ans->correct = true;
            }else{
                $ans->correct = false;
            }
        }
        $ans->save();
        return back();
    }
    public function checkanswer($question_id,$user_id){
        $answers = Answer::where('question_id',$question_id)->where('user_id',$user_id)->where('correct',true)->count();
        return Response($answers);        
    }
}
