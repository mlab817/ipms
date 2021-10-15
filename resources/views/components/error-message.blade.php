@props([
    'name',
])

@error($name)
<p class="note error" {{ $attributes }}>{{ $message }}</p>
@enderror