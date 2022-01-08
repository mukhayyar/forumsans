<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isBusiness
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
        if(Auth::user() && Auth::user()->roles()->get()->first()->name == 'business'){
            return $next($request);
        } else if(Auth::user() && Auth::user()->roles()->get()->first()->name == 'admin') {
            return redirect()->route('admin.dashboard.index')->with('error','Oops, Kamu tidak bisa mengakses halaman ini');
        }

        return redirect()->route('pertanyaan.index')->with('error','Oops, Kamu tidak bisa mengakses halaman ini');

    }
}
