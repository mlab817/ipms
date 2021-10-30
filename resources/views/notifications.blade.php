@extends('layouts.app')

@section('content')
    <div class="Box">
        <div class="Box-header d-flex flex-items-center">
            <h3 class="Box-title overflow-hidden flex-auto">
                Notifications
            </h3>
            @if(count($notifications))
            <button type="submit" form="markMultipleAsRead" class="btn btn-sm">
                <span class="text-center d-inline-block" style="width:16px">
                    <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16" data-view-component="true" class="octicon octicon-check">
                        <path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path>
                    </svg>
                </span>
                Mark as read
            </button>
            @endif
        </div>
        <form id="markMultipleAsRead" action="{{ route('notifications.markMultipleAsRead') }}" method="post">
            @csrf
            @forelse($notifications as $notification)
                <div class="Box-row @if(! $notification->read_at) Box-row--unread @endif d-flex flex-items-start p-2">
                    <div class="flex-auto">
                        <div class="d-flex flex-items-start">
                            <div class="form-checkbox">
                                <label for="">
                                    <input name="notifications[]" type="checkbox" class="mr-1" value="{{ $notification->id }}" >
                                </label>
                            </div>
                            <div>
                                <strong>
                                    <a class="btn-link" href="{{ $notification->data['redirectUrl'] }}">
                                        {{ $notification->data['content'] }}
                                    </a>
                                </strong>
                                <div class="text-small color-fg-subtle">
                                    {{ $notification->created_at->diffForHumans(null, null, true) }}
                                </div>
                        </div>
                    </div>
                    </div>
                    @if(! $notification->read_at)
                    <form action="{{ route('notifications.markAsRead', $notification) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-octicon tooltipped tooltipped-n" aria-label="Mark as read">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path fill-rule="evenodd" d="M13.78 4.22a.75.75 0 010 1.06l-7.25 7.25a.75.75 0 01-1.06 0L2.22 9.28a.75.75 0 011.06-1.06L6 10.94l6.72-6.72a.75.75 0 011.06 0z"></path></svg>
                        </button>
                    </form>
                    @endif
                </div>
            @empty
                <x-blankslate message="No notifications to show"></x-blankslate>
            @endforelse
        </form>
    </div>
    @if($notifications->hasPages())
    <div class="paginate-container">
        {!! $notifications->links() !!}
    </div>
    @endif
@endsection