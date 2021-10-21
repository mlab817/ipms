@extends('layouts.app')

@include('offices.offices-header', ['activeTab' => 'users'])

@section('content')
    @forelse($office->users as $user)
        <li class="col-12 d-flex width-full py-4 border-bottom color-border-muted">
            <div class="col-10 col-lg-9 d-inline-block">
                <div class="table-list-cell py-3 pr-0 text-center v-align-middle" style="width: 72px;">
                    <a class="d-inline-block">
                        <img class="avatar avatar-user" src="{{ $user->avatar }}" width="48" height="48" alt="@mlabolotaolo">
                    </a>
                </div>
                <div class="d-inline-block mb-1">
                    <div class="d-inline wb-break-all">
                        <a href="{{ route('users.show', $user) }}" class="Link--onHover">
                            <strong>{{ $user->full_name }}</strong>
                        </a>
                    </div>
                    <div class="d-inline">

                    </div>
                    <div class="text-small color-fg-subtle">
                        <div class="Truncate" >
                        <span class="Truncate-text" style="max-width: 480px;">

                        </span>
                        </div>
                    </div>
                </div>

                <div>
                </div>

                <div class="f6 color-fg-muted mt-2">

                    Updated {{ $user->updated_at->diffForHumans(null, null, true) }}
                </div>
            </div>

            <div class="col-2 col-lg-3 d-flex flex-column flex-justify-around">
                <div class="text-right">
                    <details class="details-reset details-overlay dropdown">
                        <summary class="color-fg-muted position-relative mt-3 px-3" aria-label="Project menu" aria-haspopup="menu" role="button">
                            <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" class="octicon octicon-kebab-horizontal">
                                <path d="M8 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zM1.5 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm13 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                            </svg>
                        </summary>
                        <details-menu class="dropdown-menu dropdown-menu-sw mt-4 mr-1 top-0" role="menu">
{{--                            <a href="{{ route('projects.show', $project) }}" class="btn-link dropdown-item" role="menuitem">--}}
{{--                                View--}}
{{--                            </a>--}}
{{--                            <a href="{{ route('projects.edit', $project) }}" class="btn-link dropdown-item" role="menuitem">--}}
{{--                                Edit--}}
{{--                            </a>--}}
{{--                            <div role="none" class="dropdown-divider"></div>--}}
{{--                            <form action="{{ route('projects.destroy', $project) }}" method="POST">--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button onclick="return confirm('Are you sure you want to delete this PAP?')" type="submit" href="{{ route('projects.destroy', $project) }}" class="btn-link dropdown-item" role="menuitem">--}}
{{--                                    Delete--}}
{{--                                </button>--}}
{{--                            </form>--}}
                        </details-menu>
                    </details>
                </div>
            </div>
        </li>
    @empty
        <div class="blankslate blankslate-large">
            <img src="https://ghicons.github.com/assets/images/blue/png/Pull%20request.png" alt="" class="mb-3" />
            <h3 class="mb-1">There are no programs or projects to show.</h3>
            <p>Change your filters and search or add a new PAP to continue.</p>
            <a class="btn btn-primary my-3" href="{{ route('users.create') }}" role="button">New</a>
        </div>
    @endforelse
@endsection