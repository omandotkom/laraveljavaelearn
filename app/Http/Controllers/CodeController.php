<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Str;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class CodeController extends Controller
{
    public function show()
    {
        return view('index', ['title' => 'Code', 'includepage'=>'layouts.code','content' => 'startcode']);
    }
    public function compileandrun(Request $request)
    {
        Storage::disk('public')->put("/".$request->id."/".$request->filename.".java", $request->code);
        try {
            
            //$process = Process::fromShellCommandline('cd storage && cd '.$request->id.' && javac '.$request->filename.'.java && java '.$request->filename, null, ['path' => 'C:\Program Files\Java\jdk1.8.0_251\bin']);
            $process = Process::fromShellCommandline('jdk/bin/java storage/'.$request->id.'/'.$request->filename.'.java', null, ['path' => '/home/publikas/java/jdk/bin/']);
            
            $process->run();
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }
        } catch (ProcessFailedException  $e) {
            return response($e->getMessage(), 200)->header('Content-Type', 'text/plain');
        }
        // executes after the command finishes
        //$content= Storage::disk('public')->get('res.txt');
        $a = $process->getOutput();
        return response($a, 200)->header('Content-Type', 'text/plain');
    }
}
