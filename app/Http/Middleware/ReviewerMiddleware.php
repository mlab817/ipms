<?php

namespace App\Http\Middleware;

use App\Exceptions\CustomException;
use Closure;

class ReviewerMiddleware
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
	    if (! $request->user()) {
		    throw new CustomException("You are not logged in to perform this action", "Something something" );
	    }
	    else if (!$request->user()->role && $request->user()->role->name != 'reviewer')
	    {
		    throw new CustomException("You are not allowed to perform this action ". $request->user(), "Not a reviewer" );
	    }
	    return $next($request);
    }
}
