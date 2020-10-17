<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
class Activity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if (Auth::check()){
            //user logged in
            $user = User::findOrFail(Auth::user()->id);
            $user->last_activity = Carbon::now();
            $user->save();
            Log::debug("2");
        }else{
            Log::debug("3");
        }
        return $next($request);
    }
}
