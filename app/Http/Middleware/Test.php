<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;


class Test
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
        //dd($request);
        return response()->json(['message' => Auth::user()]);
        dd(Auth::user());
        return $next($request);
        // if($request->user()->email=="das.arup199@gmail.com"){
            
        // }else{
        //     dd("permission denie");
        // }
        // if
        
    }
}
