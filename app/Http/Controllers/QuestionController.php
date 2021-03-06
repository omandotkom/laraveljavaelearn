<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Duration;
use Illuminate\Support\Facades\Auth;
use App\Question;
use App\QuestionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\UserClass;
use PDF;

class QuestionController extends Controller
{

    public function update(Request $request)
    {

        $question = Question::findOrFail($request->soalid);
        $question->name = $request->name;
        $question->key = $request->key;
        $question->start = $request->startdate;
        $question->end = $request->enddate;
        $question->duration_minute = $request->duration;
        $question->save();
        return back();
    }
    public function deletequestiondetil($id)
    {
        //question id

        $d = QuestionDetail::findOrFail($id);
        $d->delete();
        //return redirect()->route('viewquestion',$d->question_id);
        return back();
    }
    public function store(Request $request)
    {

        $QuestionLimit = 100;
        $count = Question::select('id')->where('user_id', Auth::user()->id)->count();
        if ($count >= $QuestionLimit) {
            $message = "Anda hanya bisa membuat 1 soal saja.";
            return view('index', ['title' => 'Akses Ditolak', 'includepage' => 'layouts.erroraccess', 'message' => $message, 'link' => route('viewallquestions')]);
        }
        $question = new Question();
        $question->user_id = Auth::user()->id;
        $question->name = $request->name;
        $question->key = $request->key;
        $question->start = $request->start;
        $question->end = $request->end;
        $question->duration_minute = $request->minute_duration;
        $question->class_id = $request->classid;
        /*if ($request->hasFile('dokumen')) {
            $document = $request->file('dokumen')->store('document/' . Auth::user()->id, 'public');
            $question->document = $document;
            //$archive->cv_path = $cv_path;
        }*/
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
            return back()->with('error', 'Key soal yang Anda masukkan salah.');
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
        $titleAddition = "";
        $question = Question::findOrfail($id);
        if (Auth::user()->role == "admin") {
            $content = "viewsoal";
            $q = null;
            if ($ischeck) {

                $content = "jawabsoal";
                $q = QuestionDetail::where('question_id', $question->id)->where('multiplechoice', false)->paginate(1);
                if ($q->total() < 1) {
                    //gada essayna alias semuanya pg
                    $message = "Seluruh jawaban pada quiz ini sudah otomatis diperiksa oleh sistem.";
                    return view('index', [
                        'title' => 'Soal Selesai Diperiksa', 'includepage' => 'layouts.erroraccess', 'checkmode' => $ischeck, 'message' => $message, 'link' => url()->previous(), 'q' => $q,
                        'uid' => $uid, 'qid' => $question->id
                    ]);
                }
                foreach ($q as $u) {
                    $a = Answer::where('question_detail_id', $u->id)->where('user_id', $uid)->first();
                    if ($a === null) {
                        $message = "Siswa tidak (belum) mengerjakan soal ini";
                        return view('index', [
                            'title' => 'Soal Belum Dikerjakan', 'includepage' => 'layouts.erroraccess', 'checkmode' => $ischeck, 'message' => $message, 'link' => url()->previous(), 'q' => $q,
                            'uid' => $uid, 'qid' => $question->id
                        ]);
                    }
                    $titleAddition = " (Jawaban Milik " . $a->user->name . ")";
                }
            }
        } else {
            $content = "jawabsoal";
            //tambah x minute
            $duration = Duration::select("start_at", "end_at")->where('question_id', $question->id)->where('user_id', Auth::user()->id)->first();

            if ($duration != null && $duration->exists()) {

                //exist
                if (Carbon::now() > $duration->end_at) {
                    //waktu habis
                    Answer::where('question_id', $question->id)->where('user_id', Auth::user()->id)->update(['editable' => false]);
                    $message = "Maaf, waktu pengerjaan sudah habis, durasi pengerjaan hanya " . $question->duration_minute . " menit, Anda mulai pada " . $duration->start_at . " dan berakhir pada " . $duration->end_at . ".";

                    return view('index', ['title' => 'Akses Ditolak', 'includepage' => 'layouts.erroraccess', 'message' => $message, 'link' => route('viewallquestions')]);
                }
            } else {
                //not exit
                $duration = new Duration();
                $duration->question_id = $question->id;
                $duration->user_id = Auth::user()->id;
                $duration->start_at = Carbon::now();
                $duration->end_at = Carbon::now()->addMinute($question->duration_minute);
                $duration->save();
            }
            //validasi tanggal akses

            if (date("Y-m-d") < $question->start || date('Y-m-d') > $question->end) {
                //terlalu gasik terlalu lama
                $message = "Soal ini hanya bisa diakses pada tanggal " . $question->start . " hingga tanggal " . $question->end . ", untuk informasi lebih lanjut atau pembukaan akses hubungi dosen terkait (" . $question->owner->name . ").";
                return view('index', ['title' => 'Akses Ditolak', 'includepage' => 'layouts.erroraccess', 'message' => $message, 'link' => route('viewallquestions')]);
            }
            if ($question->key != "NO_PSWD") {
                if (!$this->isAccessible($question))
                    return view('index', ['title' => 'KEY | #' . $question->id, 'includepage' => 'layouts.key', 'content' => 'askkey',  'question' => $question]);
            }
            $q = QuestionDetail::where('question_id', $question->id)->paginate(1);
            foreach ($q as $u) {
                /* if($u->level > 1 && !$this->levelCheck($u->id)){
                    $message = "Anda harus menyelesaikan semua soal dengan level Mudah terlebih dahulu sebelum mengerjakan soal level sulit.";
                    return view('index', ['title' => 'Akses Ditolak', 'includepage' => 'layouts.erroraccess', 'message' => $message,'link'=>url()->previous()]);
                        
                }*/
                if ($u->level > 1) {

                    $easyQuestionCount = QuestionDetail::select("id")->where("question_id", $u->question_id)->where('level', "=", 1)->count();
                    $easyAnsweredCount = DB::table("answers")->select("answers.id", "question_details.level")->join("question_details", "answers.question_detail_id", "=", "question_details.id")
                        ->where("answers.user_id", "=", Auth::user()->id)
                        ->where("question_details.level", "=", 1)->count();
                    if ($easyAnsweredCount < $easyQuestionCount) {
                        $message = "Soal ini bertipe sulit, Anda harus menyelesaikan semua soal dengan kesulitan mudah terlebih dahulu.";
                        return view('index', ['title' => 'Akses Ditolak', 'includepage' => 'layouts.erroraccess', 'message' => $message, 'link' => url()->previous(), 'q' => $q, 'question' => $question]);
                    }
                }
                $a = Answer::where('question_detail_id', $u->id)->where('user_id', Auth::user()->id)->first();
                if (!is_null($a) &&!$a->editable) {
                    //jika sudah dijawab tidak editable maka munculkan pesan soal ini sudah dikerjakan

                    $message = "Quiz ini sudah dikerjakan dan sudah di kumpulkan sebelumnya.";
                    return view('index', ['title' => 'Quiz Sudah Dikerjakan', 'includepage' => 'layouts.erroraccess', 'message' => $message, 'link' => url()->previous(), 'q' => $q, 'question' => $question, 'collected' => true]);
                }
            }
        }
        if ($content === "jawabsoal") {
            $includepage = "layouts.answer";
        } else if ($content === "viewsoal") {
            $includepage = "layouts.question";
        }
        return view('index', ['title' => 'Soal #' . $question->id . $titleAddition, 'answer' => $a, 'includepage' => $includepage, 'checkmode' => $ischeck, 'content' => $content, 'q' => $q, 'question' => $question]);
    }

