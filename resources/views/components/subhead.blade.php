@props([
    'subhead',
    'id'
])

<div class="Subhead Subhead--spacious" id="{{ $id ?? rand() }}">
    <div class="Subhead-heading">{{ $subhead }}</div>
    <div class="Subhead-actions">
        {{ $slot }}
    </div>
</div>