<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "answers";
    protected $fillable = ["question_detail_id","user_id","answer","filename","editable"];
}
