@props([
    'options' => [],
    'name' => '',
    'selected' => '',
])

@foreach ($options as $option)
    <div class="form-checkbox my-0">
        <label class="form-check-label">
            <input class="radio-input" type="radio" name="{{ $name }}" value="{{ $option->id }}" @if($selected == $option->id) checked @endif>
            {{ $option->name }}
        </label>
    </div>
@endforeach