<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionDetail extends Model
{
    protected $table = "question_details";
    protected $fillable = ["question_id","question_text","a","b","c","d","answer","multiplechoice","code"];

    public function question(){
        return $this->hasOne('App\Question','id','question_id');
    }
}
