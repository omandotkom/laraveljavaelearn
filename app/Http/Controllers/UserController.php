<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    public function view(){
        //return profile page
        return view('index',['title'=>'Profile','includepage'=>'layouts.profile','content'=>'profile']);
    }
    public function save(Request $request){
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->nim = $request->nim;
        $user->email = $request->email;
        $user->save();
        return back()->with('success','Berhasil memperbarui informasi profile.');
    }
    public function changepassword(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:6',
        ]);
        if ($validator->fails()) {
            return back()->with('error','Gagal memperbarui password, pastikan password sama di kedua kolom dan lebih dari 6 karakter.');
        }
        $user= User::findOrFail(Auth::user()->id);
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success','Berhasil memperbarui password.');
    }
}
