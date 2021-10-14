@props([
    'name' => '',
    'options' => [],
    'selected' => ''
])

<select class="form-control select2 @error($name) is-invalid @enderror" :id="$name" :name="$name">
    <option value="" disabled selected>Select Option</option>
    @foreach($options as $option)
        <option value="{{ $option->id }}"
                @if(old($selected) == $option->id) selected @endif>{{ $option->name }}</option>
    @endforeach
</select>