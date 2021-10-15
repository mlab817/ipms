@props([
    'subhead' => ''
])

<div class="Subhead Subhead--spacious">
    <div class="Subhead-heading">{{ $subhead }}</div>
    <div class="Subhead-actions">
        {{ $slot }}
    </div>
</div>