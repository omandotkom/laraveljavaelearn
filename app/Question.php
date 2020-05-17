<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "questions";
    protected $fillable = ['name','user_id','key','status'];
    public function child(){
        return $this->hasMany('App\QuestionDetail','question_id');
    }
    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function owner(){
        return $this->hasOne('App\User','id','user_id');
    }
}
