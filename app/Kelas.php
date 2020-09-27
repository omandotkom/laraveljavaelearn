<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Kelas extends Model
{
    protected $table = "classes";
    protected $fillable = ["user_id","name"];
    protected function user(){
        return $this->hasOne('App\User','id','user_id');
    }
}
