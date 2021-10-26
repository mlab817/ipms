@extends('layouts.auth')

@section('content')
    <div class="login-box mt-6">
        <div class="text-center">
            <img class="avatar avatar-user" src="{{ asset('images/pips.png') }}" width="100px" alt="ipms-logo">
        </div>

        <!-- /.login-logo -->
        <div class="Box mt-3">

            <div class="Box-body">
                <p class="text-center">Sign in to start your session</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <x-flash-message></x-flash-message>

                    <div class="form-group @error('username') errored mb-6 @enderror">
                        <div class="input-group">
                            <input type="text" placeholder="Email or username" aria-describedby="username-validation" class="form-control" name="username" value="{{ old('username') }}" required autocomplete="off" autofocus>
                            @error('username')
                            <p class="note error" role="alert" id="username-validation">
                                <strong>{{ $message }}</strong>
                            </p>
                            @enderror
                            <span class="input-group-button">
                                <button class="btn" type="button" aria-label="Username">
                                    <!-- <%= octicon "mail" %> -->
                                    <svg class="octicon octicon-mail" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.75 2A1.75 1.75 0 000 3.75v.736a.75.75 0 000 .027v7.737C0 13.216.784 14 1.75 14h12.5A1.75 1.75 0 0016 12.25v-8.5A1.75 1.75 0 0014.25 2H1.75zM14.5 4.07v-.32a.25.25 0 00-.25-.25H1.75a.25.25 0 00-.25.25v.32L8 7.88l6.5-3.81zm-13 1.74v6.441c0 .138.112.25.25.25h12.5a.25.25 0 00.25-.25V5.809L8.38 9.397a.75.75 0 01-.76 0L1.5 5.809z"></path></svg>
                                </button>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <div class="input-group-button">
                                <button class="btn" type="button" aria-label="Email">
                                    <svg class="octicon octicon-lock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M4 4v2h-.25A1.75 1.75 0 002 7.75v5.5c0 .966.784 1.75 1.75 1.75h8.5A1.75 1.75 0 0014 13.25v-5.5A1.75 1.75 0 0012.25 6H12V4a4 4 0 10-8 0zm6.5 2V4a2.5 2.5 0 00-5 0v2h5zM12 7.5h.25a.25.25 0 01.25.25v5.5a.25.25 0 01-.25.25h-8.5a.25.25 0 01-.25-.25v-5.5a.25.25 0 01.25-.25H12z"></path></svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </form>

                @if(config('ipms.allow_google_login'))
                <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="{{ route('auth.google') }}" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
                @endif

                <!-- /.social-auth-links -->
                @if (Route::has('password.request'))
                <p class="mb-1 mt-2 text-sm">
                    <a href="{{ route('password.request') }}" class="btn-link no-underline">I forgot my password</a>
                </p>
                @endif
            </div>
            <!-- /.card-body -->
            <div class="Box-footer text-center">
                <span class="text-muted text-sm">
                    &copy; 2021 Investment Programming Division
                </span>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
@endsection
