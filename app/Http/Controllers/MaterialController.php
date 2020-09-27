<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = null;
        $classes = null;
        if (Auth::user()->role == "admin") {
            $materials = Material::where('user_id', Auth::user()->id)->get();
            $classes = Kelas::where('user_id',Auth::user()->id)->get();
        }
    
        return view('index',['title'=>'Materi','includepage'=>'layouts.materials','content'=>'materials','materials'=>$materials,'classes'=> $classes]);
   
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
        $material = new Material();
        $material->user_id = Auth::user()->id;
        $material->name = $request->name;
        $material->class_id = $request->classid;
        if ($request->hasFile('dokumen')) {
            $document = $request->file('dokumen')->store('document/' . Auth::user()->id, 'public');
            $material->document = $document;
            //$archive->cv_path = $cv_path;
        }
        $material->save();
        return redirect()->route('indexmaterial');
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
