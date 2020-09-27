<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserClass extends Model
{
    protected $table = "userclasses";
    protected $fillable = ["user_id","class_id"];
}
