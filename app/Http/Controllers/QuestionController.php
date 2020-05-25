<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Support\Facades\Auth;
use App\Question;
use App\QuestionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function update(Request $request)
    {

        $question = Question::findOrFail($request->soalid);
        $question->name = $request->name;
        $question->key = $request->key;
        $question->save();
        return back();
    }
    public function deletequestiondetil($id)
    {
        //question id

        $d = QuestionDetail::findOrFail($id);
        $d->delete();
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
    public function keyprocess(Request $request)
    {
        $q = Question::findOrFail($request->soalid);
        if ($q->key === $request->key) {
            //correct
            session(['soal_key' => $q->key]);
            return redirect()->route('viewquestion', $request->soalid);
        } else {
            session(['soal_key' => 'NO_PSWD']);
            return back()->with('error','Key soal yang Anda masukkan salah.');
        }
    }
    private function  isAccessible(Question $question)
    {
        if (session('soal_key', 'NO_PSWD') === $question->key) {
            //key correct
            return true;
        };
        return false;
    }
    public function show($id, $ischeck = false, $uid = 0)
    {
        $a = null;
        $question = Question::findOrfail($id);
        if (Auth::user()->role == "admin") {
            $content = "viewsoal";
            $q = null;
            if ($ischeck) {
                $content = "jawabsoal";
                $q = QuestionDetail::where('question_id', $question->id)->where('multiplechoice', false)->paginate(1);
                foreach ($q as $u) {
                    $a = Answer::where('question_detail_id', $u->id)->where('user_id', $uid)->first();
                }
            }
        } else {
            $content = "jawabsoal";
            if ($question->key != "NO_PSWD") {
                if (!$this->isAccessible($question))
                    return view('index', ['title' => 'KEY | #' . $question->id, 'includepage' => 'layouts.key', 'content' => 'askkey',  'question' => $question]);
            }
            $q = QuestionDetail::where('question_id', $question->id)->paginate(1);
            foreach ($q as $u) {
                $a = Answer::where('question_detail_id', $u->id)->where('user_id', Auth::user()->id)->first();
            }
        }
        if ($content === "jawabsoal") {
            $includepage = "layouts.answer";
        } else if ($content === "viewsoal") {
            $includepage = "layouts.question";
        }
        return view('index', ['title' => 'Soal #' . $question->id, 'answer' => $a, 'includepage' => $includepage, 'checkmode' => $ischeck, 'content' => $content, 'q' => $q, 'question' => $question]);
    }
    public function showbyUser()
    {
        if (Auth::user()->role == "admin") {
            $question = Question::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->simplePaginate(20);
        } else {
            $question = Question::where('status', 'open')->orderBy('created_at', 'desc')->simplePaginate(20);
        }
        return view('index', ['title' => 'Daftar Soal', 'includepage' => 'layouts.questions', 'content' => 'questionlist', 'questions' => $question]);
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
        return response($question, 200);
    }
    public function save(Request $request)
    {

        $qd = new QuestionDetail();
        $qd->question_text = $request->questiontext;
        $qd->question_id = $request->qid;
        if (isset($request->tipesoal)) {
            $qd->a = $request->a;
            $qd->b = $request->b;
            $qd->c = $request->c;
            $qd->d = $request->d;
            $qd->answer =  $request->answer;
        } else {
            $qd->multiplechoice = false;
        }
        $qd->save();
        return back();
    }
    public function viewanswerer($id)
    {
        //$answerer = Answer::select('user_id')->where('question_id', $id)->groupBy('user_id')->get();
        /*$answerer = DB::table('answers')->select('answers.user_id as answeruserid', "scores.*", 'users.name')
            ->leftJoin('scores', 'answers.question_id', '=', 'scores.question_id')
            ->join('users', 'answers.user_id', '=', 'users.id')
            ->groupBy('answers.user_id')
            ->where('answers.question_idx', $id)->get();*/
        //$answerer = Answer::select('user_id')->where('question_id',$id)->distinct()->get();
        $answerer = DB::select("select `answers`.`user_id` as `answeruserid`, `scores`.*,
         `users`.`name` from `answers` left join `scores` on `answers`.`question_id` = `scores`.`question_id`
          and `answers`.`user_id`=`scores`.`user_id` inner join `users` on `answers`.`user_id` = `users`.`id`
           where answers.question_id=".$id."  group by `answers`.`user_id`");
        
        return view('index', ['title' => 'Daftar Soal', 'includepage' => 'layouts.questionsanswer', 'content' => 'answererlist', 'answerer' => $answerer, 'questionid' => $id]);
    }
}
