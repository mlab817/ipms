<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdminMiddleware
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
      if (! $request->user() || ! $request->user->role->name == 'superadmin')
      {
        abort(403,'Unauthorized');
      }
      return $next($request);
    }
}
