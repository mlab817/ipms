@props([
    'options' => [],
    'selected' => ''
])

<select class="form-select" {{ $attributes }}>
    <option value="" disabled selected>Select Option</option>
    @foreach($options as $option)
        <option value="{{ $option->id }}"
                @if(old($selected) == $option->id) selected @endif>{{ $option->name }}</option>
    @endforeach
</select>