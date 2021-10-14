@props([
    'name',
])

@error($name)<span class="error invalid-feedback">{{ $message }}</span>@enderror