<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Override default authenticated method to logout existing user session
     */
    protected function authenticated(Request $request, $user)
    {
        // if multiple login is disabled
        // logout other devices
        if (! config('ipms.allow_multiple_login')) {
            Auth::logoutOtherDevices($request->password);
        }
    }

    // if the username is a valid email, return email
    // otherwise return username
    // see https://medium.com/@shahburhan/laravel-login-with-username-or-email-ea53d61d6b3d
    public function username(): string
    {
        $field = (filter_var(request()->username, FILTER_VALIDATE_EMAIL) || !request()->username) ? 'email' : 'username';

        request()->merge([$field => request()->username]);

        return $field;
    }
}
