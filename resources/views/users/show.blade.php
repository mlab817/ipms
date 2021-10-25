@extends('layouts.app')

@section('page-header')
    <header class="color-bg-subtle border-bottom-0 pt-0">

        <div class="container-lg pt-4 p-responsive clearfix">

            <div class="d-flex flex-wrap flex-items-start flex-md-items-center my-3">
                <img
                        itemprop="image"
                        class="avatar flex-shrink-0 mb-3 mr-3 mb-md-0 mr-md-4"
                        src="{{ $user->avatar }}" width="100" height="100" alt="{{ '@' . $user->username }}">

                <div class="flex-1">
                    <h1 class="h2 lh-condensed">
                        {{ $user->full_name }}
                    </h1>
                    <p>
                    {{ '@' . $user->username }}
                    </p>
                </div>
            </div>
        </div>

    </header>
@endsection

@section('content')
    <div class="Box">
        <div class="Box-header">
            <h3 class="Box-title">Profile</h3>
        </div>
        <div class="Box-body">
            <dl>
                <dt>
                    <label for="">Name</label>
                </dt>
                <dd>
                    {{ $user->full_name }}
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="">Email</label>
                </dt>
                <dd>
                    {{ $user->email }}
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="">Username</label>
                </dt>
                <dd>
                    {{ $user->username }}
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="">Office</label>
                </dt>
                <dd>
                    {{ optional($user->office)->name }}
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="">Admin Privilege</label>
                </dt>
                <dd>
                    {{ $user->isAdmin() ? 'Yes' : 'No' }}
                </dd>
            </dl>
            <dl>
                <dt>
                    <label for="">Role</label>
                </dt>
                <dd>
                    {{ optional($user->role)->name }}
                </dd>
            </dl>
            @if($user->isIpd())
                <dl>
                    <dt>
                        <label for="">Offices Assigned for Review</label>
                    </dt>
                    <dd>
                        @foreach($user->offices as $office)
                            <a href="{{ route('offices.show', $office) }}">{{ $office->acronym }}</a>,
                        @endforeach
                    </dd>
                </dl>
            @endif
        </div>
    </div>

    <x-subhead subhead="Projects by the User" id="projects"></x-subhead>

    @include('partials.projects', ['projects' => $user->projects()->paginate(), 'office' => $user->office])

    @if(auth()->id() == $user->id)
    <div class="Box mt-6">
        <div class="Box-header">
            <h3 class="Box-title">Update Password</h3>
        </div>
        <form action="{{ route('password.change') }}" method="POST" x-data="{
                password: '',
                password_confirmation: '',
                show: false,
                get disabled() {
                    const password = this.password;
                    const password_confirmation = this.password_confirmation;
                    const disabled = !password || password !== password_confirmation;
                    return !password || password !== password_confirmation;
                }
            }">
            @csrf
            <div class="Box-body">
                <dl class="form-group @error('password') errored mb-6 @enderror">
                    <dt>
                        <label for="password">New Password</label>
                    </dt>
                    <dd>
                        <div class="input-group">
                            <input class="form-control" name="password" id="password" x-model="password" x-bind:type="show ? 'text': 'password'" placeholder="********" aria-label="Password">
                            <x-error-message name="password"></x-error-message>
                            <span class="input-group-button">
                                <button @click="show = !show" class="btn" type="button" aria-label="Toggle password visibility">
                                    <!-- <%= octicon "clippy" %> -->
                                    <template x-if="!show">
                                        <svg  class="octicon octicon-eye" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.679 7.932c.412-.621 1.242-1.75 2.366-2.717C5.175 4.242 6.527 3.5 8 3.5c1.473 0 2.824.742 3.955 1.715 1.124.967 1.954 2.096 2.366 2.717a.119.119 0 010 .136c-.412.621-1.242 1.75-2.366 2.717C10.825 11.758 9.473 12.5 8 12.5c-1.473 0-2.824-.742-3.955-1.715C2.92 9.818 2.09 8.69 1.679 8.068a.119.119 0 010-.136zM8 2c-1.981 0-3.67.992-4.933 2.078C1.797 5.169.88 6.423.43 7.1a1.619 1.619 0 000 1.798c.45.678 1.367 1.932 2.637 3.024C4.329 13.008 6.019 14 8 14c1.981 0 3.67-.992 4.933-2.078 1.27-1.091 2.187-2.345 2.637-3.023a1.619 1.619 0 000-1.798c-.45-.678-1.367-1.932-2.637-3.023C11.671 2.992 9.981 2 8 2zm0 8a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                                    </template>
                                    <template x-if="show" x-cloak>
                                        <svg class="octicon octicon-eye-closed" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M.143 2.31a.75.75 0 011.047-.167l14.5 10.5a.75.75 0 11-.88 1.214l-2.248-1.628C11.346 13.19 9.792 14 8 14c-1.981 0-3.67-.992-4.933-2.078C1.797 10.832.88 9.577.43 8.9a1.618 1.618 0 010-1.797c.353-.533.995-1.42 1.868-2.305L.31 3.357A.75.75 0 01.143 2.31zm3.386 3.378a14.21 14.21 0 00-1.85 2.244.12.12 0 00-.022.068c0 .021.006.045.022.068.412.621 1.242 1.75 2.366 2.717C5.175 11.758 6.527 12.5 8 12.5c1.195 0 2.31-.488 3.29-1.191L9.063 9.695A2 2 0 016.058 7.52l-2.53-1.832zM8 3.5c-.516 0-1.017.09-1.499.251a.75.75 0 11-.473-1.423A6.23 6.23 0 018 2c1.981 0 3.67.992 4.933 2.078 1.27 1.091 2.187 2.345 2.637 3.023a1.619 1.619 0 010 1.798c-.11.166-.248.365-.41.587a.75.75 0 11-1.21-.887c.148-.201.272-.382.371-.53a.119.119 0 000-.137c-.412-.621-1.242-1.75-2.366-2.717C10.825 4.242 9.473 3.5 8 3.5z"></path></svg>
                                    </template>
                                </button>
                            </span>
                        </div>
                        <p class="note">Minimum of 8 characters</p>
                    </dd>
                </dl>
                <dl class="form-group ">
                    <dt>
                        <label for="password_confirmation">Confirm Password</label>
                    </dt>
                    <dd>
                        <div class="input-group">
                            <input class="form-control" name="password_confirmation" id="password_confirmation" x-model="password_confirmation" x-bind:type="show ? 'text': 'password'" placeholder="********" aria-label="Password">
                            <x-error-message name="password"></x-error-message>
                            <span class="input-group-button">
                                <button @click="show = !show" class="btn" type="button" aria-label="Toggle password visibility">
                                    <!-- <%= octicon "clippy" %> -->
                                    <template x-if="!show">
                                        <svg  class="octicon octicon-eye" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M1.679 7.932c.412-.621 1.242-1.75 2.366-2.717C5.175 4.242 6.527 3.5 8 3.5c1.473 0 2.824.742 3.955 1.715 1.124.967 1.954 2.096 2.366 2.717a.119.119 0 010 .136c-.412.621-1.242 1.75-2.366 2.717C10.825 11.758 9.473 12.5 8 12.5c-1.473 0-2.824-.742-3.955-1.715C2.92 9.818 2.09 8.69 1.679 8.068a.119.119 0 010-.136zM8 2c-1.981 0-3.67.992-4.933 2.078C1.797 5.169.88 6.423.43 7.1a1.619 1.619 0 000 1.798c.45.678 1.367 1.932 2.637 3.024C4.329 13.008 6.019 14 8 14c1.981 0 3.67-.992 4.933-2.078 1.27-1.091 2.187-2.345 2.637-3.023a1.619 1.619 0 000-1.798c-.45-.678-1.367-1.932-2.637-3.023C11.671 2.992 9.981 2 8 2zm0 8a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                                    </template>
                                    <template x-if="show" x-cloak>
                                        <svg class="octicon octicon-eye-closed" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M.143 2.31a.75.75 0 011.047-.167l14.5 10.5a.75.75 0 11-.88 1.214l-2.248-1.628C11.346 13.19 9.792 14 8 14c-1.981 0-3.67-.992-4.933-2.078C1.797 10.832.88 9.577.43 8.9a1.618 1.618 0 010-1.797c.353-.533.995-1.42 1.868-2.305L.31 3.357A.75.75 0 01.143 2.31zm3.386 3.378a14.21 14.21 0 00-1.85 2.244.12.12 0 00-.022.068c0 .021.006.045.022.068.412.621 1.242 1.75 2.366 2.717C5.175 11.758 6.527 12.5 8 12.5c1.195 0 2.31-.488 3.29-1.191L9.063 9.695A2 2 0 016.058 7.52l-2.53-1.832zM8 3.5c-.516 0-1.017.09-1.499.251a.75.75 0 11-.473-1.423A6.23 6.23 0 018 2c1.981 0 3.67.992 4.933 2.078 1.27 1.091 2.187 2.345 2.637 3.023a1.619 1.619 0 010 1.798c-.11.166-.248.365-.41.587a.75.75 0 11-1.21-.887c.148-.201.272-.382.371-.53a.119.119 0 000-.137c-.412-.621-1.242-1.75-2.366-2.717C10.825 4.242 9.473 3.5 8 3.5z"></path></svg>
                                    </template>
                                </button>
                            </span>
                        </div>
                    </dd>
                </dl>
            </div>
            <div class="Box-footer">
                <button type="submit" class="btn btn-primary" :disabled="disabled">Update Password</button>
            </div>
        </form>
    </div>
    @endif
@endsection