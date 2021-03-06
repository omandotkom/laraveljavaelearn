<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    public function save(Request $request)
    {
        $ans = Score::where('user_id', $request->user_id)->where('question_id', $request->question_id)->first();
        if ($ans === null) {
            $ans = new Score;
            $ans->question_id = $request->question_id;
            $ans->user_id = $request->user_id;
        }
        $ans->correct_multiplechoice = $request->mc;
        $ans->correct_essay = $request->es;
        $ans->score = $request->nilai;
        $ans->save();
        return redirect()->route('viewanswerer', $request->question_id);
    }
    public function view()
    {
        $scores = Score::where('user_id', Auth::user()->id)->get();
        return view('index', ['title' => 'Evaluasi Nilai', 'includepage' => 'layouts.scores', 'scores' => $scores]);
    }
}