    public function showbyUser()
    {
        if (Auth::user()->role == "admin") {
            $question = Question::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->simplePaginate(20);
        } else {
            $classid = UserClass::where('user_id', Auth::user()->id)->first();
            if ($classid === null) {
                return abort(403, "Anda belum memilih kelas!");
            }
            $question = Question::where('status', 'open')->where('class_id', $classid->class_id)->orderBy('created_at', 'desc')->simplePaginate(20);
            //$question = Question::where('status', 'open')->orderBy('created_at', 'desc')->simplePaginate(20);
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
        if (isset($request->levelsoal)) {
            $qd->level = 1;
        } else {
            $qd->level = 2;
        }
        $qd->save();
        return back();
    }
    public function viewanswerer($id, $save = null)
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
           where answers.question_id=" . $id . "  group by `answers`.`user_id`");
        if (is_null($save)) {

            return view('index', ['title' => 'Laporan Siswa yang Sudah Mengerjakan', 'includepage' => 'layouts.questionsanswer', 'content' => 'answererlist', 'answerer' => $answerer, 'questionid' => $id]);
        }
        $data = [
            'answerer' => $answerer,
            'title' => 'Data Siswa Yang Sudah Mengerjakan Quiz',

            'date' => date('m/d/Y')

        ];



        $pdf = PDF::loadView('myPDF', $data);



        return $pdf->stream('itsolutionstuff.pdf');
    }
    public function ApiGetQuestions($id)
    {
        $scorequestions = Question::select('id', 'name')->where('user_id', $id)->orderBy('updated_at', 'desc')->limit(10)->get();

        return $scorequestions;
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return back();
    }
}
