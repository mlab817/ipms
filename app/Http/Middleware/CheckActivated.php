<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckActivated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && ! auth()->user()->isActivated()) {
            \Auth::logout();

            session()->flash('status','error|Your account has not been activated yet');

            return redirect()->route('login');
        }

        return $next($request);
    }
}
