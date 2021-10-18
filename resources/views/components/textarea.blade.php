@props([
    'value' => '',
])

<textarea {{ $attributes }} class="form-control" style="resize: none;">{{ $value }}</textarea>