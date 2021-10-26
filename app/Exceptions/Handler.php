<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
//        if ($e instanceof ModelNotFoundException && $request->wantsJson()) {
//            return response()->json([
//                'error' => 'Resource not found'
//            ], 404);
//        }
//
//        if ($e instanceof AuthenticationException && $request->wantsJson()) {
//            return response()->json([
//                'error' => 'Unauthenticated'
//            ], 401);
//        }
//
//        if ($e instanceof AuthorizationException && $request->wantsJson()) {
//            return response()->json([
//                'error' => 'Unauthorized'
//            ], 403);
//        }
        dd($e->getCode());

        if ($e instanceof ModelNotFoundException) {
            session()->flash('status', 'error|The resource you are looking for was not found or may have moved to another page');

            return redirect()->route('dashboard');
        }
        /**
         * Redirect the users back to current page if they encounter an authorization exception
         */
        if ($e instanceof AuthorizationException) {
            session()->flash('status', 'error|' . $e->getMessage());

            return redirect()->route('dashboard');
        }

        return parent::render($request, $e);
    }
}
