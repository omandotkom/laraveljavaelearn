<?php

namespace App;

use Awobaz\Compoships\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Kelas;
class UserClass extends Model
{
    protected $table = "userclasses";
    protected $fillable = ["user_id","class_id"];
    public function student(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function kelas(){
        return $this->hasOne(Kelas::class,'id','class_id');
    }
}
