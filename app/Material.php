<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = "materials";
    protected $fillable = ["user_id","class_id","document","name"];
    public function Kelas(){
        return $this->hasOne('App\Kelas','id','class_id');
    }   
}
