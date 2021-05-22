<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Log;

class LogDatabaseQueries
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
        if (!env('APP_DEBUG')) {
            return $next($request);
        }
        
        DB::enableQueryLog();

        $response = $next($request);

        $logs = DB::getQueryLog();

        // dd($logs);

        foreach ($logs as $log) {
            Log::debug( $log[ 'query' ], [ 'bindings' => $log[ 'bindings' ], 'time' => $log[ 'time' ] ] );
        }

        return $response;
    }
}
