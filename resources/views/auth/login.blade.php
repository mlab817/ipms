@extends('layouts.auth')

@section('content')
    <div class="login-box mt-6">
        <div class="text-center">
            <img class="avatar avatar-user" src="{{ asset('images/pips.png') }}" width="100px" alt="ipms-logo">
        </div>

        <!-- /.login-logo -->
        <div class="Box mt-3">
            @if($status = session('status'))
                <div class="flash rounded-top-3 flash-full flash-{{ explode('|', $status)[0] }}" x-data="{ show: true }" x-show="show">
                    {{ explode('|', $status)[1] }}
                    <button class="flash-close js-flash-close" type="button" aria-label="Close" @click="show = false">
                        <!-- <%= octicon "x" %> -->
                        <svg class="octicon octicon-x" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16">  <path fill-rule="evenodd" clip-rule="evenodd" d="M3.72 3.72C3.86062 3.57955 4.05125 3.50066 4.25 3.50066C4.44875 3.50066 4.63937 3.57955 4.78 3.72L8 6.94L11.22 3.72C11.2887 3.64631 11.3715 3.58721 11.4635 3.54622C11.5555 3.50523 11.6548 3.48319 11.7555 3.48141C11.8562 3.47963 11.9562 3.49816 12.0496 3.53588C12.143 3.5736 12.2278 3.62974 12.299 3.70096C12.3703 3.77218 12.4264 3.85702 12.4641 3.9504C12.5018 4.04379 12.5204 4.14382 12.5186 4.24452C12.5168 4.34523 12.4948 4.44454 12.4538 4.53654C12.4128 4.62854 12.3537 4.71134 12.28 4.78L9.06 8L12.28 11.22C12.3537 11.2887 12.4128 11.3715 12.4538 11.4635C12.4948 11.5555 12.5168 11.6548 12.5186 11.7555C12.5204 11.8562 12.5018 11.9562 12.4641 12.0496C12.4264 12.143 12.3703 12.2278 12.299 12.299C12.2278 12.3703 12.143 12.4264 12.0496 12.4641C11.9562 12.5018 11.8562 12.5204 11.7555 12.5186C11.6548 12.5168 11.5555 12.4948 11.4635 12.4538C11.3715 12.4128 11.2887 12.3537 11.22 12.28L8 9.06L4.78 12.28C4.63782 12.4125 4.44977 12.4846 4.25547 12.4812C4.06117 12.4777 3.87579 12.399 3.73837 12.2616C3.60096 12.1242 3.52225 11.9388 3.51882 11.7445C3.51539 11.5502 3.58752 11.3622 3.72 11.22L6.94 8L3.72 4.78C3.57955 4.63938 3.50066 4.44875 3.50066 4.25C3.50066 4.05125 3.57955 3.86063 3.72 3.72Z"></path></svg>
                    </button>
                </div>
            @endisset

            <div class="Box-body">
                <p class="text-center">Sign in to start your session</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf

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
