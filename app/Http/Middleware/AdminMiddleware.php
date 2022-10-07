<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // dd(\Auth::user()->email);
        // dd(auth()->user());
        // dd($request->user());

        if($request->user()->role != 'admin' && $request->user()->role != 'moderator'){
            return redirect(route('home'));
        }

        return $next($request);
    }
}
