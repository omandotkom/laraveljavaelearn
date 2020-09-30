<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\UserClass;

class UserController extends Controller
{
    public function view(){
        //return profile page
        return view('index',['title'=>'Profile','includepage'=>'layouts.profile','content'=>'profile']);
    }
    public function viewdosen(){
        $class = UserClass::where('user_id',Auth::user()->id)->first();
        $class = $class->kelas()->first();
        $user = User::select("name","id","email","address","phone","birthdate","city")->where('id',$class->user_id)->first();
        $kelas = Kelas::where('user_id',$user->id)->first();
        return view('index',['title'=>'Profile','includepage'=>'layouts.profile','content'=>'profile','viewmode'=>true,'user'=>$user,'class'=>$kelas]);
    }
    public function save(Request $request){
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->name;
      
        $user->email = $request->email;
        if (Auth::user()->role == "admin"){
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->city = $request->city;
            $user->birthdate = $request->birthdate;
        }
        $user->save();

        return back()->with('success','Berhasil memperbarui informasi profile.');
    }
    public function saveInstructor(Request $request){
        $user = new User();
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = "admin";
        $user->save();
       return redirect()->route('showinstructor');
    }
    public function showInstructor(){
        $user = User::where('role','admin')->get();
        return view('index', ['title' => 'Seluruh Instruktur', 'includepage' => 'layouts.instructors','users'=>$user]);
            
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
