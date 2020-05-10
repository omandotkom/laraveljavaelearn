<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";
    protected $fillable = ['name','user_id','key'];
    public function child(){
        return $this->hasMany('App\QuestionDetail','question_id');
    }
}
