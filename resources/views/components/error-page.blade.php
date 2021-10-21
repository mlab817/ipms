@props([
    'error' => 404,
    'message' => ''
])

<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h1>{{ $error }}</h1>
        </div>
        <h2>{{ $message }}</h2>
        <p>
            You may <a href="{{ route('dashboard') }}">return to dashboard</a>. Or click
            <a href="{{ URL::previous() }}">here</a> to go back to previous page.
        </p>
        <p>
            If you think this is a mistake, take a screenshot of this page and email to <strong>{{ config('ipms.email') }}</strong> along
            with the expected behavior.
        </p>
    </div>
</div>