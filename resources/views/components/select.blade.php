@props([
    'options' => [],
    'selected' => ''
])

<select class="form-select" {{ $attributes }}>
    <option value="" disabled @if(! $selected) selected @endif>Select Option</option>
    @foreach($options as $option)
        <option value="{{ $option->id }}"
                @if(old($selected) == $option->id) selected @endif>{{ $option->name }}</option>
    @endforeach
</select>