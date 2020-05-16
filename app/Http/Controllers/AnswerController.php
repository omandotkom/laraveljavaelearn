<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function save(Request $request)
    {
        if (Answer::where('user_id',Auth::user()->id)->where('question_detail_id',$request->idquestion)->exists()){
            $ans = Answer::where('user_id',Auth::user()->id)->where('question_detail_id',$request->idquestion)->first();
        }else{
            $ans = new Answer();
        }
        
        $ans->user_id = Auth::user()->id;
        $ans->question_detail_id = $request->idquestion;

        if (!$request->answertype) {
            //essay / code based

            $ans->answer = $request->editorghost;
            $ans->filename = $request->filename . ".java";
        } else {
            $ans->answer = $request->answer;
        }
        $ans->save();
        return back();
    }
}
