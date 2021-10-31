@component('mail::message')
# {{ $subject }}

The {{ config('app.name') }} Admin has added you as a user to the {{ config('app.name') }}. Click the link below to start using the System.

You may use your email **{{ $email }}** or username **{{ $username }}** to login with password: **{{ $password }}**. Please change your password ASAP to avoid security issue.

@component('mail::button', ['url' => $url])
Login
@endcomponent

Thank you for using our system.

Regards,

{{ config('app.name') }} Admin

@endcomponent
