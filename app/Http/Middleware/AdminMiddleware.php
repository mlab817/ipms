<?php

namespace App\Http\Middleware;

use App\Exceptions\CustomException;
use Closure;

class AdminMiddleware
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
      else if (!$request->user()->role && $request->user()->role->name != 'admin')
      {
        throw new CustomException("You are not authorized to perform this action ". $request->user(), "Something something" );
      }
      return $next($request);
    }
}
