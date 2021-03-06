<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = "scores";
    protected $fillable = ["question_id","user_id","correct_multiplechoice","correct_essay","score"];
    public function question(){
        return $this->hasOne('App\Question','id','question_id');
    }
}
