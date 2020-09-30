<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UserClass;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == "superadmin")
            $class = Kelas::all();
        elseif (Auth::user()->role == "admin")
            $class = Kelas::where('user_id', Auth::user()->id)->get();
        else {
            $class = UserClass::with('kelas')->where('user_id', Auth::user()->id)->get()();
            return $class;
        }


        return view('index', ['title' => 'Kelas', 'includepage' => 'layouts.class', 'content' => 'profile', 'classes' => $class]);
    }
    public function storerule(Request $request, $id)
    {
        $class = Kelas::findOrFail($id);
        $class->rule = $request->rule;
        $class->save();
        return back();
    }
    public function ruleindex($id)
    {
        $class = Kelas::findOrFail($id);
        return view('index', ['title' => 'Kelas', 'includepage' => 'layouts.rule', 'content' => 'rule', 'class' => $class]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kelas = new Kelas();
        $kelas->user_id = $request->instructor;
        $kelas->name = $request->name;
        $kelas->save();
        return redirect()->route('indexclass');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
