<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
    <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
    <img style="border-radius: 10px;" src="{{ asset('images/pips.png') }}" class="logo" alt="{{ config('app.name') }} logo"> <br/>
@endif
</a>
</td>
</tr>
