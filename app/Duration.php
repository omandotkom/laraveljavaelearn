<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duration extends Model
{
    protected $table = "durations";
    protected $fillable = ["question_id","user_id","start_at","end_at"];
    
}
