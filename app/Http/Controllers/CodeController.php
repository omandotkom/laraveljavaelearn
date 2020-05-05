<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function show(){
        return view('index',['title' => 'Code','content' => 'startcode']);
    }
}
