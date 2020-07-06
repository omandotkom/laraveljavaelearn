<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "answers";
    protected $fillable = ["question_detail_id","user_id","answer","filename","editable","question_id","correct"];
    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function score(){
        return $this->hasOne('App\Score','question_id','question_id');
    }
    
}
